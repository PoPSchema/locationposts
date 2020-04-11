<?php
namespace PoP\LocationPosts\FieldResolvers;

use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\Engine\TypeResolvers\RootTypeResolver;
use PoP\LocationPosts\FieldResolvers\AbstractLocationPostFieldResolver;

class RootLocationPostFieldResolver extends AbstractLocationPostFieldResolver
{
    public static function getClassesToAttachTo(): array
    {
        return array(RootTypeResolver::class);
    }

    public function getSchemaFieldDescription(TypeResolverInterface $typeResolver, string $fieldName): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $descriptions = [
			'posts' => $translationAPI->__('Location Posts in the current site', 'locationposts'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($typeResolver, $fieldName);
    }
}
