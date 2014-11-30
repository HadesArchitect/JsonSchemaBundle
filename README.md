# Json-schema bundle

Symfony bundle for Justin Rainbow's JsonSchema library: https://github.com/justinrainbow/json-schema. Offers symfony services instead of classic-style $validator = new Validator();

**WARNING! Bundle now in development, don't use in production environment!**

```
A PHP Implementation for validating `JSON` Structures against a given `Schema`.
See http://json-schema.org for more details.
```

## Installation

Install through composer: 

```
composer require hadesarchitect/json-schema-bundle dev-master
```

## Usage

### Example

```php
// Acme\DemoBundle\Controller\DemoController
// Get the schema and data as objects

$retriever = $this->get('json_schema.uri_retriever');
$schema = $retriever->retrieve('file://' . realpath('schema.json'));
```

### Available services

* json_schema.uri_retriever
* json_schema.uri_resolver

### Parameters

Parameters which you could override in your parameters.yml:

* json_schema.uri_resolver.class - *real resolver class*
* json_schema.uri_resolver.service.class - *resolver service class*
* 
* json_schema.uri_retriever.class - *real retriever class*
* json_schema.uri_retriever.service.class - *retriever service class*
