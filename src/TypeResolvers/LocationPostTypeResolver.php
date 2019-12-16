<?php
namespace PoP\LocationPosts\TypeResolvers;

use PoP\Posts\TypeResolvers\PostTypeResolver;
use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\LocationPosts\TypeDataLoaders\LocationPostTypeDataLoader;

class LocationPostTypeResolver extends PostTypeResolver
{
    public const NAME = 'LocationPost';

    public function getTypeName(): string
    {
        return self::NAME;
    }

    public function getSchemaTypeDescription(): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        return $translationAPI->__('A post which has locations', 'locationposts');
    }

    public function getTypeDataLoaderClass(): string
    {
        return LocationPostTypeDataLoader::class;
    }
}

