<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php
$database = "projet2021";
$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle, $database);
$client = isset($_POST["client"])? $_POST["client"]: "";
//montant à payer
$montant = isset($_POST["amount"])? $_POST["amount"]: "";
if (empty($montant)) {
$montant = 0.0;
}
//si une carte est selectionnée
$card = isset($_POST["creditCard"])? $_POST["creditCard"] : "";
$numero = isset($_POST["numero"])? $_POST["numero"] : "";
$_SESSION["client"] = $client;
//si le bouton est cliqué
if (isset($_POST["button1"])) {
//traitement
if ($db_found) {
$sql = "SELECT * from utilisateur WHERE Nom LIKE '$client' AND
CarteCredit LIKE '$card' AND '$numero'";
$result = mysqli_query($db_handle, $sql);
while ($data = mysqli_fetch_assoc($result)){
echo "ID: " . $data['ID'] . '<br>';
echo "Nom: " . $data['Nom'] . '<br>';
echo "Carte de crédit: " . $data['CarteCredit'] . '<br>';
echo "Numéro de carte: " . $data['NumeroCarte'] . '<br>';
echo "Solde: " . $data['Solde'] . '<br><br>';
$solde = $data['Solde'];
if ($solde >= $montant) {
$_SESSION["statutPaiement"] = "Paiement accepté";
} else {
$_SESSION["statutPaiement"] = "Paiement refusé";
}
}
// Echo session (global) variables
echo "<br>Notre client: " . $_SESSION["client"];
echo "<br>Status de son paiement: " . $_SESSION["statutPaiement"];
} else {
echo "<br>Database not found.";
}
}
//fermer la connexion
mysqli_close($db_handle);
?>
</body>
</html>
