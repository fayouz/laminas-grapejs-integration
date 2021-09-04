<?php

namespace Fayouz\Laminas\GrapeJs\Controller;

use Fayouz\Laminas\GrapeJs\Service\GrapeJsService;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

/**
 *
 */
class IndexController extends AbstractActionController
{
    /**
     * @var GrapeJsService
     */
    private $service;
    
    public function __construct(GrapeJsService $grapeJsService)
    {
        $this->service = $grapeJsService;
    }
    
    /**
     * @return ViewModel
     */
    public function builderAction(): ViewModel
    {
        $this->layout()->setVariable(
            'type',
            $this->params()->fromQuery('type','newsletter')
        );
        
        $options = $this->service->getOptions();
        
        return new ViewModel(['options' => $options]);
    }
    
    public function templateAction(){
        var_dump('faez');die();
    }
}
