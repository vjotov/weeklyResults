<?php

class Application_Model_ChildMapper
{
  protected $_dbTable;
  
  public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Child');
        }
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Child $child) 
    {
    // Out of scope for the task
    }
    
    public function find($id, Application_Model_Child $child)
    {
    // Out of scope for the task
    }
    
    public function fetchAll()
    {
    // Out of scope for the task  
    }
    
    public function fetchAllByParent($parent_id)
    {
      $table = $this->getDbTable();
      
      $select = $table->select();
      $where = sprintf('parent_id = %u',$parent_id);
      $select->where($where);
      $select->order('child_name ASC');

      $resultSet = $table->fetchAll($select);
      
      $entries   = array();
      foreach ($resultSet as $row) {
          $entry = new Application_Model_Child();
          $entry->setParent_id($row->parent_id);
          $entry->setChild_name($row->child_name);
          $entry->setChild_id($row->child_id);
          $entries[] = $entry;
      }
      return $entries;
    }

}

