<?php

/*
 * This file is part of the json-schema bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HadesArchitect\JsonSchemaBundle\Error;

class Error implements ErrorInterface
{
    /**
     * @var string
     */
    protected $property;

    /**
     * @var string
     */
    protected $violation;

    /**
     * @var string
     */
    protected $stringed;

    /**
     * @param string $property
     * @param string $violation
     */
    public function __construct($property, $violation = 'unknown violation')
    {
        $this->property  = $property;
        $this->violation = $violation;
    }

    /**
     * @inheritdoc
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @inheritdoc
     */
    public function getViolation()
    {
        return $this->violation;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        if (!$this->stringed) {
            $this->stringed = $this->property ? $this->property . ': ' : '';
            $this->stringed .= ucfirst($this->violation);
        }

        return $this->stringed;
    }
}
