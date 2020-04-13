<?php

declare(strict_types=1);

namespace PoP\LocationPosts\TypeResolverPickers;

use PoP\LocationPosts\Facades\LocationPostTypeAPIFacade;
use PoP\LocationPosts\TypeResolvers\LocationPostTypeResolver;
use PoP\ComponentModel\TypeResolverPickers\AbstractTypeResolverPicker;

class AbstractLocationPostTypeResolverPicker extends AbstractTypeResolverPicker
{
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
