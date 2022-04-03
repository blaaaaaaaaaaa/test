<?php
/**
 * Testprogram för att testa hur
 * det ser ut när vårt exception
 * kastas.
 */
try {
    $person = new Person5("MegaMic");
    $person->setAge(-42);
} catch (PersonAgeException $e) {
    echo "Got exception: " . get_class($e) . "<hr>";
}

$person = new Person5("MegaMic", -42);

/**
 * FÖRDEL MED EGNA EXCEPTION
 * 
 * När man utvecklar moduler som andra
 * skall återanvända, eller större
 * programvara som består av ett
 * större antal moduler, så kan det
 * vara fördelaktigt att använda
 * modulespecifika exceptions.
 * Det kan ge tydlighet och läsbarhet
 * vid felhanteringen.
 * 
 * Men glöm inte bort att det finns
 * ett gäng inbyggda exceptions, de
 * går också bra att använda.
 */
