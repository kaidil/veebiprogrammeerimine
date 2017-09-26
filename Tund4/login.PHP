<?php

$signupFirstName = "";
	$signupFamilyName = "";
	$signupEmail = "";
	$gender = "";
	$signupBirthDay = null;
	$signupBirthMonth = null;
	$signupBirthYear = null;
	
	$loginEmail = "";
	
	//kas on kasutajanimi sisestatud
	if (isset ($_POST["loginEmail"])){
		if (empty ($_POST["loginEmail"])){
			//$loginEmailError ="NB! Ilma selleta ei saa sisse logida!";
		} else {
			$loginEmail = $_POST["loginEmail"];
		}
	}
	
	//kontrollime, kas kirjutati eesnimi
	if (isset ($_POST["signupFirstName"])){
		if (empty ($_POST["signupFirstName"])){
			//$signupFirstNameError ="NB! Väli on kohustuslik!";
		} else {
			$signupFirstName = $_POST["signupFirstName"];
		}
	}
	
	//kontrollime, kas kirjutati perekonnanimi
	if (isset ($_POST["signupFamilyName"])){
		if (empty ($_POST["signupFamilyName"])){
			//$signupFamilyNameError ="NB! Väli on kohustuslik!";
		} else {
			$signupFamilyName = $_POST["signupFamilyName"];
		}
	}
	$signupMonthSelectHTML = "";
	
	//kontrollime, kas kirjutati kasutajanimeks email
	if (isset ($_POST["signupEmail"])){
		if (empty ($_POST["signupEmail"])){
			//$signupEmailError ="NB! Väli on kohustuslik!";
		} else {
			$signupEmail = $_POST["signupEmail"];
		}
	}
	
	if (isset ($_POST["signupPassword"])){
		if (empty ($_POST["signupPassword"])){
			//$signupPasswordError = "NB! Väli on kohustuslik!";
		} else {
			//polnud tühi
			if (strlen($_POST["signupPassword"]) < 8){
				//$signupPasswordError = "NB! Liiga lühike salasõna, vaja vähemalt 8 tähemärki!";
			}
		}
	}
	
	if (isset($_POST["gender"]) && !empty($_POST["gender"])){ //kui on määratud ja pole tühi
			$gender = intval($_POST["gender"]);
		} else {
			//$signupGenderError = " (Palun vali sobiv!) Määramata!";
	}
	
//Tekitame sünnikuu valiku
$monthNameEt = ["jaanuar", "veebruar", "märts", "apill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
$signupMonthSelectHTML = "";
$signupMonthSelectHTML .= '<select  name = "signupBirthMonth">' ."\n";
$signupMonthSelectHTML .= '<option value = "" selected disabled>kuu</option>' ."\n";
foreach ($monthNameEt as $key =>$month){
	if ($key + 1 === $signupBirthMonth){
		$signupMonthSelectHTML .= '<option value = "' .($key + 1) .'" selected>' .$month ."</option> \n";
	} else {
		$signupMonthSelectHTML .= '<option value = "' .($key + 1) .'">' .$month ."</option> \n";
	}
}
$signupMonthSelectHTML .= "</select> \n";
?>



<!DOCTYPE html>


<html>

<head>
<h1 style="text-align:left;">Logi sisse</h1>
<form action="">
Nimi:<br>
<input name="loginEmail" type="email">
<br>
E-mail:<br>
<input name="loginPassword" type="password">
</form>

<input type = "submit" name = "submitAccount" value = "Kinnita">

<h1>Registreeri kasutaja</h1>
<form action="">
Nimi:<br>
<input name="signupFirstName" type="text">
<br>
Perekonnanimi:<br>
<input name="signupFamilyName" type="text">
<br>


<label> Palun määra oma sünnikuupäev: </label>
<?php
	echo $signupMonthSelectHTML;
?>

M või N:<br>
<input type="radio" name="gender" value="1">
<input type="radio" name="gender" value="2">
</form>
<input type = "submit" name = "submitAccount" value = "Kinnita">

</head>
<body></body>




</html>