<?php

declare(strict_types=1);

namespace Tests\Config;

use Andreo\EventSauceBundle\DependencyInjection\AndreoEventSauceExtension;
use EventSauce\EventSourcing\Serialization\PayloadSerializer;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Tests\Config\Dummy\DummyCustomPayloadSerializer;

final class SerializerConfigTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions(): array
    {
        return [
            new AndreoEventSauceExtension(),
        ];
    }

    /**
     * @test
     */
    public function should_register_custom_payload_serializer(): void
    {
        $this->load([
            'payload_serializer' => DummyCustomPayloadSerializer::class,
        ]);

        $this->assertContainerBuilderHasAlias(PayloadSerializer::class);
        $payloadSerializerAlias = $this->container->getAlias(PayloadSerializer::class);
        $this->assertEquals(DummyCustomPayloadSerializer::class, $payloadSerializerAlias->__toString());
    }
}