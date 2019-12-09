<?php
namespace PoP\LocationPosts\TypeDataResolvers;

use PoP\Posts\TypeDataResolvers\PostTypeDataResolver;
use PoP\LocationPosts\TypeResolvers\LocationPostTypeResolver;

class LocationPostTypeDataResolver extends PostTypeDataResolver
{
    public function getDataFromIdsQuery(array $ids): array
    {
        $query = parent::getDataFromIdsQuery($ids);
        $query['post-types'] = array(POP_LOCATIONPOSTS_POSTTYPE_LOCATIONPOST);
        return $query;
    }
    
    /**
     * Function to override
     */
    public function getQuery($query_args): array
    {
        $query = parent::getQuery($query_args);

        $query['post-types'] = array(POP_LOCATIONPOSTS_POSTTYPE_LOCATIONPOST);

        return $query;
    }

    public function getTypeResolverClass(): string
    {
        return LocationPostTypeResolver::class;
    }
}
