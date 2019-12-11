<?php
namespace PoP\LocationPosts\TypeDataLoaders;

use PoP\Posts\TypeDataLoaders\PostTypeDataLoader;

class LocationPostTypeDataLoader extends PostTypeDataLoader
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
}
