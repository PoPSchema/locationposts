<?php

declare(strict_types=1);

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
    public static function addLocationPostTypeToContentEntityUnionTypes(): bool
    {
        return isset($_ENV['ADD_LOCATIONPOST_TYPE_TO_CONTENTENTITY_UNION_TYPES']) ? strtolower($_ENV['ADD_LOCATIONPOST_TYPE_TO_CONTENTENTITY_UNION_TYPES']) == "true" : false;
    }
}
