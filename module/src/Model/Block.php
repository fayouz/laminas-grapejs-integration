<?php
namespace Fayouz\Laminas\GrapeJs\Model;

use Laminas\Json\Json;

/**
 *
 */
class Block extends AbstractModel implements \JsonSerializable {
    
    /**
     * @var
     */
    protected $id;
    
    /**
     * @var
     */
    protected $label;
    
    /**
     * @var
     */
    protected $attributes;
    
    /**
     * @var
     */
    protected $content;
    
    /**
     * @param $data
     */
    public function __construct($data){
        $this->setFromArray($data);
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    
    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }
    
    /**
     * @param mixed $label
     */
    public function setLabel(mixed $label): void
    {
        $this->label = $label;
    }
    
    /**
     * @return mixed
     */
    public function getContent(): mixed
    {
        return $this->content;
    }
    
    /**
     * @param mixed $content
     */
    public function setContent(mixed $content): void
    {
        $this->content = $content;
    }
    
    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
    
    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes): void
    {
        $this->attributes = $attributes;
    }
    
    
}
