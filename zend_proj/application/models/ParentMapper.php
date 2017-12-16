<?php

class Application_Model_ParentMapper
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
            $this->setDbTable('Application_Model_DbTable_Parent');
        }
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Parent $parent) 
    {
    // Out of scope for the task
    }
    
    public function find($id, Application_Model_Parent $parent)
    {
    // Out of scope for the task
    }
    
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll($this->_dbTable->select()->order('parent_name ASC'));
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Parent();
            $entry->setParent_id($row->parent_id);
            $entry->setParent_name($row->parent_name);
            $entries[] = $entry;
        }
        return $entries;
    }
}

