<?php
namespace Fayouz\Laminas\GrapeJs\Controller;

use Fayouz\Laminas\GrapeJs\Service\GrapeJsService;
use Fayouz\Laminas\Mailer\Core\Service\MailerServiceInterface;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 *
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return IndexController
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): IndexController
    {
        return new IndexController($container->get(GrapeJsService::class));
    }
}
