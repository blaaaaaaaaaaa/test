<?php
/**
 * OBJEKT I SESSION
 * 
 * Hur man lagrar ett objekt i session.
 */

/**
 * STARTA EN NAMNGIVEN SESSION
 */
session_name("isas21");
session_start();

/**
 * OM SESSIONER
 * 
 * Sessioner ger webbplatsen ett minne,
 * de gör det möjligt att komma ihåg
 * information mellan sidladdningar.
 * 
 * Man kan till exempel låta en
 * användare logga in och sedan minnas
 * vilken användare man visar en sida
 * för och göra den mer personlig.
 * 
 * HTTP PROTOKOLLET STATELESS
 * 
 * Protokollet för http-trafik, det som
 * gör att webbläsaren kan kommunicera
 * med webbservern, är stateless.
 * Det innebär att varje request
 * är helt skild från en annan och varje
 * request måste vara en komplett request
 * och ett komplett response.
 * Webbservern kan via protokollet inte
 * koppla en händelse till en annan,
 * de är isolerade från varandra.
 * 
 * Det finns alltså på protokollnivå
 * inget inbyggt minne som låter
 * webbplatsen komma ihåg att vi varit
 * där och att vi loggat in.
 * 
 * COOKIES GER MINNE
 * 
 * För att ge möjligheten att minnas
 * varje sidanrop så används något
 * som kallas cookies. Det är små
 * värden, kopplade till en nyckel, som
 * skickas med http requesten från
 * webbservern (om de är definierade),
 * och sedan från webbläsaren tillbaka
 * till webbservern i nästa response.
 * 
 * Via dessa cookies, som skickas fram
 * och tillbaka, kan alltså skapas ett
 * minne i webbplatsen. Vi säger att
 * protokollet är stateless men på
 * applikationsnivå, när vi använder
 * protokollet, så har vi skapat en
 * möjlighet till minne, via cookies.
 * 
 * SESSIONER I PHP
 * 
 * I php finns en hantering av sessioner
 * inbyggt. Man namnger, starta och
 * kan förstöra en session och dess
 * sessionscookie.
 * 
 * Alla värden som lagras i den
 * inbyggda och globala arrayen
 * $_SESSION kan minnas mellan sidanrop.
 */

/**
 * STARTA SESSIONEN
 * 
 * En session i php behöver startas
 * innan den kan användas. För att
 * göra det enkelt för oss så startar
 * vi den alltid i en konfigurationsfil
 * config.php som inkluderas i alla
 * sidkontroller.
 * Då vet vi att sessionen alltid är
 * startad och att den är startad på
 * exakt samma sätt med samma namn.
 * 
 * En session kan namnges, det ger
 * möjligheten att jobba mot flera
 * namngivna sessioner samtidigt och
 * det ger möjligheten att en
 * webbplats kan vara säker på att
 * ens session inte krockar med andra
 * sessioner som körs på samma
 * webbplats.
 * 
 * Så, en namngiven session och vi
 * startar den i config.php.
 * 
 * // Start the named session,
 * // the name is based on the path to this file.
 * $name = preg_replace("/[^a-z\d]/i", "", __DIR__);
 * session_name($name);
 * session_start();
 * 
 * Vår taktik på att namnge sessionen
 * är att använda sökvägen till
 * katalogen där config.php ligger.
 * Då får alla våra exempelprogram
 * (som sparas i en viss katalog)
 * egna sessioner och vi undviker
 * att olika exempelprogram krockar
 * med varandras sessioner.
 */

/**
 * FÖRSTÖR EN SESSION
 * 
 * När man jobbar med sessioner så
 * vill man kunna förstöra en session
 * och starta om. Det kan vara ett
 * viktigt utvecklingsverktyg och
 * underlätta felsökningen om man har
 * möjligheten att verkligen förstöra
 * en session och börja om från början.
 * 
 * I manualen för session_destroy()
 * finns exempelkod för hur man skall
 * förstöra sessionen.
 * Den ser ut så här.
 * 
 * // Initialize the session.
 * // If you are using session_name("something"), don't forget it now!
 * session_start();
 * 
 * // Unset all of the session variables.
 * $_SESSION = array();
 * 
 * // If it's desired to kill the session, also delete the session cookie.
 * // Note: This will destroy the session, and not just the session data!
 * if (ini_get("session.use_cookies")) {
 *  $params = session_get_cookie_params();
 *  setcookie(session_name(), '', time() - 42000,
 *      $params["path"], $params["domain"],
 *      $params["secure"], $params["httponly"]
 *  );
 * }
 * 
 * // Finally, destroy the session.
 * session_destroy();
 * 
 * Jag väljer att göra en egen
 * funktion som förstör en session.
 * Min funktion får förutsätta att
 * sessionen redan är startad.
 * Jag har ju mina namngivna
 * sessioner som startas i filen
 * config.php.
 * Funktionen ser då ut så här.
 * 
 * /**
 * * Destroy a session, the session must be started.
 * *
 * * @return void
 * *
 * function sessionDestroy()
 * {
 * // Unset all of the session variables.
 * $_SESSION = [];
 * 
 * // If it's desired to kill the session, also delete the session cookie.
 * // Note: This will destroy the session, and not just the session data!
 * if (ini_get("session.use_cookies")) {
 *      $params = session_get_cookie_params();
 *      setcookie(
 *          session_name(),
 *          '',
 *          time() - 42000,
 *          $params["path"],
 *          $params["domain"],
 *          $params["secure"],
 *          $params["httponly"]
 *      );
 * }
 * 
 * // Finally, destroy the session.
 * session_destroy();
 */

/**
 * INITIERA, LÄSA OCH SKRIVA
 * 
 * När sessionen är startad så kan vi använda den inbyggda globala arrayen $_SESSION för att skriva och läsa värden som sparas i sessionen.
 * 
 * Låt oss se ett mindre exempel med
 * en sida som minns ett tal och varje
 * gång vi laddar om sidan så ökar
 * talet med 1.
 * 
 * Det första vi behöver göra är att
 * initiera värdet i sessionen.
 * Den allra första gången som
 * användaren kommer till sidan så
 * finns inget värde i sessionen och
 * vi behöver initiera den till att
 * börja på 0.
 * 
 * Som nyckel i sessionen (arrayen)
 * väljer vi number.
 * 
 * // Read the value from the session, if it does not exist set
 * // it to 0.
 * if (!isset($_SESSION["number"])) {
 *    $_SESSION["number"] = 0;
 * }
 * 
 * Nu kan vi vara säkra på att
 * innehållet för nyckeln number i
 * sessionen alltid har ett värde.
 * 
 * Nu kan vi öka värdet, som på
 * vilken variabel som helst.
 * 
 * $_SESSION["number"] += 1;
 * 
 * Man hade också kunnat plocka ut
 * värdet från sessionen och sparat i
 * en variabel.
 * Om man sedan uppdaterar värdet så
 * behöver man dock spara tillbaka
 * värdet i sessionen igen.
 * 
 * Här är en variant på hur man
 * initierar sessionen, läser av
 * värdet och ökar med 1.
 * Här används en variabel som
 * mellanlagring.
 * 
 * // Get value from session or use 0 as default
 * $number = $_SESSION["number"] ?? 0;
 * 
 * // Increment the variable
 * $number++;
 * 
 * // Write the value to the session to remember it
 * $_SESSION["number"] = $number;
 * 
 * Detta är principen för hur du
 * initierar, läser och skriver
 * värden i sessionen.
 */

/**
 * LOGGA IN OCH LOGGA UT
 * 
 * Många webbplatser innehåller
 * inslaget där användaren kan logga
 * in på webbplatsen för att få
 * personlig information,
 * presentation och en möjlighet att
 * lägga till och redigera information
 * på webbplatsen.
 * 
 * För att lösa inloggning behövs ett
 * formulär där användare matar in
 * sin inloggning, det behövs en
 * processingsida som kontrollerar om
 * användaren har skrivit rätt
 * lösenord och jämföra
 * användarnamnet och lösenordet mot
 * sin “databas” över användare.
 * 
 * Om vi hoppar över hur man gör med
 * formuläret och lösenordet så
 * handlar det sedan om att lägga
 * till information i sessionen om
 * vem som är inloggad.
 * 
 * Så här.
 * 
 * $_SESSION["acronym"] = "mos";
 * 
 * Nu kan man kontrollera om en
 * användare är inloggad.
 * 
 * $isAuthenticated = $_SESSION["acronym"] ?? null;
 * 
 * if ($isAuthenticated) {
 *  echo "The user is logged in as user {$_SESSION["acronym"]}.";
 * } else {
 *  echo "The user is not logged in.";
 * }
 * 
 * När användaren loggar ut så kan
 * man nollställa akronymen.
 * 
 * $_SESSION["acronym"] = null;
 * 
 */

/*
 * STYLEVÄLJARE
 * 
 * En styleväljare handlar om att
 * användaren kan välja en specifik
 * stylesheet för sin egen del.
 * Valet syns bara för den inloggade
 * användaren.
 * 
 * Grundtanken är att man gör ett
 * formulär och visar de olika
 * alternativen för användaren som
 * sedan väljer ett av valen och
 * sedan aktiveras den stylesheeten
 * som en personlig style för
 * användaren.
 * 
 * Om vi hoppar över delen med
 * formuläret så handlar det om att
 * spara information om den valda
 * stylesheeten i sessionen.
 * 
 * $_SESSION["style"] = "dark";
 * 
 * Här behöver vi vara försiktiga att
 * inte mappa direkt mot en verklig
 * fil på disk. Det riskerar att
 * öppna säkerhetsrisker
 * (remote file inclusion) då
 * användaren kan modifiera
 * informationen som skickas i ett
 * formulär.
 * 
 * Men om vi använder ett id mot en
 * vald style så kan vi använda en
 * array för att mappa id mot den
 * verkliga stylesheetfilen.
 * Detta är samma teknik vi använder
 * i multisidan för att
 * mappa ?page=index mot en verklig
 * fil session/index.php.
 * 
 * $styles = [
 *  "default" => "css/stylesheet.css",
 *  "dark" => "css/dark.css",
 *  "colorful" => "css/colorful.css",
 * ];
 * 
 * När denna informationen finns så
 * kan man slutligen välja att skriva
 * ut den valda stylesheeten i sin
 * view/header.php inom
 * elementet <head>.
 * 
 * Det kan se ut så här.
 * 
 * Först i view/header.php.
 * 
 * <!doctype html>
 * <html lang="en">
 * <head>
 *  <meta charset="utf-8">
 *  <title><?= $title ?></title>
 *  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
 *  <?php include __DIR__ . "/stylechooser.php"; ?>
 * </head>
 * <body>
 * 
 * Här väljer jag att lägga all koden
 * för stylechoosern i en egen vy
 * view/stylechooser.php.
 * 
 * /**
 * * Generate a stylesheet <link based on the content of the session,
 * * to implement a stylechooser.
 * * <link rel="stylesheet" type="text/css" href="css/style.css">
 * *
 * // Get the style from session, or set a default style
 * $style = $_SESSION["style"] ?? null;
 * 
 * $styles = [
 *  "default" => "css/stylesheet.css",
 *  "dark" => "css/dark.css",
 *  "colorful" => "css/colorful.css",
 * ];
 * 
 * // Map the style towards the available styles, and use a default style
 * $stylesheet = $styles[$style] ?? $styles["default"];
 * 
 * ?><link rel="stylesheet" type="text/css" href="<?= $stylesheet ?>">
 */

/**
 * FLASHMINNE
 * 
 * Ett flashminne, i sammanhanget php
 * och webbsidor, kan vara möjligheten
 * att skicka ett meddelanden mellan
 * två sidoanrop. Ta ett exempel där
 * du precis valt en stylesheet,
 * eller loggat in, och formuläret
 * skickar dig till en processingsida
 * som verkställer ändringen och
 * sedan skickar dig vidare till en
 * resultatsida för att presentera
 * svaret.
 * 
 * I processingsidan vet du om det
 * gick bra eller ej och du vill
 * skicka med ett svar, någon form av
 * feedback “Tack för din ändring av
 * stylesheeten” eller “Du är nu
 * inloggad”.
 * 
 * Sådan information kan man skicka
 * via sessionen och i resultatsidan
 * läser man av meddelandet,
 * skriver ut det och sedan
 * nollställer man värdet i sessionen.
 * Vi kan kalla det ett “read once
 * flash message”.
 * 
 * Säg att processingsidan innehåller
 * följande del som sätter meddelandet
 * som skall visas.
 * 
 * $_SESSION["flashmessage"] = "Du är nu inloggad.";
 * 
 * I resultatsidan kan då följande vy
 * view/flashmessage.php inkluderas i
 * sidans header och alltid visa
 * meddelandet, förutsatt att det har
 * ett värde.
 * 
 * Först inkluderar vi vyn i
 * view/header.php.
 * 
 * <!doctype html>
 * <html lang="en">
 * <head>
 *  <meta charset="utf-8">
 *  <title><?= $title ?></title>
 *  <link rel="stylesheet" type="text/css" href="css/style.css">
 * </head>
 * <body>
 * 
 * <?php include __DIR__ . "/flashmessage.php"; ?>
 * 
 * Sedan skriver vi koden i
 * view/flashmessage.php.
 * 
 * /**
 * * Generate a flashmessage on one page load , based on information in the
 * * session, then remove the information from the session.
 * *
 * $message = $_SESSION["flashmessage"] ?? null;
 * 
 * // Clear the message, it should only be used once
 * $_SESSION["flashmessage"] = null;
 * 
 * // Return if no message
 * if (!$message) {
 *  return;
 * }
 * 
 * ?><div class="flashmessage">
 *  <p><?= $message ?></p>
 * </div>
 */

/**
 * SKAPA OCH PLACERA OBJEKT I
 * SESSIONEN
 * 
 * Nu vill jag placera en person i
 * sessionen, förutsatt att det inte
 * redan finns en person lagrad där.
 * Sedan vill jag räkna upp personens
 * ålder varje gång sidan laddas.
 */

if (!isset($_SESSION["person"])) {
    $_SESSION["person"] = new Person5("MegaMic", 42);
}

$person = $_SESSION["person"];
$age = $person->getAge();
$person->setAge($age + 1);
echo $person->details();

/**
 * Vid varje ny sidladdning så blir
 * personen ett år äldre. Hela objektet
 * lagras i sessionen.
 */

/**
 * FÖRSTÖR SESSIONEN
 * 
 * Som vanligt när man jobbar med
 * sessionen så vill man ha möjligheten
 * att förstöra den och starta om med
 * en ny fräsch session.
 * 
 * För detta syfte skapar vi
 * index_session_destroy.php.
 */

/**
 * BRA ATT VETA
 * 
 * När objektet lagras i sessionen så
 * görs serialize() på objektet.
 * När nästa sidomladdning kommer och
 * objektet hämtas från sessionens
 * lagringsplats, så sker en
 * unserialize() på objektet.
 * 
 * En förutsättning för att
 * unserialize() skall fungera är att
 * objektets klassbeskrivning finns
 * tillgänglig. Nu använder vi
 * autoloadern som sköter om det så
 * det bör fungera per automatik för
 * oss. Men det betyder att
 * autoloadern måste vara inkluderad,
 * innan sessionen startas.
 * 
 * Annars får man ett felmeddelande
 * som kan se ut så här.
 * 
 * Fatal error: main(): The script
 * tried to execute a method or
 * access a property of an incomplete
 * object. Please ensure that the
 * class definition "Person5" of the
 * object you are trying to operate
 * on was loaded before unserialize()
 * gets called or provide an
 * autoloader to load the class
 * definition in
 * /home/dbwebb/oophp-guide/index_session_failure.php
 * on line 17
 * 
 * Ett vanligt fel när man missat att
 * inkludera klassfilen eller
 * autoloadern, innan sessionen startas.
 * 
 * Vid sådana fel så dubbelkollar du om
 * klassfilen, eller autoloadern,
 * verkligen är inkluderad, innan du
 * startar sessionen.
 */
