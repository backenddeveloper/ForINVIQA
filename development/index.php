<?php

namespace ForINVIQA ;

require "lib/Calendar.php" ;
require "lib/File.php" ;

try {

	$calendar = new Calendar(new \DateTime) ;
	$file = (isset($argv[1]) && is_string($argv[1])) ? new File($argv[1]) : new File() ;
	$file->open() ;
	$file->save(Array("Month" , "Bonus Day" , "Payday")) ;
	$file->save(Array("This Month" , $calendar->getBonusDay() , $calendar->getLastDayOfMonth())) ;
	for($month = 1 ; $month < 13 ; $month++){
		$monthName = $calendar->incrementMonth() ;
		$file->save(Array($monthName , $calendar->getBonusDay() , $calendar->getLastDayOfMonth())) ;
	}
	
} catch (\Exception $exception){

	echo $exception->getMessage() ;
	exit(1) ;

}

