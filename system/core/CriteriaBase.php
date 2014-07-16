<?php
	class CriteriaBase{
		private $model = null;
		protected $returnType = ReturnType::AsModel;
	
		protected $fieldsObject;
		protected $distinctObject;
		protected $countObject;
		protected $sumObject;
		protected $whereObject;
		protected $limitObject;
		protected $orderObject;
		
		protected function __construct($model){
		  if(empty($model)){
			 throw new PipernateModelException(9001);
			}
		  $this->setModel($model);
		}
		
		public function setModel($model){
			if($model instanceof Model){
				$this->model = $model;
			}else{
				if(!@class_exists($model)){
					throw new PipernateModelException(9002);
				}
				$this->model =  new $model;
			}
		}
		
		public function getModel(){
			return $this->model;
		}
	
		protected function getWhereObject(){
			return $this->whereObject;
		}
	
		protected function getLimitObject(){
			return $this->limitObject;
		}
	
		protected function getOrderObject(){
			return $this->orderObject;
		}
	
		protected function getDistinctObject(){
			return $this->distinctObject;
		}
		
		protected function getCountObject(){
			return $this->countObject;
		}
	
		protected function getSumObject(){
			return $this->sumObject;
		}
		
	    protected function getFieldsObject(){
			return $this->fieldsObject;
		}
		
		protected function setReturnType($returnType){
			$this->returnType = $returnType;
		}
		
		public function getReturnType(){
			return $this->returnType;
		}
	}
	
?>