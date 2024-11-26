<?php

namespace BlackMesa\ChainOfResponsibilityBundle\DependencyInjection;

use BlackMesa\ChainOfResponsibilityBundle\Builder\ChainBuilder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Reference;

final class ChainOfResponsibilityExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        foreach ($config['chains'] as $chainName => $handlers) {
            $chainServiceId = sprintf('chain_of_responsibility.%s', $chainName);
            $builderDefinition = new Definition(ChainBuilder::class);
            $builderDefinition->setPublic(true);

            foreach ($handlers as $handler) {
                $builderDefinition->addMethodCall('addHandler', [new Reference($handler)]);
            }

            $container->setDefinition($chainServiceId, $builderDefinition);
        }
    }
}
