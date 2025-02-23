
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


if(!isset($_SESSION['LoginToken']) OR !isset($_GET['id'])) {
    header('Location: index.php'); // Redirect To Dashboard Page
    exit();
}

if(!is_numeric($_GET['id'])){
    header('Location: index.php'); // Redirect To Dashboard Page
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' 
    && isset($_GET['id'])
    && isset($_GET['status'])) {
        
        if($_GET['status'] == 0){
            $status = 1;
        }else{
            $status = 0;
        }
        $stmt = $con->prepare("UPDATE 
												tasks 
											SET 
												is_completed = ?
											WHERE 
												id = ?
                                            AND
                                            user_id = ?
                                            ");

					$stmt->execute(array($status,$_GET['id'], $_SESSION['userID']));
			
        header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirect To Dashboard Page
        exit();

}