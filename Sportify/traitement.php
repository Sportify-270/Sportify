<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Carte de crédit</title>
<meta charset="utf-8">
</head>
<?php
// Set session variables (variables globales)
$_SESSION["client"] = "";
$_SESSION["statutPaiement"] = "void";
?>
<body>
<h2>Paiement par carte de crédit</h2>
<form action="traitementPaiement2.php" method="post">
<table border="1">
<tr>
<td>Nom de client:</td>
<td><input type="text" name="client"></td>
</tr>
<tr>
<td>Montant à payer:</td>
<td><input type="number" step="0.01" name="amount"></td>
</tr>
<tr>
<td>Payer par:</td>
<td>
<input type="radio" name="creditCard"
value="MasterCard">MasterCard<br>
<input type="radio" name="creditCard" value="Visa"
checked>Visa<br>
<input type="radio" name="creditCard" value="Amex">American
Express<br>
<input type="radio" name="creditCard" value="PayPal">PayPal<br>
</td>
</tr>
<tr>
<td>Numéro de carte de crédit:</td>
<td><input type="number" name="numero"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="button1" value="Soumettre">
</td>
</tr>
</table>
</form>
</body>
</html>