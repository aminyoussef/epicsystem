
<?php
ob_start();
session_start([
'cookie_lifetime' => 86400
]);
$nomenu = '';
include 'init.php';
if(isset($_SESSION['formErrors'])){
    $_SESSION['formErrors'] = '';
}
ى
if(!isset($_SESSION['LoginToken']) OR !isset($_GET['id'])) {
    header('Location: index.php'); // Redirect To Dashboard Page
    exit();
}

if(!is_numeric($_GET['id'])){
    header('Location: index.php'); // Redirect To Dashboard Page
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' 
    && isset($_GET['id'])) {

        $stmt = $con->prepare("DELETE FROM tasks WHERE id = :zid");

        $stmt->bindParam(":zid", $_GET['id']);

        $stmt->execute();
			
    header('Location: ../page-home.php'); // Redirect To Dashboard Page
    exit();

}