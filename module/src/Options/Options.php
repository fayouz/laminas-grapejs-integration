<?php

namespace Fayouz\Laminas\GrapeJs\Options;

use Fayouz\Laminas\GrapeJs\Model\Block;
use JMS\Serializer\SerializerBuilder;
use Laminas\Serializer\Adapter\Json;
use Laminas\Stdlib\AbstractOptions;

class Options extends AbstractOptions implements \JsonSerializable
{
    /**
     * @var Block[]
     */
    protected mixed $blocks;
    
    protected $template;
    
    
    
    /**
     * @return mixed
     */
    public function getBlocks(): mixed
    {
        return $this->blocks;
    }
    
    /**
     * @param mixed $blocks
     */
    public function setBlocks(mixed $blocks): void
    {
        $classType = Block::class;
        $result = array_map(function($element) use ($classType) {
            return new $classType($element);
        }, $blocks);
        
        $this->blocks = $result;
        
    }
    
    /**
     * @return string
     */
    public function jsonSerialize(): string
    {
        $serializer = SerializerBuilder::create()->build();
        $options = $serializer->serialize($this, 'json');
        return $options;
    }
    
    /**
     * @return bool
     */
    public function isStrictMode(): bool
    {
        return $this->__strictMode__;
    }
    
    /**
     * @param bool $_strictMode__
     * @return Options
     */
    public function setStrictMode(bool $_strictMode__): Options
    {
        $this->__strictMode__ = $_strictMode__;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }
    
    /**
     * @param mixed $template
     * @return Options
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        
        return $this;
    }
    
    
}
