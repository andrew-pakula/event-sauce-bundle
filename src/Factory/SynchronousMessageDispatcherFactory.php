<?php

declare(strict_types=1);

namespace Andreo\EventSauceBundle\Factory;

use EventSauce\EventSourcing\MessageConsumer;
use EventSauce\EventSourcing\MessageDispatcher;
use EventSauce\EventSourcing\SynchronousMessageDispatcher;

final class SynchronousMessageDispatcherFactory
{
    /**
     * @param iterable<MessageConsumer> $consumers
     */
    public function __invoke(iterable $consumers): MessageDispatcher
    {
        return new SynchronousMessageDispatcher(...$consumers);
    }
}