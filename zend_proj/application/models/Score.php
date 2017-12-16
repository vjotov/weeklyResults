<?php

class Application_Model_Score
{
  protected $_child_name;
  protected $_discipline_name;
  protected $_score;
  protected $_date;  
  protected $_red;
  protected $_green;
  
  public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
    
    private function setOptions($options) {
      foreach($options as $k=>$v) {
        $this->$k = $v;
      }
    }
    
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid score property');
        }
        $this->$method($value);
    }
    
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid score property');
        }
        return $this->$method();
    }
    
     public function getChild_name()
     {
      return $this->_child_name;
     }
     
     public function setChild_name($child_name)
     {
      $this->_child_name = $child_name;
     }
     
     public function getDiscipline_name()
     {
      return $this->_discipline_name;
     }
     
     public function setDiscipline_name($discipline_name)
     {
      $this->_discipline_name = $discipline_name;
     }
     
     public function getScore()
     {
      return $this->_score;
     }
     
     public function setScore($score)
     {
      $this->_score = $score;
     }
     
     public function getDate()
     {
      return $this->_date;
     }
     
     public function setDate($date)
     {
      $this->_date = $date;
     }
     
     public function getRed()
     {
      return $this->_red;
     }
     
     public function setRed($red)
     {
      $this->_red = $red;
     }
     
     public function getGreen()
     {
      return $this->_green;
     }
     
     public function setGreen($green)
     {
      $this->_green = $green;
     }
     
     public function getColor()
     {
      if($this->_red == 1) return "red";
      if($this->_green == 1) return "green";
      return "white";
     }
}

