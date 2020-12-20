<?php

/**
 * Copyright (c) 2011 François Zaninotto and contributors
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/FakerPHP/Faker
 */

namespace Faker\Provider\zh_TW;

/**
 * @deprecated Use {@link \Faker\Provider\Internet} instead
 * @see \Faker\Provider\Internet
 */
class Internet extends \Faker\Provider\Internet
{
    /**
     * @deprecated Use {@link \Faker\Provider\Internet::userName()} instead
     * @see \Faker\Provider\Internet::userName()
     */
    public function userName()
    {
        return parent::userName();
    }

    /**
     * @deprecated Use {@link \Faker\Provider\Internet::domainWord()} instead
     * @see \Faker\Provider\Internet::domainWord()
     */
    public function domainWord()
    {
        return parent::domainWord();
    }
}
