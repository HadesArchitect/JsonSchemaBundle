# Json-schema bundle

Symfony bundle for Justin Rainbow's JsonSchema library: https://github.com/justinrainbow/json-schema

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

```php
// Acme\DemoBundle\Controller\DemoController
// Get the schema and data as objects

$retriever = $this->get('json_schema.uri_retriever');
$schema = $retriever->retrieve('file://' . realpath('schema.json'));
```
