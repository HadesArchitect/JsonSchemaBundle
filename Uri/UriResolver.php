<?php

namespace HadesArchitect\JsonSchemaBundle\Uri;

use JsonSchema\Uri\UriResolver as BaseResolver;

class UriResolverService implements UriResolverServiceInterface
{
    /**
     * @var BaseResolver
     */
    protected $resolver;

    /**
     * @inheritdoc
     */
    public function __construct($resolverClass)
    {
        $this->resolver = new $resolverClass;
    }

    /**
     * @inheritdoc
     */
    public function parse($uri)
    {
        return $this->resolver->parse($uri);
    }

    /**
     * @inheritdoc
     */
    public function generate(array $components)
    {
        return $this->resolver->generate($components);
    }

    /**
     * @inheritdoc
     */
    public function resolve($uri, $baseUri = null)
    {
        return $this->resolver->resolve($uri, $baseUri);
    }

    /**
     * @inheritdoc
     */
    public function isValid($uri)
    {
        return $this->resolver->isValid($uri);
    }

    /**
     * @inheritdoc
     */
    public function combineRelativePathWithBasePath($relativePath, $basePath)
    {
        return $this->combineRelativePathWithBasePath($relativePath, $basePath);
    }
} 
