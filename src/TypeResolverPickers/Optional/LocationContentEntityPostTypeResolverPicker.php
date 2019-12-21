<?php
namespace PoP\LocationPosts\TypeResolverPickers\Optional;

use PoP\Content\TypeResolvers\ContentEntityUnionTypeResolver;
use PoP\LocationPosts\TypeResolverPickers\AbstractLocationPostTypeResolverPicker;

class LocationContentEntityPostTypeResolverPicker extends AbstractLocationPostTypeResolverPicker
{
    public static function getClassesToAttachTo(): array
    {
        return [
            ContentEntityUnionTypeResolver::class,
        ];
    }
}
