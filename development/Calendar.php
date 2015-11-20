<?php

namespace ForINVIQA ;

class Calendar {

	private $dateObject ;

	public function __construct($dateTime){
	
		$this->dateObject = $dateTime ;
	
	}
	
	public function incrementMonth(){
	
		$this->dateObject->modify("+1 months") ;
	
	}
	
	public function getLastDayOfMonth(){
	
		$this->dateObject->modify("last day of this month") ;
		
		while(in_array($this->dateObject->format("l") , ["Saturday" , "Sunday"])){
		
			$this->dateObject->modify("-1 day") ;
		
		}
		
		return $this->dateObject->format("l d/m/Y") ;
	
	}

}