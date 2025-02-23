

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {

            
$user = $_POST['username'];
$pass = $_POST['password'];

$hashedPass = sha1($pass);
// Check If The User Exist In Database

$stmt = $con->prepare("SELECT 
                            *
                        FROM 
                            users
                        WHERE 
                            email = ? 
                        AND 
                            password = ?
                        ");

$stmt->execute(array($user, $hashedPass));

$get = $stmt->fetch();

$count = $stmt->rowCount();


if ($count > 0) {
    

            
    $_SESSION['userID'] = $get['id']; // Register User ID in Session
        
    $_SESSION['name']   = $get['name'];
            
    $_SESSION['email']  = $get['email'];
                
    $_SESSION['LoginToken']   = generateRandomString();

    $stmt = $con->prepare("UPDATE 
                                users
                            SET 
                                LoginToken = ?
                            WHERE 
                                id = ?");

                            $stmt->execute(array($_SESSION['LoginToken'], $_SESSION['userID']));

                
    header('Location: ../page-home.php'); // Redirect To Dashboard Page
                
    exit();
        

    
}else{
    $_SESSION['formErrors'] = 'اسم المسخدم او كلمه المرور غير صحيحه';
    header('Location: ../index.php'); // Redirect To Dashboard Page
    exit();
}


}