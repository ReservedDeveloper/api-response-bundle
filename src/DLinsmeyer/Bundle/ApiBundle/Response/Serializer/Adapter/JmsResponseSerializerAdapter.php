<?php
/**
 * JmsResponseSerializerAdapter
 *
 * @package DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Adapter
 * @subpackage
 */

namespace DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Adapter;

use DLinsmeyer\Bundle\ApiBundle\Response\Model\ResponseInterface;
use DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Context\ResponseSerializationContextInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;

/**
 * Adapts the JMS serializer to function w/ our response serialization
 *
 * @package DLinsmeyer\Bundle\ApiBundle\Response\Serializer\Adapter
 * @author  Daniel Lakes <dlakes@nerdery.com>
 */
class JmsResponseSerializerAdapter implements ResponseSerializerAdapterInterface
{
    /**
     * Used for serializing our data
     *
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Provides context for serialization
     *
     * @var SerializationContext
     */
    protected $serializationContext;

    /**
     * Constructor
     *
     * @param SerializerInterface $serializer Used for serializing our data
     * @param SerializationContext $context provides context for serialization
     */
    public function __construct(SerializerInterface $serializer, SerializationContext $context)
    {
        $this->serializer = $serializer;
        $this->serializationContext = $context;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(
        ResponseInterface $responseModel,
        $format,
        ResponseSerializationContextInterface $context = null
    ) {
        $this->serializer->serialize($responseModel, $format, $this->serializationContext);
    }
}
 