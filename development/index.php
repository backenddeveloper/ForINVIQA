<?php

namespace ForINVIQA ;
use \DateTime ;

require "lib/Calendar.php" ;
require "lib/File.php" ;

try {

	$filename = (isset($argv[1])) ? $argv[1] : "output" ;
	
	$file = new File($filename) ;
	$file->open() ;
	
	$calendar = new Calendar(new DateTime) ;
	
	//First the column headers.
	$file->save(Array("Month" , "Bonus Day" , "Payday")) ;
	
	//Then this month.
	$file->save(Array("This Month" , $calendar->getBonusDay() , $calendar->getLastDayOfMonth())) ;
	
	//Then the subsequent 12 months.
	for($month = 1 ; $month < 13 ; $month++){
		$monthName = $calendar->incrementMonth() ;
		$file->save(Array($monthName , $calendar->getBonusDay() , $calendar->getLastDayOfMonth())) ;
	}
	
} catch (\Exception $exception){

	echo $exception->getMessage() ;
	exit(1) ;

}