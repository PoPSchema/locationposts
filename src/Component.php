<?php
namespace PoP\LocationPosts;

use PoP\LocationPosts\Environment;
use PoP\Root\Component\AbstractComponent;
use PoP\Root\Component\YAMLServicesTrait;
use PoP\ComponentModel\Container\ContainerBuilderUtils;
use PoP\ComponentModel\AttachableExtensions\AttachableExtensionGroups;
use PoP\LocationPosts\TypeResolverPickers\Optional\LocationPostContentEntityTypeResolverPicker;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    use YAMLServicesTrait;
    // const VERSION = '0.1.0';

    /**
     * Initialize services
     */
    public static function init()
    {
        parent::init();
        self::initYAMLServices(dirname(__DIR__));
    }

    /**
     * Boot component
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        // Initialize classes
        ContainerBuilderUtils::registerTypeResolversFromNamespace(__NAMESPACE__.'\\TypeResolvers');
        ContainerBuilderUtils::attachFieldResolversFromNamespace(__NAMESPACE__.'\\FieldResolvers');
        self::attachTypeResolverPickers();

        // Boot conditionals
        if (class_exists('\PoP\Taxonomies\Component')) {
            \PoP\LocationPosts\Conditional\Taxonomies\ComponentBoot::boot();
        }
        if (class_exists('\PoP\Users\Component')) {
            \PoP\LocationPosts\Conditional\Users\ComponentBoot::boot();
        }
    }

    /**
     * If enabled, load the TypeResolverPickers
     *
     * @return void
     */
    protected static function attachTypeResolverPickers()
    {
        if (Environment::addLocationPostTypeToContentEntityUnionTypes()) {
            LocationPostContentEntityTypeResolverPicker::attach(AttachableExtensionGroups::TYPERESOLVERPICKERS);
        }
    }
}
