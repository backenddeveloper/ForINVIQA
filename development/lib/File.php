<?php

namespace ForINVIQA ;

class File {

	private $filename ;
	private $fileHandle ;

	public function __construct($filename = "output"){
	
		if(preg_match("/[^a-zA-Z0-9_]/" , $filename) || strlen($filename) === 0){

			throw new \InvalidArgumentException("Filename can only contain letters,"
							   ."numbers and underscores\n") ;
			
		}

		$this->filename = $filename . ".csv";
	
	}
	
	public function open(){
	
		$this->fileHandle = fopen(getcwd() . "/" . $this->filename , "w") ;
	
	}
	
	public function save(Array $data){
	
		fputcsv($this->fileHandle , $data) ;
	
	}

}
