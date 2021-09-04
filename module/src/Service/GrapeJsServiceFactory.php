<?php

namespace Fayouz\Laminas\GrapeJs\Service;

use Fayouz\Laminas\GrapeJs\Options\Options;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 *
 */
class GrapeJsServiceFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): GrapeJsService
    {
        return new GrapeJsService($container->get(Options::class));
    }
}
