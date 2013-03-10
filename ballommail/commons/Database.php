<?php
/*
 * File Name: DataBase.php
 * FALTA incorporar mysql_real_escape_string //protecci�n contra SQL Injection.
 * Date: November 18, 2011
 * Author: Margarita Buriano
 * Description: Contains database connection, result
 *              Management functions, input validation
 *              All functions return true if completed
 *              successfully and false if an error
 *              occurred
 *
 */
class Database
{

	public $db_host='venus.hostignition.com';
	public $db_user='mburiano_bm';
	public $db_pass='26opo1unsm7v';
	public $db_name='mburiano_balloonmail';
	public $con=NULL;


    private static $instance;

    private function __construct() {
    /*	// no funciona bien integrado al resto (tema redirect)
     * $config = Config::singleton();
    	$this->db_host=$config->get('db_host');
    	$this->db_user=$config->get('db_user');
    	$this->db_pass=$config->get('db_pass');
    	$this->db_name=$config->get('db_name'); */


    }

	/**
    *    Returns THE instance of 'UserHandles'.
	*
    *    @return    object
    **/

    public static function getInstance()
    { if ( !isset(self::$instance))
        {	self::$instance = new self;
        	self::$instance->connect();

        }
        return self::$instance;
    }


    /*
     * Connects to the database, only one connection
     * allowed
     */
    public function connect()
    {	if(!$this->con)
        {	$this->con = @mysql_connect($this->db_host,$this->db_user,$this->db_pass, true);


            if($this->con)
            {
                $seldb = @mysql_select_db($this->db_name, $myconn);
                if($seldb)
                {
                    //$this->con = true;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                die('Could not connect: ' . mysql_error());

            }
            die('Could not connect: ' . mysql_error());
        }
        else
        {
            return true;
        }
    }

    /*
    * Changes the new database, sets all current results
    * to null
    */
    public function setDatabase($name)
    {
        if($this->con)
        {
            if(@mysql_close())
            {
                $this->con = false;
                $this->results = null;
                $this->db_name = $name;
                $this->connect();
            }
        }

    }

    /*
    * Checks to see if the table exists when performing
    * queries
    */
    private function tableExists($table)
    {
        $tablesInDb = @mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
       // echo 'SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"';
        if($tablesInDb)
        {
            if(mysql_num_rows($tablesInDb)==1)
            {	//echo "rows: ".mysql_num_rows($tablesInDb);
                return true;

            }
            else
            {
                return false;
            }
        }
    }

    /*
    * Selects information from the database.
    * Required: table (the name of the table)
    * Optional: rows (the columns requested, separated by commas)
    *           where (column = value as a string)
    *           order (column DIRECTION as a string)
    */
    public function select($table, $rows = '*', $where = null, $order = null)
    {	mysql_query("SET NAMES utf8");
        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;
		//echo "query: ".$q."<br/>";
        $result= mysql_db_query($this->db_name,$q, $this->con);

	   return $result;
    }

    /*
    * Insert values into the table
    * Required: table (the name of the table)
    *           values (the values to be inserted)
    * Optional: rows (if values don't match the number of rows)
    *
    */
    public function insert($table,$values)
    {	mysql_query("SET NAMES utf8");
        if($this->tableExists($table))
        {
            $insert = 'INSERT INTO '.$table;
            $keys = array_keys($values);
			$rows = implode(",",$keys);
            $insert .= ' ('.$rows.')';
			$size= count($values);
            for($i = 0; $i < $size; $i++)
            {

            	if ($values[$keys[$i]]!='now()') {
            		$escapeValues[$i]="'".mysql_real_escape_string($values[$keys[$i]])."'";
            	}
            	else
            		$escapeValues[$i]=mysql_real_escape_string($values[$keys[$i]]);
            }
            $val = implode(",",$escapeValues);
            $insert .= ' VALUES ('.$val.')';
            //echo $insert;
			$ins = @mysql_db_query($this->db_name, $insert);

            if($ins)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }
    /*
    * Deletes table or records where condition is true
    * Required: table (the name of the table)
    * Optional: where (condition [column =  value])
    */
    public function delete($table,$where = null)
    {	mysql_query("SET NAMES utf8");
        if($this->tableExists($table))
        {
            if($where == null)
            {
                $delete = 'DELETE '.$table;
            }
            else
            {
                $delete = 'DELETE FROM '.$table.' WHERE '.$where;
            }
            $del = @mysql_db_query($this->db_name, $delete);

            if($del)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    /*
     * Updates the database with the values sent
     * Required: table (the name of the table to be updated
     *           rows (the rows/values in a key/value array
     *           where (the row/condition in an array (row,condition) )
     */
    public function update($table,$rows,$where)
    {	mysql_query("SET NAMES utf8");
        if($this->tableExists($table))
        {
            // Parse the where values
            // even values (including 0) contain the where rows
            // odd values contain the clauses for the row
            for($i = 0; $i < count($where); $i++)
            {
                if($i%2 != 0)
                {
                    if(is_string($where[$i]))
                    {
                        if(($i+1) != null)
                            $where[$i] = '"'.$where[$i].'" AND ';
                        else
                            $where[$i] = '"'.$where[$i].'"';
                    }
                }
            }
            $where = implode('',$where);


            $update = 'UPDATE '.$table.' SET ';

            $keys = array_keys($rows);
            for($i = 0; $i < count($rows); $i++)
            {
                $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                // Parse to add commas
                if($i != count($rows)-1)
                {
                    $update .= ',';
                }
            }
            $update .= ' WHERE '.$where;
            $query = @mysql_db_query($this->db_name, $update);

            if($query)
            {  return true;
            }
            else
            {	echo "error en query".$update."error:".mysql_error();
                return false;
            }
        }
        else
        {	echo mysql_errno();
            return false;
        }
    }


    public function setUtf8(){
    	return mysql_query("SET NAMES utf8");

    }


	/**
	 * Retorna el resultado de consultar la p�gina $page de tama�o $size, de la $tabla, ordenado en forma $orderType, por el campo $order
	 * Enter description here ...
	 * @param unknown_type $table
	 * @param unknown_type $size
	 * @param unknown_type $page
	 * @param unknown_type $where
	 * @param unknown_type $order
	 * @param unknown_type $orderType
	 */
	function getPage($table,$rows = '*', $size, $page, $where, $order, $orderType){
		mysql_query("SET NAMES utf8");
		$q = 'SELECT '.$rows.' FROM '.$table;
	        if($where != null)
	            $q .= ' WHERE '.$where;
	        if($order != null)
	            $q .= ' ORDER BY '.$order." ".$orderType ;
	        if ($page != null && $size !=null)
	        	$q .= ' limit '. ($page-1)*$size . " , ".($size);

		$result=mysql_db_query($this->db_name, $q);
		//echo "Query getPage::".$q."<br/>";
		return $result;
	}

	public function executeQuery($query){
		mysql_query("SET NAMES utf8");
		$result=mysql_db_query($this->db_name,$query);
		return $result;
	}

	public function close(){
		mysql_close($this->con);
	}

	public function fetchArray($result) {
		$newResult= mysql_fetch_array($result);
		return $newResult;
	}

	public function freeResult($result) {
		return mysql_free_result($result);

	}

	function getNumRows($tableName) {
		$resultAll= $this->select($tableName, "*");
		return mysql_num_rows($resultAll);

	}

	function getTotalFilas($result) {
		return mysql_num_rows($result);
	}

}

/*
function __autoload($name) {
    include $class_name . '.php';
}
*/
?>