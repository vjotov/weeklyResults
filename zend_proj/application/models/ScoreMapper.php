<?php

class Application_Model_ScoreMapper
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
            $this->setDbTable('Application_Model_DbTable_Score');
        }
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Score $parent) 
    {
    // Out of scope for the task
    }
    
    public function find($id, Application_Model_Score $parent)
    {
    // Out of scope for the task
    }
    
    public function fetchAll()
    {
    // Out of scope for the task
    }
    
    public function fetchAllByChild($child_id, $order_by)
    {
      if($order_by == "asc")
        $order_str = "d.discipline_name ASC";
      elseif($order_by == "desc")
        $order_str = "d.discipline_name DESC";
      else
        $order_str = "s.date ASC";
        
      $db = Zend_Db_Table::getDefaultAdapter();  

      // The following represent the query in SQL format. Both sections, commented and the folloing one, have equal behaviour.
      
      /*$query = sprintf("SELECT c.child_name, s.score, s.date, discipline_name, ". 
                      "IF((SELECT count(s1.score) FROM score s1 WHERE s1.child_id= s.child_id AND s1.score = 2 AND s1.discipline_id = s.discipline_id AND s1.date BETWEEN date_sub(curdate(),interval 7 day) and date_sub(curdate(),interval 1 day) )>0,'1','0') AS red, ".
                      "IF((SELECT COUNT(DISTINCT s2.score) FROM score s2 WHERE s2.child_id= s.child_id AND s2.discipline_id = s.discipline_id AND s2.date BETWEEN date_sub(curdate(),interval 7 day) and date_sub(curdate(),interval 1 day) HAVING MAX(score) = 5) = 1,'1','0') as green ".
                      "FROM score s INNER JOIN discipline d USING(discipline_id) INNER JOIN child c USING (child_id) ".
                      "WHERE s.child_id = %u AND s.date BETWEEN date_sub(curdate(),interval 7 day) and date_sub(curdate(),interval 1 day) ORDER BY %s ",
                      $child_id, $order_str);
       $resultSet = $db->query($query)->fetchAll();
       //*/      
      
      $select = $db->select();
      $select         ->from(array("s"=>"score"), array("s.score", "s.date"))
                      ->joinInner(array("d"=>"discipline"),"d.discipline_id = s.discipline_id", "d.discipline_name")
                      ->joinUsing("child","child_id", "child_name")
                      ->columns("IF((SELECT count(s1.score) FROM score s1 WHERE s1.child_id = s.child_id AND s1.score = 2 AND s1.discipline_id = d.discipline_id AND s1.date BETWEEN date_sub(curdate(),interval 7 day) and date_sub(curdate(),interval 1 day) )>0,'1','0') AS red")
                      ->columns("IF((SELECT COUNT(DISTINCT s2.score) FROM score s2 WHERE s2.child_id = s.child_id AND s2.discipline_id = d.discipline_id AND s2.date BETWEEN date_sub(curdate(),interval 7 day) and date_sub(curdate(),interval 1 day) HAVING MAX(score) = 5)=1,'1','0') as green")
                      ->where(sprintf("s.child_id = %u ", $child_id))
                      ->where("s.date BETWEEN date_sub(curdate(),interval 7 day) and date_sub(curdate(),interval 1 day) ")
                      ->order($order_str);
      $resultSet = $db->query($select)->fetchAll();
      
      foreach ($resultSet as $row) {
            $entry = new Application_Model_Score($row);
            $entries[] = $entry;
      }
      return $entries;   
    }

}

