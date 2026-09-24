<?php

namespace Faker\Provider\gl_ES;

class Person extends \Faker\Provider\Person
{
    /**
     * In Galicia, as in the rest of Spain, people usually have two surnames.
     */
    protected static $maleNameFormats = [
        '{{firstNameMale}} {{lastName}} {{lastName}}',
        '{{firstNameMale}} {{lastName}} {{lastName}}',
        '{{firstNameMale}} {{lastName}} {{lastName}}',
        '{{firstNameMale}} {{lastName}} {{lastName}}',
        '{{firstNameMale}} {{lastName}}',
        '{{titleMale}} {{firstNameMale}} {{lastName}} {{lastName}}',
    ];

    protected static $femaleNameFormats = [
        '{{firstNameFemale}} {{lastName}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}} {{lastName}}',
        '{{firstNameFemale}} {{lastName}}',
        '{{titleFemale}} {{firstNameFemale}} {{lastName}} {{lastName}}',
    ];

    /**
     * Mix of the most frequent names in Galicia and traditional Galician forms.
     *
     * @see https://www.ine.es/dyngs/INEbase/es/operacion.htm?c=Estadistica_C&cid=1254736177009&menu=ultiDatos&idp=1254734710990
     * @see https://www.ige.gal/
     */
    protected static $firstNameMale = [
        'Adrián', 'Afonso', 'Alberte', 'Alejandro', 'Alexandre', 'Andrés', 'Antón', 'Antonio', 'Anxo',
        'Bieito', 'Brais', 'Breixo',
        'Carlos',
        'Daniel', 'David', 'Diego',
        'Estevo',
        'Fiz', 'Francisco',
        'Gonzalo',
        'Hugo',
        'Iago', 'Iván',
        'Javier', 'Jesús', 'José', 'José Luis', 'José Manuel', 'Juan',
        'Lois', 'Lucas', 'Luis',
        'Manuel', 'Martín', 'Martiño', 'Mateo',
        'Nicolás',
        'Pablo', 'Paio', 'Pedro',
        'Ramón', 'Roi',
        'Samuel',
        'Tomé',
        'Uxío',
        'Xabier', 'Xacobe', 'Xaime', 'Xián', 'Xoán', 'Xoel', 'Xosé', 'Xulio', 'Xurxo',
    ];

    /**
     * Mix of the most frequent names in Galicia and traditional Galician forms.
     *
     * @see https://www.ine.es/dyngs/INEbase/es/operacion.htm?c=Estadistica_C&cid=1254736177009&menu=ultiDatos&idp=1254734710990
     * @see https://www.ige.gal/
     */
    protected static $firstNameFemale = [
        'Alba', 'Aldara', 'Ana', 'Andrea', 'Antía',
        'Beatriz', 'Branca',
        'Candela', 'Carla', 'Carme', 'Carmen', 'Cristina',
        'Dolores',
        'Elena', 'Eva',
        'Helena',
        'Icía', 'Iria', 'Irene',
        'Josefa',
        'Laura', 'Lorena', 'Lúa', 'Lucía',
        'Manuela', 'María', 'María Carmen', 'María José', 'Mariña', 'Marta', 'Martina',
        'Nerea', 'Noa', 'Noelia',
        'Olaia', 'Olalla',
        'Paula', 'Pilar',
        'Raquel', 'Rosa', 'Rosalía',
        'Sabela', 'Sara', 'Silvia', 'Sofía',
        'Tareixa',
        'Uxía',
        'Vera',
        'Xiana', 'Xoana', 'Xulia',
    ];

    /**
     * Most frequent surnames in Galicia plus common Galician surnames.
     *
     * @see https://www.ine.es/dyngs/INEbase/es/operacion.htm?c=Estadistica_C&cid=1254736177009&menu=ultiDatos&idp=1254734710990
     * @see https://www.ige.gal/
     */
    protected static $lastName = [
        'Abelleira', 'Agra', 'Alonso', 'Álvarez', 'Amoedo', 'Areán', 'Arias',
        'Baamonde', 'Balado', 'Barreiro', 'Bermúdez', 'Blanco', 'Bouza', 'Bouzas', 'Brea',
        'Cabana', 'Calvo', 'Campos', 'Cao', 'Carballeira', 'Carballo', 'Carreira', 'Casal', 'Castelo', 'Castiñeira', 'Castro', 'Cerviño', 'Conde', 'Costa', 'Couto', 'Covelo', 'Crespo', 'Currás',
        'Díaz', 'Domínguez', 'Dopico',
        'Estévez',
        'Feijoo', 'Fernández', 'Ferreiro', 'Ferro', 'Figueroa', 'Fontán', 'Formoso', 'Fraga', 'Freire',
        'Gago', 'García', 'Garrido', 'Gestal', 'Gil', 'Gómez', 'Gondar', 'González', 'Grandal', 'Graña',
        'Iglesias',
        'Lage', 'Lamas', 'Lema', 'Lois', 'López', 'Lorenzo', 'Losada', 'Loureiro', 'Louzao',
        'Maceiras', 'Mariño', 'Martínez', 'Méndez', 'Mera', 'Míguez', 'Montero', 'Moreira', 'Mosquera', 'Mouriño',
        'Neira', 'Nogueira', 'Novoa', 'Núñez',
        'Ogando', 'Otero', 'Outeiro',
        'Pardo', 'Paz', 'Pazos', 'Pena', 'Pereira', 'Pérez', 'Piñeiro', 'Portela', 'Porto', 'Pose', 'Prieto',
        'Quintela', 'Quiroga',
        'Regueiro', 'Rey', 'Rial', 'Rivas', 'Rodal', 'Rodríguez', 'Romero',
        'Sánchez', 'Seoane', 'Silva', 'Sousa', 'Souto', 'Suárez',
        'Taboada', 'Teijeiro', 'Tojo', 'Trigo',
        'Valcárcel', 'Varela', 'Vázquez', 'Veiga', 'Vidal', 'Vieites', 'Vilar', 'Vilas', 'Viñas',
    ];

    protected static $titleMale = ['Sr.', 'D.', 'Dr.'];

    protected static $titleFemale = ['Sra.', 'D.ª', 'Dra.'];

    protected static $licenceCodes = ['AM', 'A1', 'A2', 'A', 'B', 'B+E', 'C1', 'C1+E', 'C', 'C+E', 'D1', 'D1+E', 'D', 'D+E'];

    /**
     * Generate a Documento Nacional de Identidad (DNI) number
     *
     * @example '77446565E'
     *
     * @see https://es.wikibooks.org/wiki/Algoritmo_para_obtener_la_letra_del_NIF#Algoritmo
     */
    public static function dni()
    {
        return \Faker\Provider\es_ES\Person::dni();
    }

    /**
     * @see https://sede.dgt.gob.es/es/tramites-y-multas/permiso-de-conduccion/obtencion-permiso-licencia-conduccion/clases-permiso-conduccion-edad.shtml
     *
     * @return string
     */
    public function licenceCode()
    {
        return static::randomElement(static::$licenceCodes);
    }
}
