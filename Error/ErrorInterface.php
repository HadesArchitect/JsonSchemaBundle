<?php

/*
 * This file is part of the json-schema bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
