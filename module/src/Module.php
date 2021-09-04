<?php

namespace Fayouz\Laminas\GrapeJs;

use Laminas\Loader\StandardAutoloader;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\Mvc\MvcEvent;

/**
 *
 */
class Module implements ConfigProviderInterface
{
    /**
     * @return mixed
     */
    public function getConfig(): mixed
    {
        return include __DIR__.'/../config/module.config.php';
    }
    
    /**
     * @return \array[][]
     */
    public function getAutoloaderConfig()
    {
        return [
            StandardAutoloader::class => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }
    
    /**
     *
     */
    public function onBootstrap(MvcEvent $event){
        $sharedEventManager = $event->getApplication()->getEventManager();
        // Register the event listener method.
        $sharedEventManager->attach(MvcEvent::EVENT_DISPATCH, [$this, 'onDispatch']);
    }
    
    /**
     * @param MvcEvent $event
     */
    public function onDispatch(MvcEvent $event) {
        $matches    = $event->getRouteMatch();
        $controller = $matches->getParam('controller');
        if (!str_contains($controller, __NAMESPACE__)) {
            // not a controller from this module
            return;
        }
    
        // Set the layout template
        $viewModel = $event->getViewModel();
        $viewModel->setTemplate('grapejs/layout');
    }
}
