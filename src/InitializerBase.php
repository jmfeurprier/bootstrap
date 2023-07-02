<?php

namespace Jmf\Bootstrap;

use RuntimeException;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class InitializerBase implements InitializerInterface
{
    private ContainerInterface $container;

    public function initialize(ContainerInterface $container): void
    {
        $this->container = $container;

        $this->doInitialize();
    }

    abstract protected function doInitialize(): void;

    protected function getStringParameter(string $parameterName): string
    {
        $parameter = $this->getParameter($parameterName);

        if (is_string($parameter)) {
            return $parameter;
        }

        throw new RuntimeException();
    }

    protected function getBooleanParameter(string $parameterName): bool
    {
        $parameter = $this->getParameter($parameterName);

        if (is_bool($parameter)) {
            return $parameter;
        }

        throw new RuntimeException();
    }

    protected function getParameter(string $parameterName): mixed
    {
        return $this->container->getParameter($parameterName);
    }

    protected function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
