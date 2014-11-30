<?php

namespace HadesArchitect\JsonSchemaBundle\Exception;

use HadesArchitect\JsonSchemaBundle\Error\Error;

class ViolationException extends JsonSchemaException
{
    /**
     * @var Error[]
     */
    protected $errors = array();

    /**
     * @param Error[] $errors
     */
    public function __construct(array $errors)
    {
        $message = '';

        foreach ($errors as $error) {
            $message .= (string) $error . '. ';
            $this->addError($error);
        }

        parent::__construct(rtrim($message));
    }

    public function addError(Error $error)
    {
        $this->errors[] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
