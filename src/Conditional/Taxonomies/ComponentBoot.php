<?php
namespace PoP\LocationPosts\Conditional\Taxonomies;

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
    public static function prematureBoot()
    {
        ContainerBuilderUtils::attachFieldResolversFromNamespace(__NAMESPACE__.'\\FieldResolvers');
    }
}
