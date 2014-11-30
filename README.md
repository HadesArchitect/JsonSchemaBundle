# Json-schema bundle

Symfony bundle for Justin Rainbow's JsonSchema library: https://github.com/justinrainbow/json-schema. Offers symfony services instead of classic-style $validator = new Validator();

**WARNING! Bundle now in development, not for use in production environment!**

```
A PHP Implementation for validating `JSON` Structures against a given `Schema`.
See http://json-schema.org for more details.
```

## Installation

Install through composer: 

*First step: require bundle*
```
composer require hadesarchitect/json-schema-bundle dev-master
```

*Second step: enable bundle*
```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new HadesArchitect\JsonSchemaBundle\JsonSchemaBundle(),
    );
}
```

## Usage

### Example

#### Get schema from predefined schemas

```php
// Acme\DemoBundle\Controller\DemoController
// Get the schema and data as objects

$retriever = $this->get('json_schema.uri_retriever');
$schema = $retriever->retrieve('http://json-schema.org/geo'));
```
#### Validate object against schema

```php
// Acme\DemoBundle\Controller\DemoController
// Obtain validator
$validator = $this->get('json_schema.validator');

// Get schema
$schema = $this->get('json_schema.uri_retriever')->retrieve('http://json-schema.org/address');

// Prepare object
$object = [];
$object['country-name'] = 'Some country';
$object['region']       = 'Some region';
$object['locality']     = 'Some locality';

// Validate with check method, which throws exceptions in case of violations
$validator->check((object) $object, $schema); // Minimal requirements satisfied, so everything is OK

unset($object['country-name']);
unset($object['region']);

try {
    $validator->check((object) $object, $schema); // ViolationException thrown.
} catch (\HadesArchitect\JsonSchemaBundle\Exception\ViolationException $exc) {

    echo $exc->getMessage(); // The property region is required. The property country-name is required.

    foreach ($exc->getErrors() as $error) {
        // the property region is required
        // the property country-name is required
        echo $error->getViolation();
    }
}

// Also you can use isValid instead of check
$result = $validator->isValid((object) $object, $schema); // Result is false, because necessary properties not set

// Result is false now, so we can obtain errors from validator
if (!$result) {
    $errors = $validator->getErrors();

    foreach ($errors as $error) {
        // the property region is required
        // the property country-name is required
        echo $error->getViolation();
    }
}
```


### Available services

* json_schema.validator
* json_schema.uri_retriever
* json_schema.uri_resolver

### Parameters

Parameters which you could override in your parameters.yml:

* json_schema.validator.class - *real validator class*
* json_schema.validator.service.class - *validator service class*

* json_schema.uri_resolver.class - *real resolver class*
* json_schema.uri_resolver.service.class - *resolver service class*
* 
* json_schema.uri_retriever.class - *real retriever class*
* json_schema.uri_retriever.service.class - *retriever service class*
