
<?php
ob_start();
session_start([
'cookie_lifetime' => 86400
]);
$nomenu = '';
include 'init.php';


if(!isset($_SESSION['LoginToken']) OR !isset($_POST['id'])) {
    header('Location: index.php'); // Redirect To Dashboard Page
    exit();
}

if(!is_numeric($_POST['id'])){
    header('Location: index.php'); // Redirect To Dashboard Page
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_POST['id'])) {

        $stmt = $con->prepare("UPDATE 
												tasks 
											SET 
												title = ?,
                                                description = ?,
                                                priority = ?,
                                                start_at_time = ?,
                                                end_at_time = ?
											WHERE 
												id = ?
                                            ");

					$stmt->execute(array($_POST['name'], $_POST['des'],$_POST['priority'],$_POST['startTime'],$_POST['endTime'],$_POST['id']));
			
        header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirect To Dashboard Page
        exit();

}