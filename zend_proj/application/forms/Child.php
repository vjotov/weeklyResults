<?php

class Application_Form_Child extends Zend_Form
{
    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
        
        $this->addElement('select','child',
          array(
            'label'         => 'Child (select):',
            'value'         => 'parent',
            'required'      => true,
            'class'         => 'list_select',
            'size'          => '3',
        ));
        
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'View Score',
            'class'         => 'btn_submit' 
        ));        
    }

    public function loadChildren($parent_id) {
      $mapper = new Application_Model_ChildMapper();
      
      $children = $mapper->fetchAllByParent($parent_id); 
      
      $child_list = $this->getElement("child"); 
      foreach ($children as $child)
      {
        $child_list->addMultiOption($child->child_id, $child->child_name);
      }
   }
       
}

