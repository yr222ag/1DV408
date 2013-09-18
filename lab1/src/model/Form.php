<?php

namespace model;

class Form {

	private $message = "";
	private $user ="";
	private $pass ="";

	public function getForm() {

		// Loggar vi in?
		if ($_POST && $_SERVER["QUERY_STRING"] == "login")
		{
			// Hämta postade värden
			$this->user = $_REQUEST["user"];
			$this->pass = $_REQUEST["pass"];

		    // Ej inloggad
		    $_SESSION["loggedIn"] = "false";

			// Validera användare
			if ($this->user == "")
			{
				$this->message = "Användarnamn saknas";
			}
		    // Validera lösenord
		    elseif ($this->pass == "") {
		        $this->message = "Lösenordet saknas";
		    }
		    // Rätt användare + lösen?
		    elseif (strtolower($this->user) == "admin" && $this->pass == "Password")
		    {
		        // Inloggade!
		        $_SESSION["loggedIn"] = "true";
		        $this->message = "Inloggning lyckades";
		    } else {
		        // Fel användare/lösen
		        $this->message = "Felaktigt användarnamn och/eller lösenord";
			}
		}

		// Loggar vi ut?
		if ($_POST && $_SERVER["QUERY_STRING"] == "logout") {
			$_SESSION["loggedIn"] = "false";
			$this->message = "Du har nu loggat ut";
		}

		
		if ($_SESSION["loggedIn"] == "true") {

			// Inloggad, visa logut-knapp
			    return '
			    <h2>Admin är inloggad</h2><br/>
				' . $this->message . '
			    <form action="index.php?logout" method="post" enctype="multipart/form-data">
					<input type="submit" name="submit" value="Logga ut" />
				</form>';
				} else {

			// Inte inloggad, visa login-formulär
			    return '
			    <h2>Ej inloggad</h2><br />
				<form action="index.php?login" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Login - Skriv in användarnamn och lösenord</legend>
							' . $this->message . '<br/>
			    		<label for="UserName">Användarnamn :</label>
			    			<input type="text" size="20" name="user" id="UserName" value="' . $this->user . '"/><br />
						<label for="Password">Lösenord  :</label>
							<input type="password" size="20" name="pass" id="Password"><br/>
							<input type="submit" name="submit" value="Logga in" />
					</fieldset>
				</form>';
		}	
	}
}