<?php

declare(strict_types=1);

namespace PoPSchema\LocationPosts\Facades;

use PoPSchema\LocationPosts\TypeAPIs\LocationPostTypeAPIInterface;
use PoP\Root\Container\ContainerBuilderFactory;

class LocationPostTypeAPIFacade
{
    public static function getInstance(): LocationPostTypeAPIInterface
    {
        /**
         * @var LocationPostTypeAPIInterface
         */
        $service = ContainerBuilderFactory::getInstance()->get('locationpost_type_api');
        return $service;
    }
}
