<?php

namespace Faker\Provider\fr_BE;

/**
 * French-speaking Belgium payment provider
 *
 * Extends nl_BE\Payment since Belgian IBANs and VAT numbers are national,
 * not language-specific.
 */
class Payment extends \Faker\Provider\nl_BE\Payment
{
}
