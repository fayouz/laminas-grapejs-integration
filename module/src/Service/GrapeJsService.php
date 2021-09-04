<?php

namespace Fayouz\Laminas\GrapeJs\Service;

use Fayouz\Laminas\GrapeJs\Options\Options;

class GrapeJsService
{
    /**
     * @var Options
     */
    protected Options $options;
    
    /**
     * @param Options $options
     */
    public function __construct(Options $options){
        $this->options = $options;
    }
    
    public function getOptions(){
        return $this->options;
    }
}
