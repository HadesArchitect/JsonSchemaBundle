<?php

namespace HadesArchitect\JsonSchemaBundle\Validator;

use HadesArchitect\JsonSchemaBundle\Error\ErrorInterface;
use HadesArchitect\JsonSchemaBundle\Exception\ViolationException;

interface ValidatorServiceInterface
{
    /**
     * Checks given object against schema. Throws an ViolationException when given object doesn't match schema.
     * Check and isValid methods are similar, but in case of violations method check throws exception, and isValid returns false.
     *
     * @param mixed $object
     * @param mixed $schema
     *
     * @throws ViolationException
     *
     * @return true
     */
    function check($object, $schema);

    /**
     * @param mixed $object
     * @param mixed $schema
     *
     * @return boolean
     */
    function isValid($object, $schema);

    /**
     * @return ErrorInterface[]
     */
    function getErrors();
}
