<?php

//class
class Electromotor
{
    // property
    public $var = 'test';

    protected $protected = 'protected property';

    private $private = 'private property';


    public function __construct()
    {
        echo '!!!! asta este apelata automat 1  !!!';
    }

    //method
    public function startCar()
    {
        $this->protected;

        $this->private;

        echo 'pornest motorul';
    }


    public function duplicateMethod()
    {
        echo 'this is from electromotor';
    }
}


class Masina extends Electromotor
{
    public function __construct()
    {
        echo '!!!! asta este apelata automat 2  !!!';
    }

    public function openCar()
    {
        $this->protected;

        echo 'opne car';
    }
}

class Dealer extends Masina
{
    public function __construct()
    {
        echo '!!!! asta este apelata automat 3  !!!';
    }

    public function sellCar()
    {
        $this->startCar();

        echo $this->var;

        echo 'sell car';
    }

    public function duplicateMethod()
    {
        parent::duplicateMethod();
        
        echo 'this is from dealer';
    }
}

//object
$dealer = new Dealer();
$dealer->openCar();
$dealer->startCar();
$dealer->sellCar();

echo '<br>';

echo $dealer->var;

echo '<br>';

$dealer->duplicateMethod();




