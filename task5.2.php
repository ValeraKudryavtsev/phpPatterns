<?php

class SquareAreaLib {
    public function getSquareArea(int $diagonal) {
        $area = ($diagonal**2)/2;
        return $area;
    }
}

interface ISquare {
    function squareArea(int $sideSquare);
}

class Square implements ISquare {
    protected $square;

    public function __construct()
    {
        $this->square = new SquareAreaLib();
    }

    public function squareArea(int $sideSquare)
    {
        $diagonal = sqrt(($sideSquare**2)*2);
        return $this->square->getSquareArea($diagonal);
    }
}

class CircleAreaLib {
    public function getCircleArea(int $diagonal) {
        $area = (M_PI * $diagonal**2)/ 4;
        return $area;
    }
}

interface ICircle {
    function circleArea(int $circumference);
}

class Circle implements ICircle {
    protected $circle;

    public function __construct()
    {
        $this->circle = new CircleAreaLib();
    }

    public function circleArea(int $circumference)
    {
        $diagonal = $circumference / M_PI;
        return $this->circle->getCircleArea($diagonal);
    }
}

$squareArea = new Square();
var_dump($squareArea->squareArea(123));

$circleArea = new Circle();
var_dump($circleArea->circleArea(123));