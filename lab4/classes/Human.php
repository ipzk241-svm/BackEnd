<?php

abstract class Human implements IHouseCleaning
{
    private float $height;
    private float $weight;
    private int $age;
    private string $name;

    public function __construct(float $height, float $weight, int $age, string $name)
    {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
        $this->name = $name;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function __tostring()
    {
        return "Name: {$this->name}, Age: {$this->age}, Height: {$this->height}m, Weight: {$this->weight}kg";
    }

    public function childBirth()
    {
        return $this->childNotify();
    }

    abstract protected function childNotify(): string;
}
