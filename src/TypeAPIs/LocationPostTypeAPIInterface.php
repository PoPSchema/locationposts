<?php
namespace PoP\LocationPosts\TypeAPIs;

/**
 * Methods to interact with the Type, to be implemented by the underlying CMS
 */
interface LocationPostTypeAPIInterface
{
    /**
     * Indicates if the passed object is of type LocationPost
     *
     * @param [type] $object
     * @return boolean
     */
    public function isInstanceOfLocationPostType($object): bool;
}
