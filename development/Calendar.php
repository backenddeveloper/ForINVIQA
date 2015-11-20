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

}