<?php

/*
 * A Facade is a structural design pattern used to 
 * present complex subsystems with a simplified 
 * interface which can also be of limited functionality
 * Consider a Plane Pilot 
 *  Behind the hoods, they will do following operations using the functionality 
 *  in the cockpit
 *    -   Fuel Injection
 *    -   Throttle
 * 
 * But for a passenger, a pilot just flies a plane.
 *       
 */

class Electronics {
  public function electronicsChecking(){
      echo "Checking if the electronic systems are alright\n";
  }
}

class Throttle {
  public function throttle(){
      echo "Managing the power to the engine\n";
  }
}

class Pilot {
  protected Electronics $electronics;
  protected Throttle $throttle;
 
  public function __construct()
  {
    $this->electronics = new Electronics();
    $this->throttle = new Throttle();
  }
 
  public function pilot(){
    $this->electronics->electronicsChecking();
    $this->throttle->throttle();   
  }
}

/*
 * Client code.
 * For the client it is just a Pilot flying the plane.
 */

 function flyPlane(Pilot $pilot){
  $pilot->pilot();
 }

// Business Logic
$john = new Pilot(); // John is our Pilot :-)
// Asking John to fly the plane
flyPlane($john);