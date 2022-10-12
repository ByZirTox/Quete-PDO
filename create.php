<?php
require 'connect.php';
$pdo = new PDO(DSN, USER, PASS);

$query = 'SELECT * FROM friend';
$statement = $pdo->query($query); 
$students = $statement->fetchAll();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (empty($_POST["fname"])) {
    $errors[] = "Le prenom ne respect pas le format";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["lname"])) {
    $errors[] = "Le nom ne respect pas le format";
  } else {
    $name = test_input($_POST["name"]);
  }

if(empty($errors)){
$query = "INSERT INTO friend (firstname, lastname) VALUES (:fname, :lname)";
$statement = $pdo->prepare($query);
$statement->bindValue(':fname', $_POST['fname'], \PDO::PARAM_STR);
$statement->bindValue(':lname', $_POST['lname'], \PDO::PARAM_STR);
$statement->execute();

}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="" method="POST">
<label for="fname">Prenom</label>
<input type="text" name="fname" id="fname" required>
<label for="lname">Nom de famille</label>
<input type="text" name="lname" id="lname" required>
<button>Envoyer</button>


</form>

<?php
$statement = $pdo->query("SELECT * FROM friend");
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($friends as $friend) : ?>
     <?= $friend['firstname']; ?>
     <?= $friend['lastname']; ?>
    <?php endforeach ?>


</body>
</html>