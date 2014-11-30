<?php

namespace HadesArchitect\JsonSchemaBundle\Tests\Error;

use HadesArchitect\JsonSchemaBundle\Error\Error;

class ErrorTest extends \PHPUnit_Framework_TestCase
{

    public function testError()
    {
        $error = new Error('1', '2');

        $this->assertEquals('1', $error->getProperty());
        $this->assertEquals('2', $error->getViolation());
        $this->assertEquals('1: 2', (string) $error);
    }

}
