<?php

class Person {
    public string $name;
    public int $age;
    private string $cni;

    public function __construct(string $name = "Marco", int $age = 35)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public static function constructBis(string $name, int $age){
        return new static($name, $age);
    }

    public function setCNI(string $cni){
        $this->cni = $cni;
    }
}

function app() {
    $hardy = Person::constructBis("Hardy", 26);
    $hardy->setCNI("0123456789");

    $hardy_clone = new Person();
    $hardy_clone->name = "Hardy";
    $hardy_clone->age = 26;
    $hardy_clone->setCNI($hardy->cni); //impossible d'accéder à la cni de hardy car la propriété est privée

    print_r($hardy_clone);
    ($hardy == $hardy_clone) ? print_r("clone") : print_r("pas clone");
}

app();
