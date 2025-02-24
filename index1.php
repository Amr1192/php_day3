<?php

class Author {
   private $name;
   private $email;
   private $gender;
   function __construct($name,$email,$gender) {
    $this->name = $name;
    $this->email = $email;
    $this->gender = $gender;
   }
   function setEmail($email){
    $this->email = $email;}
   function getName() {
    return $this->name;}
   function getEmail() {
    return $this->email;}
   function getGender() {
    return $this->gender;}
    function __toString() {
        return "Author[name=$this->name,email=$this->email,gender=$this->gender]";
    }
    
   
}

// print_r(new Author(name:"ahmed",email:"sdfdf",gender:"f"));
$h = new Author("Amr","amr.gmail.com","m");
$hh = new Author("Ali","Ali.gmail.com","m");
$hhh = new Author("Aya","Aya.gmail.com","f");


class Book {
   private $authors=[];
   private $name;
   private $price;
   private $quantity;
   public function __construct( $authors,$name,$price,$quantity) {
    $this->authors = $authors;
    $this->name = $name;
    $this->price = $price;
    $this->quantity = $quantity;
   }
   function __toString() {
    $newAuthor = implode (", ",$this->authors);
    return "Book[authors=[$newAuthor],name=$this->name,price=$this->price,quantity=$this->quantity]";}

}
$b = new Book( [$h,$hh,$hhh],"english",20,3);
echo ($b);
?>
