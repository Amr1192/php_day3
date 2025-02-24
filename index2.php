<?php
abstract class Person {
    private $name;
    private $address;

    function __construct($name, $address) {
        $this->name = $name;
        $this->address = $address;
    }

    function set_name($n): void { 
        $this->name = $n;
    }
    function get_name(): string {  
        return $this->name;
    }
    function set_address($a): void { 
        $this->address = $a;
    }
    function get_address(): string {  
        return $this->address;
    }

    abstract function __toString(): string;
}

class Student extends Person {
    private $program;
    private $year;
    private $fee;

    public function __construct($name, $address, $program, $year, $fee) {
        parent::__construct($name, $address);
        $this->program = $program;
        $this->year = $year;
        $this->fee = (float) $fee;  
    }

    function set_program($p): void { 
        $this->program = $p;
    }
    function get_program(): string {  
        return $this->program;
    }
    function set_year($y): void { 
        $this->year = $y;
    }
    function get_year(): int { 
        return $this->year;
    }
    function set_fee($f): void { 
        $this->fee = (float) $f; 
    }
    function get_fee(): float {  
        return $this->fee;
    }

    public function __toString(): string {
        return "Student: " . $this->get_name() . ", Address: " . $this->get_address() . 
               ", Program: " . $this->get_program() . ", Year: " . $this->get_year() . 
               ", Fee: " . $this->get_fee();
    }
}

class Staff extends Person {
    private $school;
    private $pay;

    public function __construct($name, $address, $school, $pay) {
        parent::__construct($name, $address);
        $this->school = $school;
        $this->pay = (float) $pay;
    }

    function set_school($s): void { 
        $this->school = $s;
    }
    function get_school(): string {  
        return $this->school;
    }
    function set_pay($p): void { 
        $this->pay = (float) $p; 
    }
    function get_pay(): float { 
        return $this->pay;
    }

    public function __toString(): string {
        return "Staff: " . $this->get_name() . ", Address: " . $this->get_address() . 
               ", School: " . $this->get_school() . ", Pay: " . $this->get_pay();
    }
}

$p = new Student("Amr", "Cairo", "CS", 2025, 60.0);
echo $p.'<br>';

$S = new Staff("Ali", "Alex", "Html", 3000.0);
echo $S;

interface Shape {
    public function getColor(): string;
    public function setColor(string $color): void;
    public function isFilled(): bool;
    public function setFilled(bool $filled): void;
    public function getArea(): float;
    public function getPerimeter(): float;
    public function __toString(): string;
}

class Circle implements Shape {
    private string $color;
    private bool $filled;
    private float $radius;

    public function __construct(float $radius = 1.0, string $color = "red", bool $filled = true) {
        $this->radius = $radius;
        $this->color = $color;
        $this->filled = $filled;
    }

    public function getRadius(): float {
        return $this->radius;
    }

    public function setRadius(float $radius): void {
        $this->radius = $radius;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color): void {
        $this->color = $color;
    }

    public function isFilled(): bool {
        return $this->filled;
    }

    public function setFilled(bool $filled): void {
        $this->filled = $filled;
    }

    public function getArea(): float {
        return pi() * pow($this->radius, 2);
    }

    public function getPerimeter(): float {
        return 2 * pi() * $this->radius;
    }

    public function __toString(): string {
        return "Circle[Shape[color={$this->color}, filled=" . ($this->filled ? "true" : "false") . "], radius={$this->radius}]";
    }
}

class Rectangle implements Shape {
    private string $color;
    private bool $filled;
    protected float $width;
    protected float $length;

    public function __construct(float $width = 1.0, float $length = 1.0, string $color = "red", bool $filled = true) {
        $this->width = $width;
        $this->length = $length;
        $this->color = $color;
        $this->filled = $filled;
    }

    public function getWidth(): float {
        return $this->width;
    }

    public function setWidth(float $width): void {
        $this->width = $width;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function setLength(float $length): void {
        $this->length = $length;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color): void {
        $this->color = $color;
    }

    public function isFilled(): bool {
        return $this->filled;
    }

    public function setFilled(bool $filled): void {
        $this->filled = $filled;
    }

    public function getArea(): float {
        return $this->width * $this->length;
    }

    public function getPerimeter(): float {
        return 2 * ($this->width + $this->length);
    }

    public function __toString(): string {
        return "Rectangle[Shape[color={$this->color}, filled=" . ($this->filled ? "true" : "false") . "], width={$this->width}, length={$this->length}]";
    }
}

class Square extends Rectangle {
    public function __construct(float $side = 1.0, string $color = "red", bool $filled = true) {
        parent::__construct($side, $side, $color, $filled);
    }

    public function getSide(): float {
        return $this->width;
    }

    public function setSide(float $side): void {
        $this->width = $this->length = $side;
    }

    public function setWidth(float $width): void {
        $this->setSide($width);
    }

    public function setLength(float $length): void {
        $this->setSide($length);
    }

    public function __toString(): string {
        return "Square[" . parent::__toString() . "]";
    }
}

$circle = new Circle(2.5, "blue", false);
echo $circle . "<br>";

$rectangle = new Rectangle(3.0, 4.5, "green", true);
echo $rectangle . "<br>";

$square = new Square(5.0, "yellow", false);
echo $square . "<br>";
?>