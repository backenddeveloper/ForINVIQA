# ForINVIQA
A PHP command line application to be shown at interview.

To test run:
    ~$ phpunit --config tests/phpunit.xml

To build the application run:
    ~$ php build/buildScript.php
  
To deploy the application copy the file:
    ~$ application/Application.phar
  
To run the application:
    ~$ php Application.phar \<optional filename\>
The file is output into the current working directory.
  
In development/lib/Calendar.php read "$this->dateObject->format("l")"  as "Day of the week".

Note: The entry point is procedural because there wasn't more time to build the application.
