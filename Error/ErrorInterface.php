<?php

namespace HadesArchitect\JsonSchemaBundle\Error;

interface ErrorInterface
{
    /**
     * @return string
     */
    function getProperty();

    /**
     * @return string
     */
    function getViolation();

    /**
     * @return string
     */
    function __toString();
}
