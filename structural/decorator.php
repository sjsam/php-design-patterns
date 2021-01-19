<?php
/*
 * Decorator Structural Design pattern
 * Enforces the priciple a class should be open for extension and closed for modification.
 * Example 
 * A Pizza Shop sells three Pizzas  - Margherita, Veggie Paradize  and Farm House
 * These three varieties can have one of the three toppings - Extra Cheese, Jalapeno, Pepperoni.
 * A typical inheritance model will not work in these cases as the total number of classes grows
 * almost exponentially. Also,the cost of the Pizzas as well as Toppings are time sensitive.
 * If we use the multiple inheritance classes, we have to change a lot of things in code for a single
 * change and that can break things as well.
 * This is where we typically employ the Decorator design pattern.
 * We will be using these extensively in our Laravel controllers.
 * An example implementation is given below
 */
// Pizza Interface - common to all.

interface Pizza{
  public function getDesc():String;
}

// Concrete Pizza Object
class Margherita implements Pizza{
  public function getDesc():String{
    return 'Margherita';
  }
}

// Concrete Pizza Object
class VeggieParadize implements Pizza{
  public function getDesc():String{
    return 'Veggie Paradize';
  }
}

// Base Decorator
class PizzaTopping implements Pizza{
  protected $pizza;
  public function __construct(Pizza $pizza){
    $this->pizza = $pizza;
  }
  public function getDesc():String{
    return $this->pizza->getDesc();
  }
}

// Concrete Decorator for Extra Cheese
class ExtraCheese extends PizzaTopping{
  public function getDesc():String{
    return parent::getDesc().' with Extra Cheese';
  }
}

// Concrete Decorator for Jalepeno
class Jalapeno extends PizzaTopping{
  public function getDesc():String{
    return parent::getDesc().' with Jalapeno';
  }
}

// Client Code
function giveMePizza(Pizza $pizza){
  print($pizza->getDesc()."\n");
}

// Business Logic
// Order a Margherita
$pizza = new Margherita();
// Add extra cheese
$pizza = new ExtraCheese($pizza);
// Add Jalapeno
$pizza = new Jalapeno($pizza);
// Get the pizza
giveMePizza($pizza);