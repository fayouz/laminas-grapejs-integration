<?php
namespace Fayouz\Laminas\GrapeJs\Controller;

use Fayouz\Laminas\GrapeJs\Service\TemplateService;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 *
 */
class TemplateControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return TemplateController
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): TemplateController
    {
        return new TemplateController($container->get(TemplateService::class));
    }
}
