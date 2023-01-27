<?php

interface Copy {
    public function clone();
}

class Person implements Copy {
    public string $name;
    public int $age;

    public function __construct(string $name, string $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function clone()
    {
        return new Person($this->name, $this->age);
    }
}

function app() {
    $hardy = new Person("Hardy", 26);

    $hardy_draft = $hardy->clone();

    print_r($hardy_draft);
}

app();
