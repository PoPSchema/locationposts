<?php

declare(strict_types=1);

namespace PoP\LocationPosts\Conditional\Taxonomies\FieldResolvers;

use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\LocationPosts\FieldResolvers\AbstractLocationPostFieldResolver;
use PoP\Taxonomies\TypeResolvers\TagTypeResolver;

class LocationPostTagFieldResolver extends AbstractLocationPostFieldResolver
{
    public static function getClassesToAttachTo(): array
    {
        return array(TagTypeResolver::class);
    }

    public function getSchemaFieldDescription(TypeResolverInterface $typeResolver, string $fieldName): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $descriptions = [
            'locationposts' => $translationAPI->__('Location Posts which contain this tag', 'locationposts'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($typeResolver, $fieldName);
    }

    protected function getQuery(TypeResolverInterface $typeResolver, $resultItem, string $fieldName, array $fieldArgs = []): array
    {

        $query = parent::getQuery($typeResolver, $resultItem, $fieldName, $fieldArgs);

        $tag = $resultItem;
        switch ($fieldName) {
            case 'locationposts':
                $query['tag-ids'] = [$typeResolver->getID($tag)];
                break;
        }

        return $query;
    }
}
