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
class Person2
{
    /**
     * @var string $name    The name of the person.
     * @var integer $age    The age of the person.
     */
    private $name;
    private $age;

    /**
     * Print out details on the person.
     * 
     * @return string with details on person.
     */
    public function details() {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }

    /**
     * Lägger till metoden setAge() där
     * användaren kan sätta åldern på
     * personen.
     */

    /**
    * Set the age of the person.
    *
    * @param int $age The age of the person.
    *
    * @return void
    */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    /**
     * Set the name of the person.
     * 
     * @param string $name The name of the person.
     * 
     * @return void
     */
    public function setName(str $name)
    {
        $this->name = $name;
    }

    /**
     * Vi kan sätta värdet på age och
     * name men vi kan inte läsa det,
     * förutom via metoden details().
     * Låt oss därför skapa getter-
     * metoder som returnerar värdet
     * på medlemsvariablerna.
     */

    /**
     * Get the age of the person.
     *
     * @return int as the age of the person.
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the name of the person.
     * 
     * @return string as the name of the person.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Constructor to create a Person.
     *
     * @param string $name The name of the person.
     * @param int    $age  The age of the person.
     *
     * public function __construct(string $name, int $age)
     * {
     *    $this->name = $name;
     *    $this->age = $age;
     * }
     */

    /**
     * Här är en konstruktor som kan
     * hantera alla fallen av
     * initiering av objektet.
     */
    /**
     * Constructor to create a Person.
     *
     * @param null|string $name The name of the person.
     * @param null|int    $age  The age of the person.
     */
    public function __construct(string $name = null, int $age = null)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * Destroy a Person.
     */
    public function __destruct()
    {
        echo __METHOD__;
    }
}

/**
 * Nu är klassens medlemsvariabler privata
 * istället för publika. Men metoden är
 * fortfarande publik.
 * 
 * Eftersom medlemsvariablerna nu är
 * privata så kan de inte nås från
 * main-programmet utifrån klassen.
 * 
 * Man kan ha både medlemsvariabler och
 * metoder som är privata. Allt som man
 * inte vill att en utomstående ska pilla
 * i kan man deklarera som private.
 */
