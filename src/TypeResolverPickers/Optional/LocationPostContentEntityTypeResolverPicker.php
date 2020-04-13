<?php

declare(strict_types=1);

namespace PoP\LocationPosts\TypeResolverPickers\Optional;

use PoP\Content\TypeResolvers\ContentEntityUnionTypeResolver;
use PoP\LocationPosts\TypeResolverPickers\AbstractLocationPostTypeResolverPicker;

class LocationPostContentEntityTypeResolverPicker extends AbstractLocationPostTypeResolverPicker
{
    public static function getClassesToAttachTo(): array
    {
        return [
            ContentEntityUnionTypeResolver::class,
        ];
    }
}
