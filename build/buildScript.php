<?php

/*
 * Run with:
 *  ~$ php -d phar.readonly = 0 buildScript.php
 */
 
$phar = new Phar("../application/Application.phar") ;
$phar->buildFromDirectory("../development") ;