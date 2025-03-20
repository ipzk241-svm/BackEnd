<?php

class Programmer extends Human
{
    private array $programmingLanguages = [];
    private float $experience;

    public function __construct(float $height, float $weight, int $age, string $name, float $experience)
    {
        parent::__construct($height, $weight, $age, $name);
        $this->experience = $experience;
    }

    public function getProgrammingLanguages(): array
    {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages(array $languages): void
    {
        $this->programmingLanguages = $languages;
    }

    public function getExperience(): float
    {
        return $this->experience;
    }

    public function setExperience(float $experience): void
    {
        $this->experience = $experience;
    }

    public function addProgrammingLanguage(string $language): void
    {
        $this->programmingLanguages[] = $language;
    }

    public function __toString(): string
    {
        $languages = implode(', ', $this->programmingLanguages);
        return parent::__toString() . " Experience: {$this->experience} years, Programming Languages: {$languages}";
    }

    public function childNotify(): string{
        return "В програміста народився сварщик 1 розряду";
    }
    public function cleanKitchen(): string{
        return "Програміст прибирає кухню";
    }
    public function cleanRoom(): string{
        return "Програміст прибирає кімнату";
    }
}
