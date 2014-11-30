<?php

namespace HadesArchitect\JsonSchemaBundle\Uri;

use JsonSchema\Exception\UriResolverException;

interface UriResolverServiceInterface
{
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
     * @return string Absolute URI
     */
    public function resolve($uri, $baseUri = null);

    /**
     * @param string $uri
     *
     * @return boolean
     */
    public function isValid($uri);

    /**
     * Tries to glue a relative path onto an absolute one
     *
     * @param string $relativePath
     * @param string $basePath
     *
     * @throws UriResolverException
     *
     * @return string Merged path
     */
    public function combineRelativePathWithBasePath($relativePath, $basePath);
}
