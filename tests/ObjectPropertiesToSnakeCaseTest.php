<?php

namespace igormakarov\AlphaSms;

use PHPUnit\Framework\TestCase;
use stdClass;

class ObjectPropertiesToSnakeCaseTest extends TestCase
{

    public function testConvert()
    {
        $std = new stdClass();
        $std->convert = 'asd';
        $std->propertyInCamel = 'camels';
        $this->assertEquals("convert=asd&property_in_camel=camels",  (new PropertiesToHttpQuery())->convert(get_object_vars($std)));
    }
}
