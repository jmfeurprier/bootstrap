<?php

namespace App\Bootstrap;

use Symfony\Component\DependencyInjection\ContainerInterface;

interface InitializerInterface
{
    public function initialize(ContainerInterface $container): void;
}