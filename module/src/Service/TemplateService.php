<?php

namespace Fayouz\Laminas\GrapeJs\Service;

use Exception;
use Fayouz\Laminas\GrapeJs\Options\Options;
use SplFileInfo;
use function Swagger\scan;

class TemplateService
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
    
    /**
     * @throws Exception
     */
    public function getList(): array
    {
        $directoryIterator = new \RecursiveDirectoryIterator(
            realpath($this->options->getTemplate()['location']),
            
        );
        
        
        $result=[];
        foreach ($directoryIterator as $key => $fileInfo){ /** @var SplFileInfo $fileInfo */
            if(in_array($fileInfo->getFilename(),['.','..'] )){
                continue;
            }
            $result[] = $fileInfo->getFilename();
        }
        
        
        return $result;
    }
    
    
}
