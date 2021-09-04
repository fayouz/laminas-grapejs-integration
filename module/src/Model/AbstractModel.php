<?php

namespace Fayouz\Laminas\GrapeJs\Model;

use JMS\Serializer\SerializerBuilder;
use Laminas\Serializer\Adapter\Json;

abstract class AbstractModel implements \JsonSerializable{
    /**
     * @param $data
     */
    public function setFromArray($data){
        foreach($data as $key => $value){
            $this->__set($key, $value);
        }
    }
    
    
    public function __set($key, $value){
        $setter = 'set' . str_replace('_', '', $key);
        
        if (is_callable([$this, $setter])) {
            $this->{$setter}($value);
            return;
        }
    }
    
    /**
     * @return false|string
     */
    public function jsonSerialize(): bool|string
    {
        $serializer = SerializerBuilder::create()->build();
        $options = $serializer->serialize($this, 'json');
        return $options;
    }
}
