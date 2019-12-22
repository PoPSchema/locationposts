<?php
namespace PoP\LocationPosts\FieldResolvers;

use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\API\TypeResolvers\RootTypeResolver;
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
			'posts' => $translationAPI->__('Location Posts in the current site', 'posts-api'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($typeResolver, $fieldName);
    }
}
