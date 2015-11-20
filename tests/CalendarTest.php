<?php

namespace ForINVIQA ;

class CalendarTests extends \PHPUnit_Framework_TestCase {

	protected function setUp(){
		
		$this->stub = $this->GetMock('DateTime') ;
		$this->test = new Calendar($this->stub);
		
	}
	
	public function testIncrementsMonth(){
		
		$this->stub->expects($this->once())->method('modify')->with("+1 months") ;
		$this->test->incrementMonth() ;
		
	}

}