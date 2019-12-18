<?php
namespace PoP\LocationPosts\TypeResolverPickers;

use PoP\Posts\TypeResolvers\PostUnionTypeResolver;
use PoP\LocationPosts\Facades\LocationPostTypeAPIFacade;
use PoP\LocationPosts\TypeResolvers\LocationPostTypeResolver;
use PoP\ComponentModel\TypeResolverPickers\AbstractTypeResolverPicker;

class LocationPostTypeResolverPicker extends AbstractTypeResolverPicker
{
    public static function getClassesToAttachTo(): array
    {
        return [
            PostUnionTypeResolver::class,
        ];
    }

    public function getTypeResolverClass(): string
    {
        return LocationPostTypeResolver::class;
    }

    public function process($resultItemOrID): bool
    {
        $locationPostTypeAPI = LocationPostTypeAPIFacade::getInstance();
        return $locationPostTypeAPI->isInstanceOfLocationPostType($resultItemOrID);
    }
}
