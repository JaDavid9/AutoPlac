<?php

$servername = "localhost";
$username = "root";
$password = "david12345";
$dbname = "autoplac";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Konekcija neuspesna: " . $e->getMessage();
}

$nazivVozila = $_POST['nazivVozila'];
$marka = $_POST['marka'];
$opisVozila = $_POST['opisVozila'];
$cena = $_POST['cena'];
$gorivo = $_POST['gorivo'];
$godiste = $_POST['godiste'];
$sedista = $_POST['sedista'];
$vimage1 = $_POST['vimage1'];
$vimage2 = $_POST['vimage2'];
$vimage3 = $_POST['vimage3'];
$vimage4 = $_POST['vimage4'];
$vimage5 = $_POST['vimage5'];
$klima = $_POST['klima'];
$cdPlayer = $_POST['cdPlayer'];
$koznaSedista = $_POST['koznaSedista'];
$daljinskoZakljucavanje = $_POST['daljinskoZakljucavanje'];
$servoVolan = $_POST['servoVolan'];
$airbag = $_POST['airbag'];
$senzori = $_POST['senzori'];

$stmt = $conn->prepare("INSERT INTO automobili (NazivVozila, Marka, OpisVozila, Cena, Gorivo, Godiste, Sedista, Vimage1, Vimage2, Vimage3, Vimage4, Vimage5, Klima, CDPlayer, KoznaSedista, DaljinskoZakljucavanje, ServoVolan, Airbag, Senzori) VALUES (:nazivVozila, :marka, :opisVozila, :cena, :gorivo, :godiste, :sedista, :vimage1, :vimage2, :vimage3, :vimage4, :vimage5, :klima, :cdPlayer, :koznaSedista, :daljinskoZakljucavanje, :servoVolan, :airbag, :senzori)");

$stmt->bindParam(':nazivVozila', $nazivVozila);
$stmt->bindParam(':marka', $marka);
$stmt->bindParam(':opisVozila', $opisVozila);
$stmt->bindParam(':cena', $cena);
$stmt->bindParam(':gorivo', $gorivo);
$stmt->bindParam(':godiste', $godiste);
$stmt->bindParam(':sedista', $sedista);
$stmt->bindParam(':vimage1', $vimage1);
$stmt->bindParam(':vimage2', $vimage2);
$stmt->bindParam(':vimage3', $vimage3);
$stmt->bindParam(':vimage4', $vimage4);
$stmt->bindParam(':vimage5', $vimage5);
$stmt->bindParam(':klima', $klima);
$stmt->bindParam(':cdPlayer', $cdPlayer);
$stmt->bindParam(':koznaSedista', $koznaSedista);
$stmt->bindParam(':daljinskoZakljucavanje', $daljinskoZakljucavanje);
$stmt->bindParam(':servoVolan', $servoVolan);
$stmt->bindParam(':airbag', $airbag);
$stmt->bindParam(':senzori', $senzori);

$stmt->execute();

header("Location: index.php");
exit; 
echo "Oglas je uspesno postavljen";

$conn = null;
?>
