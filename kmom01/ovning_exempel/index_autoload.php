<?php
/**
 * En autoloader sköter så att klassfilerna
 * laddas in automatiskt, när de
 * behövs.
 * Det är en inbyggd konstruktion i
 * PHP.
 * 
 * Om man  bygger en autoloader så
 * slipper man göra include och require
 * på klassfilerna.
 */

/**
 * KOD FÖR AUTOLOADER
 * 
 * När ett objekt skapas från en klass
 * via new så kontrollerar PHP om
 * klassen är känd eller ej.
 * Om klassen inte finns definierad
 * sedan tidigare så anropas de
 * autoloaders som finns.
 * 
 * Man kan lägga till en egen
 * autoloader genom att definiera en
 * funktion och registrera den som en
 * autoloader.
 */

/**
 * Show off the autoloader.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

$object = new Person4("MegaMic", 42);
echo $object->details();
var_dump($object);

/**
 * Fördelen med en autoloader är att
 * man inte behöver inkludera
 * klassfilerna, det sköts automatiskt,
 * allt eftersom klassfilerna behövs.
 */
