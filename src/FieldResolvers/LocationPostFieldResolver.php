<?php
namespace PoP\LocationPosts\FieldResolvers;

use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\Schema\SchemaDefinition;
use PoP\ComponentModel\FieldResolvers\AbstractDBDataFieldResolver;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\ComponentModel\Schema\TypeCastingHelpers;
use PoP\LocationPosts\TypeResolvers\LocationPostTypeResolver;
use PoP\ComponentModel\Misc\GeneralUtils;

class LocationPostFieldResolver extends AbstractDBDataFieldResolver
{
    public static function getClassesToAttachTo(): array
    {
        return array(LocationPostTypeResolver::class);
    }

    public static function getFieldNamesToResolve(): array
    {
        return [
            'cats',
            'catSlugs',
            'catName',
        ];
    }

    public function getSchemaFieldType(TypeResolverInterface $typeResolver, string $fieldName): ?string
    {
        $types = [
            'cats' => TypeCastingHelpers::makeArray(SchemaDefinition::TYPE_ID),
            'catSlugs' => TypeCastingHelpers::makeArray(SchemaDefinition::TYPE_STRING),
            'catName' => SchemaDefinition::TYPE_STRING,
        ];
        return $types[$fieldName] ?? parent::getSchemaFieldType($typeResolver, $fieldName);
    }

    public function getSchemaFieldDescription(TypeResolverInterface $typeResolver, string $fieldName): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $descriptions = [
            'cats' => $translationAPI->__('', ''),
            'catSlugs' => $translationAPI->__('', ''),
            'catName' => $translationAPI->__('', ''),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($typeResolver, $fieldName);
    }

    public function resolveValue(TypeResolverInterface $typeResolver, $resultItem, string $fieldName, array $fieldArgs = [], ?array $variables = null, ?array $expressions = null, array $options = [])
    {
        $taxonomyapi = \PoP\Taxonomies\FunctionAPIFactory::getInstance();
        $locationpost = $resultItem;
        switch ($fieldName) {
            case 'cats':
                return $taxonomyapi->getPostTaxonomyTerms(
                    $typeResolver->getID($locationpost),
                    POP_LOCATIONPOSTS_TAXONOMY_CATEGORY,
                    [
                        'return-type' => POP_RETURNTYPE_IDS,
                    ]
                );

            case 'catSlugs':
                return $taxonomyapi->getPostTaxonomyTerms(
                    $typeResolver->getID($locationpost),
                    POP_LOCATIONPOSTS_TAXONOMY_CATEGORY,
                    [
                        'return-type' => POP_RETURNTYPE_SLUGS,
                    ]
                );

            case 'catName':
                $cat = $typeResolver->resolveValue($resultItem, 'cat', $variables, $expressions, $options);
                if (GeneralUtils::isError($cat)) {
                    return $cat;
                } elseif ($cat) {
                    return $taxonomyapi->getTermName($cat, POP_LOCATIONPOSTS_TAXONOMY_CATEGORY);
                }
                return null;
        }

        return parent::resolveValue($typeResolver, $resultItem, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }
}
