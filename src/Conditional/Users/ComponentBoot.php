<?php
namespace PoP\LocationPosts\Conditional\Users;

use PoP\ComponentModel\Container\ContainerBuilderUtils;

/**
 * Initialize component
 */
class ComponentBoot
{
    /**
     * Boot component
     *
     * @return void
     */
    public static function boot()
    {
        ContainerBuilderUtils::attachFieldResolversFromNamespace(__NAMESPACE__.'\\FieldResolvers');
    }
}
