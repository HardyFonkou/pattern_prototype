<?php

//Evitons que la classe ne soit instantiable
abstract class Person {
    public string $name;
    public int $age;

    public function __construct(string $name, string $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    //Faisons en sorte que la méthode soit toujour implémenté par les enfants de la classe
    abstract public function clone(): Person;
}

class Doctor extends Person{
    private string $profession;

    public function __construct(string $name, string $age)
    {
        parent::__construct($name, $age);
        $this->profession = "Médecin";
    }

    public function setProfession(string $profession){
        $this->profession = $profession;
    }

    public function clone(): Person
    {
        $this->setProfession($this->profession);
        return new Doctor($this->name, $this->age);
    }
}

class Teacher extends Person{
    private string $profession;

    public function __construct(string $name, string $age)
    {
        parent::__construct($name, $age);
        $this->profession = "Professeur";
    }

    public function setProfession(string $profession){
        $this->profession = $profession;
    }

    public function clone(): Person
    {
        $clone = new Teacher($this->name, $this->age);
        $clone->setProfession($this->profession);
        return $clone;
    }
}

function app() {
    $hardy = new Doctor("Hardy", 26);

    $alice = new Teacher("Alice", 24);
    $alice->setProfession("Maîtresse");

    $hardy_clone = $hardy->clone();
    $alice_clone = $alice->clone();

    print_r($hardy_clone);

    print_r($alice_clone);
}

app();

