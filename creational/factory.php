<?php

/*
 * Factory is a creational design pattern  where objects have to be created
 * dynamically whose types are know only at the run-time.
 * The below example demonstrates the Factory desgin pattern using a the real world
 * Courier Service business model.
 */

interface Transport {
  public function readied();
  public function dispatch();
  public function delivery();
}

class TruckTransport implements Transport{
  public function readied(){
    echo "Package being readied to be transported by truck\n";
  }
  public function dispatch(){
    echo "Package dispatched by truck\n";
  }
  public function delivery(){
    echo "Package delivered by truck\n";
  }
}

class AirTransport implements Transport{
 public function readied(){
    echo "Package being readied to be transported by air\n";
  }
  public function dispatch(){
    echo "Package dispatched by air\n";
  }
public  function delivery(){
    echo "Package delivered by air\n";
  }
}

// Abstract creator
  abstract class Courier{
  // Factory method
  abstract function getCourierTransport():Transport;
  function sendCourier(){
      $courierTransport = $this->getCourierTransport();
      $courierTransport->readied();
      $courierTransport->dispatch();
      $courierTransport->delivery();
  }
}

// Concrete creator for air courier
class AirCourier extends Courier{
  // Factory method
  function getCourierTransport():Transport{
    return new AirTransport();
  }
}

// Concrete creator for air courier
class RoadCourier extends Courier{
  // Factory method
  function getCourierTransport():Transport{
    return new TruckTransport();
  }
}

// Driver function
function sendCourier(Courier $courier ){
  $courier->sendCourier();
}

echo "Road Courier Test\n";
sendCourier(new RoadCourier());


echo "Air Courier Test\n";
sendCourier(new AirCourier());
