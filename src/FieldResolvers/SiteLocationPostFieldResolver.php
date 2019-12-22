<?php
namespace PoP\LocationPosts\FieldResolvers;

use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\Engine\FieldResolvers\SiteFieldResolverTrait;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\API\TypeResolvers\SiteTypeResolver;
use PoP\LocationPosts\FieldResolvers\AbstractLocationPostFieldResolver;

class SiteLocationPostFieldResolver extends AbstractLocationPostFieldResolver
{
    use SiteFieldResolverTrait;

    public static function getClassesToAttachTo(): array
    {
        return array(SiteTypeResolver::class);
    }

    public function getSchemaFieldDescription(TypeResolverInterface $typeResolver, string $fieldName): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $descriptions = [
			'locationposts' => $translationAPI->__('Location Posts in the site', 'locationposts'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($typeResolver, $fieldName);
    }
}
