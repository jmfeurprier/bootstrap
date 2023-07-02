<?php

namespace Jmf\Bootstrap;

use Symfony\Component\DependencyInjection\ContainerInterface;

readonly class Bootstrap
{
    /**
     * @var InitializerInterface[]
     */
    private array $initializers;

    public function __construct(InitializerInterface ...$initializers)
    {
        $this->initializers = $initializers;
    }

    public function boot(ContainerInterface $container): void
    {
        foreach ($this->initializers as $initializer) {
            $initializer->initialize($container);
        }
    }
}
