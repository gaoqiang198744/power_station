<?php
/**
 * Class that operate on table 'power_ammeter'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-29 10:45
 */
class PowerAmmeterMySqlDAO implements PowerAmmeterDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PowerAmmeterMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM power_ammeter WHERE ammeter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM power_ammeter';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM power_ammeter ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param powerAmmeter primary key
 	 */
	public function delete($ammeter_id){
		$sql = 'DELETE FROM power_ammeter WHERE ammeter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ammeter_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PowerAmmeterMySql powerAmmeter
 	 */
	public function insert($powerAmmeter){
		$sql = 'INSERT INTO power_ammeter (begin_value, end_value, creator_id, create_time) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerAmmeter->beginValue);
		$sqlQuery->setNumber($powerAmmeter->endValue);
		$sqlQuery->setNumber($powerAmmeter->creatorId);
		$sqlQuery->setNumber($powerAmmeter->createTime);

		$id = $this->executeInsert($sqlQuery);	
		$powerAmmeter->ammeterId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PowerAmmeterMySql powerAmmeter
 	 */
	public function update($powerAmmeter){
		$sql = 'UPDATE power_ammeter SET begin_value = ?, end_value = ?, creator_id = ?, create_time = ? WHERE ammeter_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($powerAmmeter->beginValue);
		$sqlQuery->setNumber($powerAmmeter->endValue);
		$sqlQuery->setNumber($powerAmmeter->creatorId);
		$sqlQuery->setNumber($powerAmmeter->createTime);

		$sqlQuery->setNumber($powerAmmeter->ammeterId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM power_ammeter';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByBeginValue($value){
		$sql = 'SELECT * FROM power_ammeter WHERE begin_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndValue($value){
		$sql = 'SELECT * FROM power_ammeter WHERE end_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreatorId($value){
		$sql = 'SELECT * FROM power_ammeter WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCreateTime($value){
		$sql = 'SELECT * FROM power_ammeter WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByBeginValue($value){
		$sql = 'DELETE FROM power_ammeter WHERE begin_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndValue($value){
		$sql = 'DELETE FROM power_ammeter WHERE end_value = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatorId($value){
		$sql = 'DELETE FROM power_ammeter WHERE creator_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreateTime($value){
		$sql = 'DELETE FROM power_ammeter WHERE create_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PowerAmmeterMySql 
	 */
	protected function readRow($row){
		$powerAmmeter = new PowerAmmeter();
		
		$powerAmmeter->ammeterId = $row['ammeter_id'];
		$powerAmmeter->beginValue = $row['begin_value'];
		$powerAmmeter->endValue = $row['end_value'];
		$powerAmmeter->creatorId = $row['creator_id'];
		$powerAmmeter->createTime = $row['create_time'];

		return $powerAmmeter;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PowerAmmeterMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>