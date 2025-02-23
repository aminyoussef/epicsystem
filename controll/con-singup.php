
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_POST['name']) 
    && isset($_POST['password']) 
    && isset($_POST['username'])) {

			
    $formErrors = array();

    $name       = $_POST['name'];

    $password 	= sha1($_POST['password']);

    $email 		= $_POST['username'];

    
    $usernameCheck = checkItem("email", "users", $email);
    
    if($usernameCheck != 0){
        $formErrors[] = 'this Email is set';
    }

    // Check If There's No Error Proceed The User Add

    if (empty($formErrors)) {

            // Insert Userinfo In Database

            $stmt = $con->prepare("INSERT INTO 
                                    users(name, email, password, created_at)
                                VALUES(:zname, :zemail, :zpass, now())");
            $stmt->execute(array(

                'zname'         => $name,
                'zemail'        => $email,
                'zpass'         => $password
            
            )); 
            $_SESSION['done'] ='';
            header('Location: ../index.php'); // Redirect To Dashboard Page
            exit();

        

    }else {
        $_SESSION['formErrors'] = $formErrors;
        $_SESSION['data']   = array($name,$email);
        header('Location: ../singup.php'); // Redirect To Dashboard Page
        exit();
    }


}