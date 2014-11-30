<?php

namespace HadesArchitect\JsonSchemaBundle\Uri;

use JsonSchema\Exception\InvalidSchemaMediaTypeException;
use JsonSchema\Exception\ResourceNotFoundException;
use JsonSchema\Uri\Retrievers\UriRetrieverInterface;

interface UriRetrieverServiceInterface
{
    /**
     * Guarantee the correct media type was encountered
     *
     * @param $uriRetriever
     * @param $uri
     *
     * @throws InvalidSchemaMediaTypeException
     */
    public function confirmMediaType($uriRetriever, $uri);

    /**
     * Get a URI Retriever
     *
     * If none is specified, sets a default FileGetContents retriever and
     * returns that object.
     *
     * @return UriRetrieverInterface
     */
    public function getUriRetriever();

    /**
     * Resolve a schema based on pointer
     *
     * URIs can have a fragment at the end in the format of
     * #/path/to/object and we are to look up the 'path' property of
     * the first object then the 'to' and 'object' properties.
     *
     * @param object $jsonSchema JSON Schema contents
     * @param string $uri JSON Schema URI
     *
     * @throws ResourceNotFoundException
     *
     * @return object JSON Schema after walking down the fragment pieces
     */
    public function resolvePointer($jsonSchema, $uri);

    /**
     * Retrieve a URI
     *
     * @param string $uri JSON Schema URI
     * @param string $baseUri JSON Schema URI
     *
     * @throws InvalidSchemaMediaTypeException for invalid media types
     *
     * @return object JSON Schema contents
     */
    public function retrieve($uri, $baseUri = null);

    /**
     * Set the URI Retriever
     *
     * @param UriRetrieverInterface $uriRetriever
     * @return $this for chaining
     */
    public function setUriRetriever(UriRetrieverInterface $uriRetriever);

    /**
     * Parses a URI into five main components
     *
     * @param string $uri
     *
     * @return array
     */
    public function parse($uri);

    /**
     * Builds a URI based on an array with the main components
     *
     * @param array $components
     *
     * @return string
     */
    public function generate(array $components);

    /**
     * Resolves a URI
     *
     * @param string $uri Absolute or relative
     * @param string $baseUri Optional base URI
     *
     * @return string
     */
    public function resolve($uri, $baseUri = null);

    /**
     * @param string $uri
     *
     * @return boolean
     */
    public function isValid($uri);
}
