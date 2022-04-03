<?php
/**
 * Funktioner som ligger som medlemmar
 * i en klass brukar man omtala som
 * metoder.
 * 
 * Properties som ligger i klassen
 * brukar man även kalla medlemsvariabler.
 */

$object = new Person2();
$object->age = 42;
$object->name = "MegaMic";

echo $object->details();
var_dump($object);

/**
 * DET EGNA OBJEKTET, $this
 * 
 * Variabeln $this är en referens till
 * det nuvarande objektet och används
 * i klassens metoder för att referera
 * till det objekt som anropar metoden.
 * 
 * Utanför objektet så kan en metod
 * anropas så här, det är en kombination
 * av objektet och dess metod.
 * $object->details();
 */

/**
 * Inuti metoden så används $this för
 * att referera till det objekt som anropar
 * metoden, i detta fallet $object.
 * 
 * /**
 * * Print out details on the person.
 * *
 * * @returns string with details on person.
 * *
 * public function details() {
 *   return "My name is {$this->name} and I am {$this->age} years old.";
 * }
 * 
 * I det här fallet är alltså $this samma
 * sak som $object.
 * 
 * Klassens metoder innehåller generell
 * kod som fungerar för alla objekt av
 * klassen och $this är sättet att
 * referera till det anropade objektet,
 * instansen av klassen, och dess
 * specifika medlemsvariabler.
 * 
 * För att komma åt medlemsvariabeln
 * $age så skriver man $this->age i metoden.
 * 
 * I exemplet ovanför används {} för
 * att omringa variabeln inuti textsträngen,
 * det är för att variabeln ska kunna
 * parsas inom ramen för textsträngen.
 */
