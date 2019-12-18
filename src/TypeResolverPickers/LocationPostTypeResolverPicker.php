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

    public function isInstanceOfType($object): bool
    {
        $locationPostTypeAPI = LocationPostTypeAPIFacade::getInstance();
        return $locationPostTypeAPI->isInstanceOfLocationPostType($object);
    }

    public function isIDOfType($resultItemID): bool
    {
        $locationPostTypeAPI = LocationPostTypeAPIFacade::getInstance();
        return $locationPostTypeAPI->locationPostExists($resultItemID);
    }
}
