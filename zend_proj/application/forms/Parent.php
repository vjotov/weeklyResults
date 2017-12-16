<?php

class Application_Form_Parent extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
        
        $parent_selector = $this->addElement('select','parent',
          array(
            'label'         => 'Parent (select):',
            'value'         => 'parent',
            'required'      => true,
            'class'         => 'list_select',
            'size'          => '9',
            'multiOptions'  => $this->getSelectElements()
          )
        );
        
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'View Children',
            'class'         => 'btn_submit' 
        ));
    }

    private function getSelectElements() 
    {
      $p = new Application_Model_ParentMapper();
      $parents = $p->fetchAll(); 
      
      $result = array();
      foreach ($parents as $parent)
      {
        $result[$parent->parent_id] = $parent->parent_name;
      }
      return $result;
    }
}

