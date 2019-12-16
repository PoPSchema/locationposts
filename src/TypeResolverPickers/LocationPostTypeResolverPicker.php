<?php
namespace PoP\LocationPosts\TypeResolverPickers;

use PoP\ComponentModel\TypeResolverPickers\AbstractTypeResolverPicker;
use PoP\Posts\TypeResolvers\PostUnionTypeResolver;
use PoP\LocationPosts\TypeResolvers\LocationPostTypeResolver;

class LocationPostTypeResolverPicker extends AbstractTypeResolverPicker
{
    public static function getClassesToAttachTo(): array
    {
        return [
            PostUnionTypeResolver::class,
        ];
    }

    public function getSchemaDefinitionObjectNature(): string
    {
        return 'is-locationpost';
    }

    public function getTypeResolverClass(): string
    {
        return LocationPostTypeResolver::class;
    }

    public function process($resultItemOrID): bool
    {
        $cmspostsapi = \PoP\Posts\FunctionAPIFactory::getInstance();
        $cmspostsresolver = \PoP\Posts\ObjectPropertyResolverFactory::getInstance();
        $postID = is_object($resultItemOrID) ? $cmspostsresolver->getPostId($resultItemOrID) : $resultItemOrID;
        return $cmspostsapi->getPostType($postID) == POP_LOCATIONPOSTS_POSTTYPE_LOCATIONPOST;
    }
}
