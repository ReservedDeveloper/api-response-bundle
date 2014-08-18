<?php
/**
 * ResponseSerializerAdapterInterface.php
 *
 * @package DLinsmeyer\Bundle\ApiBundle\Response\Serializer
 */

namespace DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Adapter;

use DLinsmeyer\Bundle\ApiBundle\Response\Model\ResponseInterface;
use DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Context\ResponseSerializationContextInterface;

/**
 * Used for defining the expectations of serializers used by this bundle
 *
 * @package DLinsmeyer\Bundle\ApiBundle\Response\Serializer
 * @author Daniel Lakes <dlakes@nerdery.com>
 */
interface ResponseSerializerAdapterInterface
{
    /**
     * Serializes the given data to the specified output format.
     *
     * @param ResponseInterface $responseModel
     * @param string $format
     * @param ResponseSerializationContextInterface $context
     *
     * @return string
     */
    public function serialize(
        ResponseInterface $responseModel,
        $format,
        ResponseSerializationContextInterface $context = null
    );
}
 