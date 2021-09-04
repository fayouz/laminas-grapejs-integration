<?php

namespace Fayouz\Laminas\GrapeJs\Options;


use Fayouz\Laminas\Mailer\Core\Exception\RuntimeException;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 *
 */
class OptionsFactory implements FactoryInterface
{
    
    /**
     * @inheritDoc
     * @throws RuntimeException
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): Options
    {
        $config = $container->get('config');
        $config = $config['grapejs'] ?? null;
        if(!isset($config)) {
            throw new RuntimeException('Configuration Missing');
        }
        
        return new Options($config);
    }
}
