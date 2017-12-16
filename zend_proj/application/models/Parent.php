<?php

class Application_Model_Parent
{

    protected $_parent_id;
    protected $_parent_name;
  
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
    
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid parent property');
        }
        $this->$method($value);
    }
    
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid parent property');
        }
        return $this->$method();
    }
    
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
    
    public function setParent_id($id)
    {
      $this->_parent_id = (int) $id; 
    }
    
    public function getParent_id() 
    {
      return $this->_parent_id;
    }
    
    public function setParent_name($text)
    {
      $this->_parent_name = (string) $text; 
    }
    
    public function getParent_name()
    {
      return $this->_parent_name;
    }
}

