<?php

class Application_Form_Scorebook extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
        $this->addElement('select','order_by',
          array(
            'label'         => 'Sort by:',
            'value'         => 'date',
            'required'      => true,
            'class'         => 'list_select',
            'size'          => '3',
            'multiOptions'  => array("asc"  => "By Discipline Ascending",
                                     "desc" => "By Discipline Descending",
                                     "date" => "By Date")
        ));
        $this->addElement('hidden','child');
        
        $this->addElement('submit', 'submit', array(
            'ignore'        => true,
            'label'         => 'Sort',
            'class'         => 'btn_submit' 
        ));        
    }
    
    public function setChildAndOrder($child_id, $order_by) {
       $child = $this->getElement("child");
       $child->setValue($child_id);
       $order_element = $this->getElement("order_by");
       $order_element->setValue($order_by);
    }


}

