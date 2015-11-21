<?php

/*
 * Run with:
 *  ~$ php -d phar.readonly = 0 buildScript.php
 */
 
$phar = new Phar(dirname(__FILE__) . "/../application/Application.phar") ;
$phar->buildFromDirectory(dirname(__FILE__) . "/../development") ;