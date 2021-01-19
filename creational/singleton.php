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
       $instance = new static();
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