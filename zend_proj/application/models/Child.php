<?php

class Application_Model_Child
{

    protected $_child_id;
    protected $_child_name;
    protected $_parent_id;
    
  
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
    
    public function setChild_id($id)
    {
      $this->_child_id = (int) $id; 
    }
    
    public function getChild_id() 
    {
      return $this->_child_id;
    }
    
    public function setChild_name($text)
    {
      $this->_child_name = (string) $text; 
    }
    
    public function getChild_name()
    {
      return $this->_child_name;
    }
    
    public function setParent_id($id)
    {
      $this->_parent_id = (int) $id; 
    }
    
    public function getParent_id() 
    {
      return $this->_parent_id;
    }
    
    
}

