<?php

namespace ForINVIQA ;

class CalendarTest extends \PHPUnit_Framework_TestCase {

	protected function setUp(){
		
		$this->stub = $this->GetMock('DateTime') ;
		$this->test = new Calendar($this->stub);
		
	}
	
	public function testIncrementsMonth(){
		
		$this->stub->expects($this->once())->method('modify')->with("first day of next month") ;
		$this->stub->expects($this->once())->method('format')->with("F") ;
		$this->test->incrementMonth() ;
		
	}
	
	public function testReturnsLastWeekDayOfMonth(){
	
		$knownDates = Array(
			"8/8/1970"   => "Monday 31/08/1970",    //Last day of August 1970 is a Monday
			"3/3/1970"   => "Tuesday 31/03/1970",
			"9/9/1970"   => "Wednesday 30/09/1970",
			"12/12/1970" => "Thursday 31/12/1970",
			"7/7/1970"   => "Friday 31/07/1970"
		);
		
		foreach($knownDates as $month => $knownLastDayOfMonth){
		
			$test = new Calendar(new \DateTime($month)) ;
			$this->assertEquals($test->getLastDayOfMonth() , $knownLastDayOfMonth) ;
		}
	
	}
	
	public function testReturnsLastFridayOfWeekendEndingMonth(){
	
		$knownDates = Array(
			"10/10/1970" => "Friday 30/10/1970", //Friday 30th October 1970 is the last Friday of the month.
			"5/5/1970"   => "Friday 29/05/1970"
		) ;
		
		foreach($knownDates as $month => $knownLastFridayOfMonth){
		
			$test = new Calendar(new \DateTime($month)) ;
			$this->assertEquals($test->getLastDayOfMonth() , $knownLastFridayOfMonth) ;
		}		
	
	}
	
	public function testReturnsWeekday15thOfMonth(){
	
		$knownDates = Array(
			"6/6/1970"  => "Monday 15/06/1970",
			"9/9/1970"  => "Tuesday 15/09/1970",
			"4/4/1970"  => "Wednesday 15/04/1970",
			"1/1/1970"  => "Thursday 15/01/1970",
			"5/5/1970"  => "Friday 15/05/1970"
		);
		
		foreach($knownDates as $month => $known15th){
		
			$test = new Calendar(new \DateTime($month)) ;
			$this->assertEquals($test->getBonusDay() , $known15th) ;
		}		
	
	}
	
	public function testReturnsWednesdayFollowing15thOnWeekend(){
	
		$knownDates = Array(
			"8/8/1970"  => "Wednesday 19/08/1970",
			"3/3/1970"  => "Wednesday 18/03/1970",
		);
		
		foreach($knownDates as $month => $known15th){
		
			$test = new Calendar(new \DateTime($month)) ;
			$this->assertEquals($test->getBonusDay() , $known15th) ;
		}		
	
	}

}