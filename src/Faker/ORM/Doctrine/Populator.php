<?php

namespace Faker\ORM\Doctrine;

use Doctrine\Common\Persistence\ObjectManager as LegacyObjectManager;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;

/**
 * Service class for populating a database using the Doctrine ORM or ODM.
 * A Populator can populate several tables using ActiveRecord classes.
 */
class Populator
{
    /**
     * @var int
     */
    protected $batchSize;

    /**
     * @var Generator
     */
    protected $generator;

    /**
     * @var ObjectManager|LegacyObjectManager|null
     */
    protected $manager;

    /**
     * @var array
     */
    protected $entities = [];

    /**
     * @var array
     */
    protected $quantities = [];

    /**
     * @var array
     */
    protected $generateId = [];

    /**
     * @param ObjectManager|LegacyObjectManager|null $manager
     * @param int                                    $batchSize
     */
    public function __construct(Generator $generator, $manager = null, $batchSize = 1000)
    {
        $this->generator = $generator;
        $this->batchSize = $batchSize;

        if (null !== $manager && !$manager instanceof ObjectManager && !$manager instanceof LegacyObjectManager) {
            throw new \TypeError(
                \sprintf('%s(): Argument #2 ($manager) must be of type %s, %s given', __METHOD__, implode('|', [ObjectManager::class, LegacyObjectManager::class, 'null']), \get_debug_type($manager))
            );
        }

        $this->manager = $manager;
    }

    /**
     * Add an order for the generation of $number records for $entity.
     *
     * @param mixed $entity A Doctrine classname, or a \Faker\ORM\Doctrine\EntityPopulator instance
     * @param int   $number The number of entities to populate
     */
    public function addEntity($entity, $number, $customColumnFormatters = [], $customModifiers = [], $generateId = false)
    {
        if (!$entity instanceof \Faker\ORM\Doctrine\EntityPopulator) {
            if (null === $this->manager) {
                throw new \InvalidArgumentException('No entity manager passed to Doctrine Populator.');
            }
            $entity = new \Faker\ORM\Doctrine\EntityPopulator($this->manager->getClassMetadata($entity));
        }
        $entity->setColumnFormatters($entity->guessColumnFormatters($this->generator));

        if ($customColumnFormatters) {
            $entity->mergeColumnFormattersWith($customColumnFormatters);
        }
        $entity->mergeModifiersWith($customModifiers);
        $this->generateId[$entity->getClass()] = $generateId;

        $class = $entity->getClass();
        $this->entities[$class] = $entity;
        $this->quantities[$class] = $number;
    }

    /**
     * Populate the database using all the Entity classes previously added.
     *
     * Please note that large amounts of data will result in more memory usage since the the Populator will return
     * all newly created primary keys after executing.
     *
     * @param EntityManager|null $entityManager A Doctrine connection object
     *
     * @return array A list of the inserted PKs
     */
    public function execute($entityManager = null)
    {
        if (null === $entityManager) {
            $entityManager = $this->manager;
        }

        if (null === $entityManager) {
            throw new \InvalidArgumentException('No entity manager passed to Doctrine Populator.');
        }

        $insertedEntities = [];

        foreach ($this->quantities as $class => $number) {
            $generateId = $this->generateId[$class];

            for ($i = 0; $i < $number; ++$i) {
                $insertedEntities[$class][] = $this->entities[$class]->execute(
                    $entityManager,
                    $insertedEntities,
                    $generateId
                );

                if (count($insertedEntities) % $this->batchSize === 0) {
                    $entityManager->flush();
                }
            }
            $entityManager->flush();
        }

        return $insertedEntities;
    }
}
