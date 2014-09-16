<?php

namespace DLinsmeyer\Bundle\ApiBundle\Serializer\Event\Subscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;

/**
 * Handles translating a mixed type to a different type
 *
 * @author Daniel Lakes <dlakes@nerdery.com>
 */
class MixedTypePreSerializeSubscriber implements EventSubscriberInterface
{
    /**
     * Returns the events to which this class has subscribed.
     *
     * Return format:
     *     array(
     *         array('event' => 'the-event-name', 'method' => 'onEventName', 'class' => 'some-class', 'format' => 'json'),
     *         array(...),
     *     )
     *
     * The class may be omitted if the class wants to subscribe to events of all classes.
     * Same goes for the format key.
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => 'serializer.pre_serialize',
                'method' => 'onMixedTypePreSerialize',
            ),
            array(
                'event' => 'serializer.pre_deserialize',
                'method' => 'onMixedTypePreDeserialize',
            )
        );
    }

    public function onMixedTypePreSerialize(PreSerializeEvent $event)
    {
        $type = $event->getType();
        if($type["name"] == "Mixed"){
            $data = $event->getObject();
            if(is_array($data) || $data instanceof \stdClass){
                /*
                 * TODO: need to figure out how to change the type to a primitive
                 * Note silex/vendor/jms/serializer/src/JMS/Serializer/GraphNavigator.php line ~152-165
                 * is called *after* primitives are processed
                 */
            }
        }
    }

    public function onMixedTypePreDeserialize(PreDeserializeEvent $event)
    {
        $type = $event->getType();
        if($type["name"] == "Mixed"){
            $data = $event->getData();
        }
    }
}
