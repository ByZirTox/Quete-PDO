<?php require 'connect.php'; 
$pdo = new PDO(DSN, USER, PASS);

$statement = $pdo->query("SELECT * FROM friend");
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
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


   <?php foreach($friends as $friend) : ?>
     <?= $friend['firstname']; ?>
    <?php endforeach ?>

</body>

</html>