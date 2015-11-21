<?php

namespace ForINVIQA ;

class FileTest extends \PHPUnit_Framework_TestCase {

	/**
     * @expectedException InvalidArgumentException
     */
	public function testRejectsInvalidFilename(){
	
		new File("invalid$ file- name") ;
	
	}

	public function testAcceptsValidFilename(){
	
		new File("Valid_File_Name") ;
	
	}
	
	public function tearDown(){
	
		try {
			unlink("test.csv") ;
		} catch (\Exception $e){}
	
	}

	private function createFile(){
	
		//A valid test for file creation requires the absence of a file.
		$this->assertFalse(file_exists("test.csv"));
		
		$test = new File("test") ;
		$test->open() ;
		return $test ;	
	
	}

	public function testOpensFile(){
	
		$this->createFile() ;

		$this->assertTrue(file_exists("test.csv"));
	
	}
	
	public function testPutsCSV(){
	
		$test = $this->createFile() ;
		$test->save(Array("Month" , "Bonus Day" , "Pay Day"));
		$test->save(Array("This Month" , "15th" , "Today"));
		
		$data = file_get_contents("test.csv") ;
		$this->assertEquals($data ,"Month,\"Bonus Day\",\"Pay Day\"\n\"This Month\",15th,Today\n");
	
	}

}