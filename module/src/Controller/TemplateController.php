<?php

namespace Fayouz\Laminas\GrapeJs\Controller;

use Fayouz\Laminas\GrapeJs\Service\TemplateService;
use Laminas\Mvc\Controller\AbstractRestfulController;
use Laminas\View\Model\JsonModel;

class TemplateController extends AbstractRestfulController {
    
    /**
     * @var TemplateService
     */
    private $templateService;
    
    /**
     * @param TemplateService $templateService
     */
    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }
    
    public function get($id)
    {
        return parent::get($id); // TODO: Change the autogenerated stub
    }
    
    /**
     * @return JsonModel
     */
    public function getList(): JsonModel
    {
       return new JsonModel($this->templateService->getList());
    }
}
