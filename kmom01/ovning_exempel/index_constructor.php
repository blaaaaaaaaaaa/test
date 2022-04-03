<?php
/**
 * KONSTRUKTOR OCH DESTRUKTUR
 * 
 * Konstruktorn anropas i samband med
 * att objektet skapas, eller
 * instansieras, tillsammans med
 * anropet till new.
 * 
 * Destruktorn är det sista som anropas
 * i klassen när den raderas och
 * förstörs.
 * 
 * Konstruktorn är en metod __construct()
 * som anropas när ett objekt skapas.
 */

$object = new Person4("MegaMic", 42);
$object = new Person4("MegaMic");
$object = new Person4();

/**
 * I PHP kan vi inte överlagra metoder
 * eller konstruktorn, genom att
 * skapa flera metoder som tar olika
 * varianter av argument. Vi får
 * skapa en metod som kan hantera
 * alla fallen via default argument.
 */

/**
 * KONSTRUKTOR VS SETTERS
 * 
 * En konstruktor kan alltså sätta
 * värden i ett objekt när det
 * instansieras. Med setters kan man
 * åstakomma liknande, men där skapar
 * man först objektet och sedan
 * sätter man dess värden.
 * 
 * En konstruktor och setters kan
 * komplettera varandra och vilken
 * väg man väljer kan skifta, lite
 * beroende av omständigheter och
 * vilken kod man vill ha.
 */

/**
 * DESTRUCTOR
 * 
 * När ett objekt förstörs så anropas
 * dess destruktor, om den finns.
 * I PHP är det inte nödvändigt med
 * en destruktor till ett objekt,
 * om det inte finns allokerade delar
 * som behöver förstöras för hand.
 * PHP’s automatiska garbage
 * hantering tar hand om och förstör
 * det minnet som är kopplat till
 * objektet.
 * 
 * För att testa så skapar vi en destruktor
 * till vår klass och vi skriver ut
 * en textsträng när destruktorn
 * anropas. Referensen __METHOD__ är
 * en inbyggd variabel i PHP som
 * berättar namnet på den metod som
 * nu exekveras.
 */

$object = new Person4("MegaMic", 42);
echo $object->details();
var_dump($object);

$object = new Person4("MegaMic");
echo $object->details();
var_dump($object);

$object = new Person4();
echo $object->details();
var_dump($object);
