<?php

include_once 'Database.php';

class EntityDAO {

	protected $dataBase;
 	protected $tableName;


	function __construct($name) {
		$this->tableName= $name;
		$this->dataBase=Database::getInstance();

	}

	public function getAll() {

		$result =$this->dataBase->select($this->tableName, "*");
		return $result;
	}

	public function getById($id){
		return $this->dataBase->select($this->tableName, "*", "id='$id'");
	}

	public function get($rows = '*', $where = null, $order = null){

		return $this->dataBase->select($this->tableName, $rows, $where, $order);
	}

	public function delete($where = null){
		return $this->dataBase->delete($this->tableName, $where);

	}
	public function update($rows,$where = null) {
		return $this->dataBase->update($this->tableName,$rows, $where);
	}




	public function insert($values) {
		return $this->dataBase->insert($this->tableName,$values, $rows);
	}
	/**
	 *
	 * Retorna el resultado de consultar la p�gina de tama�o size, del entity, ordenado en forma $orderType, por el campo $order
	 * @param  $size
	 * @param  $rows
	 * @param  $page
	 * @param  $where
	 * @param  $order
	 * @param  $orderType
	 */
	function getPage($rows, $size, $page, $where, $order, $orderType){

		$result=$this->dataBase->getPage($this->tableName,$rows,$size, $page, $where, $order, $orderType);
		return $result;
	}



	function __destruct() {
	}


	function getLastInsertId() {
		 return mysql_insert_id();

	}

	function fetchArray($result) {
		return $this->dataBase->fetchArray($result);
	}

	function freeResult($result) {
		return $this->dataBase->freeResult($result);
	}

	function getNumRows() {
		return $this->dataBase->getNumRows($this->tableName);

	}

	function getTotalFilas($result) {
		return $this->dataBase->getTotalFilas($result);
	}

/*
	function executeQuery($sql) {
		return $this->dataBase->executeQuery($sql);
	}*/
}



?>