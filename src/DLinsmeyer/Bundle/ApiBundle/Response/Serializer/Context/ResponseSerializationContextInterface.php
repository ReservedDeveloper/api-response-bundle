<?php
/**
 * [File description text goes here...]
 * 
 * @package DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Context 
 * @subpackage
 */
 
namespace DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Context;

/**
 * [Class desc. text goes here...]
 *
 * @package DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Context 
 * @author Daniel Lakes <dlakes@nerdery.com>
 */
interface ResponseSerializationContextInterface
{
    /**
     * set version
     *
     * @param string $version version for which we should serialize the response
     *
     * @return self
     */
    public function setVersion($version);

    /**
     * Whether or not we should serialize null values
     *
     * @param bool $serializeNull true if null values should be serialized, false if not
     *
     * @return self
     */
    public function setSerializeNull($serializeNull);

    /**
     * Determines if we want to enable checks to ensure we don't surpass a pre-configured recursion depth
     *
     * @return self
     */
    public function enableMaxDepthChecks();
}
 