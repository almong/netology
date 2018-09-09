<?php

    class Car 
    {
        public $color;
        public $model;
        public $brand;
        public $price;

        public function __construct($brand, $model, $color, $price)
        {
            $this->brand = $brand;
            $this->model = $model;
            $this->color = $color;
            $this->price = $price;
        }
    }

    class Tv 
    {
    public $brand;
    public $model;
    public $size;
    public $price;

    public function __construct($brand, $model, $size, $price)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->size = $size;
        $this->price = $price;
    }
    }

    class BallPen 
    {
    public $brand;
    public $color;
    public $price;

    public function __construct($brand, $color, $price)
    {
        $this->brand = $brand;
        $this->color = $color;
        $this->price = $price;
    }
    }

    class Duck 
    {
    public $age;
    public $weight;
    public $price;

    public function __construct($age, $weight, $price)
    {
        $this->age = $age;
        $this->weight = $weight;
        $this->price = $price;
    }
    }

    class Product 
    {
    public $name;
    public $type;
    public $price;

    public function __construct($name, $type, $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }
    }
    
    $car1 = new Car('BMW', '525i', 'Black', 10000);
    $car2 = new Car('Audi', 'Q7', 'White', 12000);

    $tv1 = new Tv('LG', 'W345', 42, 2000);
    $tv2 = new Tv('Sony', 'F22', 22, 1000);

    $ballPen1 = new BallPen('Parker', 'Black', 700);
    $ballPen2 = new BallPen('NoName', 'Blue', 5);

    $duck1 = new Duck(2,5,10);
    $duck2 = new Duck(3,8,15);

    $product1 = new Product('Изодента', 'Хохтовары', 1);
    $product2 = new Product('Мотоко', 'Продукты питания', 5);

?>