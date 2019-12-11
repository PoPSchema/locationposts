<?php
namespace PoP\LocationPosts\TypeResolvers;

use PoP\Posts\TypeResolvers\PostTypeResolver;
use PoP\LocationPosts\TypeDataLoaders\LocationPostTypeDataLoader;

class LocationPostTypeResolver extends PostTypeResolver
{
    public function getTypeDataLoaderClass(): string
    {
        return LocationPostTypeDataLoader::class;
    }
}

