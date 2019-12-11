<?php
namespace PoP\LocationPosts\TypeResolvers;

use PoP\Posts\TypeResolvers\PostTypeResolver;
use PoP\LocationPosts\TypeDataResolvers\LocationPostTypeDataResolver;

class LocationPostTypeResolver extends PostTypeResolver
{
    public function getTypeDataResolverClass(): string
    {
        return LocationPostTypeDataResolver::class;
    }
}

