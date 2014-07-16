<?php
class Fields{

	private $columns = Array();
	private $alias = Array();

	function getFieldsString(){
		$pattern = " `{column}` AS `{alias}`,";
		$fieldString = new String();
		
		for($i=0; $i<count($this->columns); $i++){
			$column = $alias = trim($this->columns[$i]);
			
			if(@$this->alias[$i]){
				$alias = trim($this->alias[$i]);
			}
			
			$p = $pattern;
			$p = str_replace("{column}", $column, $p);
			$p = str_replace("{alias}", $alias, $p);
			$fieldString->append($p);
		}
		
		$fieldString->trimRight(1);
		return $fieldString;
	}

	function addFieldsClause($columns, $alias){
		$seperator = ",";
		$this->columns 	= explode($seperator, $columns);
		$this->alias 	= explode($seperator, $alias);
	}
}
?>