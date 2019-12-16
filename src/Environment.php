<?php
namespace PoP\LocationPosts;

class Environment
{
    /**
     * Customize the Location Post type name
     *
     * @return void
     */
    public static function getLocationPostTypeName(): ?string
    {
        return $_ENV['LOCATION_POST_TYPE_NAME'];
    }
}

