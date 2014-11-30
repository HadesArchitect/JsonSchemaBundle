<?php

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \HadesArchitect\JsonSchemaBundle\Validator\ValidatorServiceInterface
     */
    protected $validator;

    /**
     * @var \stdClass
     */
    protected $schema;

    public function setUp()
    {
        $this->validator = new \HadesArchitect\JsonSchemaBundle\Validator\ValidatorService('JsonSchema\Validator');

        $this->schema = new \stdClass();
        $this->schema->schema = "http://json-schema.org/draft-04/schema#";
        $this->schema->title = "Product";
        $this->schema->description = "A product from Acme catalog";
        $this->schema->properties = [];
        $this->schema->properties['id'] = (object) ["type"=>"integer"];
        $this->schema->properties['name'] = (object) ["type"=>"string"];
        $this->schema->properties['description'] = (object) ["type"=>"string"];
        $this->schema->required = ['id', 'name'];
    }

    public function testIsValidSuccess()
    {
        $validObject = new \stdClass;
        $validObject->id   = 12;
        $validObject->name = 'test-name';
        $validObject->description = 'test-description';

        $this->assertTrue($this->validator->isValid($validObject, $this->schema));
        $this->assertEmpty($this->validator->getErrors());
    }

    public function testIsValidFail()
    {
        $invalidObject = new \stdClass;
        $invalidObject->name = 'test-name';

        $this->assertFalse($this->validator->isValid($invalidObject, $this->schema));
        $this->assertNotEmpty($this->validator->getErrors());

        $error = $this->validator->getErrors()[0];

        $this->assertEquals('the property id is required', $error->getViolation());
        $this->assertEquals('The property id is required', "{$error}");

        $invalidObject->id = 42;

        $this->assertTrue($this->validator->isValid($invalidObject, $this->schema));
        $this->assertEmpty($this->validator->getErrors());
    }

    public function testCheckSuccess()
    {
        $validObject = new \stdClass;
        $validObject->id   = 12;
        $validObject->name = 'test-name';
        $validObject->description = 'test-description';

        $this->assertTrue($this->validator->check($validObject, $this->schema));
        $this->assertEmpty($this->validator->getErrors());
    }

    public function testCheckFail()
    {
        $this->setExpectedException('HadesArchitect\JsonSchemaBundle\Exception\ViolationException');

        $invalidObject = new \stdClass;
        $invalidObject->name = 'test-name';

        $this->validator->check($invalidObject, $this->schema);
        $this->assertNotEmpty($this->validator->getErrors());

        $error = $this->validator->getErrors()[0];

        $this->assertEquals('the property id is required', $error->getViolation());
        $this->assertEquals('the property id is required', "{$error}");

        $invalidObject->id = 42;

        $this->assertTrue($this->validator->check($invalidObject, $this->schema));
        $this->assertEmpty($this->validator->getErrors());
    }
} 
