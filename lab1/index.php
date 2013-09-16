<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>Webbutveckling med PHP, Laboration 1</title>
</head>
 <body>
	<div id="container">
        <header>Laborationskod yr222ag</header>

<?php

$message = "";
$user = "";

// Loggar vi in?
if ($_POST && $_SERVER["QUERY_STRING"] == "login")
{
	// Hämta postade värden
	$user = $_REQUEST["user"];
	$pass = $_REQUEST["pass"];

    // Ej inloggad
    $_SESSION["loggedIn"] = "false";

	// Validera användare
	if ($user == "")
	{
		$message = "Användarnamn saknas";
	}
    // Validera lösenord
    elseif ($pass == "") {
        $message = "Lösenordet saknas";
    }
    // Rätt användare + lösen?
    elseif (strtolower($user) == "admin" && $pass == "Password")
    {
        // Inloggade!
        $_SESSION["loggedIn"] = "true";
        $message = "Inloggning lyckades";
    } else {
        // Fel användare/lösen
        $message = "Felaktigt användarnamn och/eller lösenord";
	}
}

// Loggar vi ut?
if ($_POST && $_SERVER["QUERY_STRING"] == "logout") {
	$_SESSION["loggedIn"] = "false";
	$message = "Du har nu loggat ut";
}

// Välj formulär att visa
if ($_SESSION["loggedIn"] == "true") {
	// Inloggad, visa logut-knapp
    echo "<h2>Admin är inloggad</h2><br/>";
	echo $message;
    echo '<form action="index.php?logout" method="post" enctype="multipart/form-data">
	<input type="submit" name="submit" value="Logga ut" />
	</form>';
} else {
	// Inte inloggad, visa login-formulär
    echo "<h2>Ej inloggad</h2><br />";
	echo '<form action="index.php?login" method="post" enctype="multipart/form-data">';
	echo '<fieldset>';
	echo '<legend>Login - Skriv in användarnamn och lösenord</legend>';
	echo $message . "<br/>";
    echo '<label for="UserNameID">Användarnamn :</label>';
	echo '<input type="text" size="20" name="user" id="UserNameID" value="' . $user . '" /><br />';
	echo '<label for="PasswordID">Lösenord  :</label>';
	echo '<input type="password" size="20" name="pass" id="PasswordID"><br/>';
	echo '<input type="submit" name="submit" value="Logga in" />';
	echo '</fieldset>';
	echo '</form>';
}

/* Show Date & Time */
/* strftime(): formats date & time based on locale */

/* Switch sats för veckodagar (%w: 0:Söndag - 6:Lördag) */
$weekdayID = strftime("%w");
$weekday = "";

switch ($weekdayID) {
    case 0:
        $weekday = "Söndag";
        break;
    case 1:
        $weekday = "Måndag";
        break;
    case 2:
        $weekday = "Tisdag";
        break;
    case 3:
        $weekday = "Onsdag";
        break;
    case 4:
        $weekday = "Torsdag";
        break;
    case 5:
        $weekday = "Fredag";
        break;
    case 6:
        $weekday = "Söndag";
        break;
}


/* Switch sats för månader (%m: 01: januari - 12: december) */
$monthID = strftime("%m");
$month = "";

switch ($monthID) {
    case '01':
        $month = "Januari";
        break;
    case '02':
        $month = "Februari";
        break;
    case '03':
        $month = "Mars";
        break;
    case '04':
        $month = "April";
        break;
    case '05':
        $month = "Maj";
        break;
    case '06':
        $month = "Juni";
        break;
    case '07':
        $month = "Juli";
        break;
    case '08':
        $month = "August";
        break;
    case '09':
        $month = "September";
        break;
    case '10':
        $month = "Oktober";
        break;
    case '11':
        $month = "November";
        break;
    case '12':
        $month = "December";
        break;
}

/* Klockan UTC + 2 timmar */
/* Format <<Fredag, den 13 September år 2013. Klockan är [09:59:42].>> */
/* ucfirst(): makes first letter capital (for weekdays & month). */
/* gmstrftime(): formats date & time based on locale settings */
echo ucfirst(gmstrftime("$weekday, den %#d $month år %Y. Klockan är [%H:%M:%S].", time() + 7200));

?>
        </div>
    </body>
 </html>
