<?php

/*
 * Example of strategy
 * A Strategy is the route you would adopt to reach an end point.
 * 
 */
// Abstract Strategy
 interface  PaymentGateway{
   public function pay($amount);
 }
 // Concrete Strategy
 class PayByCard implements PaymentGateway{
  public function pay($amount){
    print("Paying ${amount} by Credit/Card\n");
  }
 }
 // Concrete Strategy
 class PayByPaypal implements PaymentGateway{
  public function pay($amount){
    print("Paying ${amount} by Paypal\n");
  }
 }

 class Order{
   private PaymentGateway $paymentGateway;
   private float $amount;
   public function __construct($amt,$pg){
     $this->paymentGateway = $pg;
     $this->amount = $amt;
   }
   public function fulfill(){
     $this->paymentGateway->pay($this->amount);
   }
 }

 $order = new Order(2500.0,new PayByCard());
 $order->fulfill();

 $order = new Order(3500.0,new PayByPaypal());
 $order->fulfill();




