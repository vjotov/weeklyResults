<?php

class ScorebookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Parent();
        $this->view->form = $form;
    }

    public function childAction()
    {
        // action body
        $request = $this->getRequest();
        
        $parent_form = new Application_Form_Parent();

        if ($request->isPost()) { 
          
          if ($parent_form->isValid($request->getPost())) { 
            $vals = $parent_form->getValues();
            $child_form = new Application_Form_Child();
            $child_form->loadChildren($vals['parent']);
            
            $this->view->form = $child_form;
          } 
          else $this->indexAction();
        } 
        else $this->indexAction();
    }

    public function scoreAction()
    {
        // action body
        $request = $this->getRequest();
        $scorebook_form = new Application_Form_Scorebook();
        
        $vals = $request->getPost();
        $child_id = $vals['child'];
        
        
        if ($request->isPost() && $child_id != null) { 
           $order_by = array_key_exists ('order_by',$vals)?$vals['order_by']:"date";
            
           $scorebook = new Application_Model_ScoreMapper();
           $this->view->entries = $scorebook->fetchAllByChild($child_id, $order_by); 
           
           $scorebook_form->setChildAndOrder($child_id, $order_by) ;
           $this->view->form = $scorebook_form;
       } else $this->indexAction();
    }
    
 

}




