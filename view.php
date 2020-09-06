<?php
session_start();
require_once "pdo.php";
if ( ! isset($_SESSION['name']) ) 
{
  die('Not logged in');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Neha Chahar's library management system</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Available Books :</h1>
<ul>
<?php
$stmt = $pdo->query("SELECT name, author, status FROM books");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ( $rows as $row ) 
{ if( $row['status'] == 1)
  { echo("<li>");
    echo("  ");
    echo(htmlentities($row['name']));
    echo(" / ");
    echo($row['author']);
    echo("</li>");
    echo("\n");
  }
}
?>
<p>
<a href="home.php">Home</a> 
</p>
</ul>
</div>
</body>
</html>
