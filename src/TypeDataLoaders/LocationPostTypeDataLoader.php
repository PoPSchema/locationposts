<?php

declare(strict_types=1);

namespace PoP\LocationPosts\TypeDataLoaders;

use PoP\Posts\TypeDataLoaders\PostTypeDataLoader;
use PoP\LocationPosts\Facades\LocationPostTypeAPIFacade;

class LocationPostTypeDataLoader extends PostTypeDataLoader
{
    public function getObjects(array $ids): array
    {
        $locationPostTypeAPI = LocationPostTypeAPIFacade::getInstance();
        $query = $this->getObjectQuery($ids);
        return (array)$locationPostTypeAPI->getLocationPosts($query);
    }

    public function executeQuery($query, array $options = [])
    {
        $locationPostTypeAPI = LocationPostTypeAPIFacade::getInstance();
        return $locationPostTypeAPI->getLocationPosts($query, $options);
    }
}
