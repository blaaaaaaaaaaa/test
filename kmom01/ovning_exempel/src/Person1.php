<?php
/**
 * EN EGEN KLASS
 * 
 * Man använder stora bokstäver på filer
 * som innehåller klasser, det är ett val för
 * att göra det tydligare och en kodstandard
 * som man i den här kursen har valt att följa.
 */

/**
 * DocBlock KOMMENTARER
 * 
 * När man skriver kod brukar man
 * använda kommentarsblock för att
 * dokumentera koden.
 * 
 * Se exempel nedan på hur många
 * DocBlocks som bör användas.
 * 
 * Koden och dess kommentarer kan sedan
 * parsas av verktyg för att generera
 * dokumentation av koden.
 * (phpDocumentor)
 */

/**
 * Showing off a standard class with
 * methods and properties.
 */
class Person1
{
    /**
     * @var string $name    The name of the person.
     * @var integer $age    The age of the person.
     */
    public $name;
    public $age;

    /**
     * Print out details on the person.
     * 
     * @return string with details on person.
     */
    public function details() {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }
}
