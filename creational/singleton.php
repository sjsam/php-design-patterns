<?php 

/*
 * Implementing a singleton class 
 * ie a class which has only one instance at
 * a given point of time. 
 * The best example is a Database Connection for a client
 * We want to have only one connection at a given point of time.
 */

 class DatabaseService {
   private function __construct(){
     echo "New instance created\n";
   }
   public static function getInstance():DatabaseService
   {
     static  $instance = null;
     if(null == $instance) {
       /*
        * static keyword allows us to late binding to refer to whatever class in the hierarchy you called
        * the method on. So if you want to have a single instance of some child class, you would use 
        * always use 'static' instead of 'self'
        */
       $instance = new static(); // Overcome the temptation to use self() here.
     }
     else {
       echo "Reusing the old instance\n";
     }
    return $instance;
   }
 }

 $dbInstance1 = DatabaseService::getInstance();
 $dbInstance2 = DatabaseService::getInstance();
 $dbInstance3 = DatabaseService::getInstance();