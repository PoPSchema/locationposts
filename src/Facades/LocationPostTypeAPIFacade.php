<?php

declare(strict_types=1);

namespace PoP\LocationPosts\Facades;

use PoP\LocationPosts\TypeAPIs\LocationPostTypeAPIInterface;
use PoP\Root\Container\ContainerBuilderFactory;

class LocationPostTypeAPIFacade
{
    public static function getInstance(): LocationPostTypeAPIInterface
    {
        return ContainerBuilderFactory::getInstance()->get('locationpost_type_api');
    }
}
