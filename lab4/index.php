<?php

use Controllers\UserController;
use Models\UserModel;
use Views\UserView;

require_once 'autoload.php';

// task 1-4
$user = new UserModel(1, "Vasya", "fdafa@gmail.com", "1234");
echo $user->getName();
echo "<br>";
$userController = new UserController();
echo $userController->show();
$userView = new UserView();
$userView->render($user);

// task 5-6
$cirlce = new Circle(10, 20, 30);
echo $cirlce;
echo "<br>";
$cirlce->setRadius(5);
$cirlce->setX(15);
echo $cirlce;

function circlesIntersect($circle1, $circle2)
{
    $distance = sqrt(pow($circle1->getX() - $circle2->getX(), 2) + pow($circle1->getY() - $circle2->getY(), 2));
    return $distance < ($circle1->getRadius() + $circle2->getRadius());
}

$circle1 = new Circle(10, 20, 30);
$circle2 = new Circle(40, 50, 10);
echo "<br>";

if (circlesIntersect($circle1, $circle2)) {
    echo "Кола перетинаються";
} else {
    echo "Кола не перетинаються";
}

// task 7
FileWorker::writeFile('textFile1.txt', "test text 1!\n");
// FileWorker::writeFile('textFile2.txt', "test text 2!\n");
echo "<br>";
echo FileWorker::readFile('textFile1.txt');
echo "<br>";
// echo FileWorker::readFile('textFile2.txt');
echo "<br>";
FileWorker::clearFile('textFile1.txt');
echo FileWorker::readFile('textFile1.txt');
echo "<br>";
// echo FileWorker::readFile('textFile2.txt');
echo "<br>";

// task 8
$student = new Student(172.2, 76.5, 20, "Vitalik", "Politech", 2, "Latte");
$student->setWeight(88.2);
$student->increaseCourse();
echo $student;
echo "<br>";
$programmer = new Programmer(182.2, 82.5, 21, "Dima", 2);
$programmer->setHeight(160.5);
$programmer->addProgrammingLanguage("PHP");
$programmer->addProgrammingLanguage("C#");
echo $programmer;
echo "<br>";

// task 9
echo $student->childBirth();
echo "<br>";
echo $programmer->childBirth();
echo "<br>";
echo $student->cleanRoom();
echo "<br>";
echo $student->cleanKitchen();
echo "<br>";
echo $programmer->cleanRoom();
echo "<br>";
echo $programmer->cleanKitchen();
echo "<br>";
