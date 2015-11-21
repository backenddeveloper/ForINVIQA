<?php

namespace ForINVIQA ;

class Calendar {

	private $dateObject ;

	public function __construct(\DateTime $dateTime){
	
		$this->dateObject = $dateTime ;
	
	}
	
	public function incrementMonth(){
	
		$this->dateObject->modify("first day of next month") ;
				
		return $this->dateObject->format("F") ;
	
	}
	
	public function getLastDayOfMonth(){
	
		$this->dateObject->modify("last day of this month") ;
				
		while(in_array($this->dateObject->format("l") , ["Saturday" , "Sunday"])){
		
			$this->dateObject->modify("-1 day") ;
		
		}
		
		return $this->dateObject->format("l d/m/Y") ;
	
	}
	
	public function getBonusDay(){
	
		$this->dateObject->modify("first day of this month") ;
		$this->dateObject->modify("+14 days") ;
		
		if(in_array($this->dateObject->format("l") , ["Saturday" , "Sunday"])){
			
			while($this->dateObject->format("l") !== "Wednesday"){
		
				$this->dateObject->modify("+1 day") ;
		
			}
		
		}
		
		return $this->dateObject->format("l d/m/Y") ;
	
	}

}