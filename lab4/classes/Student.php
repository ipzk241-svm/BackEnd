<?php

class Student extends Human
{
    private string $university;
    private int $course;
    private string $favCoffe;

    public function __construct(float $height, float $weight, int $age, string $name, string $university, int $course, string $favCoffe)
    {
        parent::__construct($height, $weight, $age, $name);
        $this->university = $university;
        $this->course = $course;
        $this->favCoffe = $favCoffe;
    }

    public function getUniversity(): string
    {
        return $this->university;
    }

    public function setUniversity(string $university): void
    {
        $this->university = $university;
    }

    public function getCourse(): int
    {
        return $this->course;
    }

    public function setCourse(int $course): void
    {
        $this->course = $course;
    }

    public function getFavCoffe(): string
    {
        return $this->favCoffe;
    }

    public function setFavCoffe(string $favCoffe): void
    {
        $this->favCoffe = $favCoffe;
    }

    public function increaseCourse(): void
    {
        $this->course++;
    }

    public function __tostring(): string
    {
        return parent::__tostring() . ", University: {$this->university}, Course: {$this->course}, Favourite coffe: {$this->favCoffe}";
    }
    public function childNotify(): string
    {
        return "В студента народився молодший фаховий спеціаліст";
    }
    public function cleanKitchen(): string
    {
        return "Студент прибирає кухню";
    }
    public function cleanRoom(): string
    {
        return "Студент прибирає кімнату";
    }
}
