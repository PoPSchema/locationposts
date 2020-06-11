<?php

declare(strict_types=1);

namespace PoP\LocationPosts;

class Environment
{
    public const LOCATIONPOST_LIST_DEFAULT_LIMIT = 'LOCATIONPOST_LIST_DEFAULT_LIMIT';
    public const LOCATIONPOST_LIST_MAX_LIMIT = 'LOCATIONPOST_LIST_MAX_LIMIT';

    /**
     * Customize the Location Post type name
     *
     * @return void
     */
    public static function getLocationPostTypeName(): ?string
    {
        return $_ENV['LOCATION_POST_TYPE_NAME'];
    }
    public static function addLocationPostTypeToCustomPostUnionTypes(): bool
    {
        return isset($_ENV['ADD_LOCATIONPOST_TYPE_TO_CUSTOM_POST_UNION_TYPES']) ? strtolower($_ENV['ADD_LOCATIONPOST_TYPE_TO_CUSTOM_POST_UNION_TYPES']) == "true" : false;
    }
}
