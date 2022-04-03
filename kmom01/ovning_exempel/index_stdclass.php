<?php
// Skapa ett objekt i PHP utan att ha en
// klass som mall för objektet.
// stdClass är en fördefinierad klass i PHP.
// Med hjälp av den kan man skapa ett tomt
// objekt via operatorn new.

$object = new stdClass();
var_dump($object);
// Man skapar ett nytt new objekt, eller
// instans, av klassen stdClass.

/**
 * MUTABLE OBJECT
 * 
 * Objekten vi skapar är mutable och kan
 * därmed förändra sin struktur över sin
 * levnadstid.
 * 
 * Ett objekt som däremot är immutable är
 * motsatsen och där kan man inte lägga till
 * eller ta bort attribut från objektet.
 * 
 * Immutable objekt följer en fast mall som
 * klassen erbjuder. Mutable objekt kan
 * förändras och medlemmar kan läggas till
 * eller tas bort.
 * 
 * Den här instansen av stdClass är mutable
 * och man kan därmed lägga till två properties.
 */

$object = new stdClass();
$object->age = 42;
$object->details = function() {
    echo "Hi, I'm an object!";
};

echo ($object->details)() . " " . $object->age;
var_dump($object);

/**
 * POLOPERATORN ->
 * 
 * När man accessar ett objekts properties
 * (eller medlemmar) så använder man
 * piloperatorn ->.
 */

/**
 * ALLT PUBLIKT
 * 
 * Så som $object fungerar i den här övningen
 * så är all information publik och nåbar
 * för den som använder objektet.
 * 
 * När man pratar objektorientering brukar man
 * prata om inkapsling och att användaren
 * av objektet bara har tillgång till viss
 * information, men till det behövs en mer
 * anpassad klass.
 */
