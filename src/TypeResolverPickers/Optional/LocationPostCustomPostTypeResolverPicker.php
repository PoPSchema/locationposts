<?php

declare(strict_types=1);

namespace PoP\LocationPosts\TypeResolverPickers\Optional;

use PoP\CustomPosts\TypeResolvers\CustomPostUnionTypeResolver;
use PoP\LocationPosts\TypeResolverPickers\AbstractLocationPostTypeResolverPicker;

class LocationPostCustomPostTypeResolverPicker extends AbstractLocationPostTypeResolverPicker
{
    public static function getClassesToAttachTo(): array
    {
        return [
            CustomPostUnionTypeResolver::class,
        ];
    }
}
