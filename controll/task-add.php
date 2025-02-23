
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

if(!isset($_SESSION['LoginToken']) ) {
    header('Location: index.php'); // Redirect To Dashboard Page
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' 
    && isset($_POST['name']) 
    && isset($_POST['des']) 
    && isset($_POST['priority'])) {

			
    $formErrors = array();
    $namefile  = '';
    $name       = $_POST['name'];

    $des 	    = $_POST['des'];

    $priority 	= $_POST['priority'];

    if(isset( $_FILES['file']['name'])){
        if($_FILES['file']['name'] != '') {
                    
            $avatarName = $_FILES['file']['name'];
            $avatarSize = $_FILES['file']['size'];
            $avatarTmp	= $_FILES['file']['tmp_name'];
            $avatarType = $_FILES['file']['type'];
            // List Of Allowed File Typed To Upload
            $avatarAllowedExtension = array("jpeg", "jpg", "png", "gif","doc","docx",'pdf','xml','txt');

            // Get Avatar Extension
            $avatarexplad = explode('.', $avatarName);
            $avatarExtension = strtolower(end($avatarexplad));

            $formErrors = array();
            if (! empty($avatarName) && ! in_array($avatarExtension, $avatarAllowedExtension)) {
                $formErrors[] = 'This Extension Is Not <strong>Allowed</strong>';
            }

            if (empty($formErrors)) {

                $avatar = rand(0, 10000000000) . '_' . $avatarName;

                move_uploaded_file($avatarTmp, "../upload/" . $avatar);
                    
                $namefile = $avatar;
            }
                
        }
    }
    // Check If There's No Error Proceed The User Add

    if (empty($formErrors)) {

            // Insert Userinfo In Database

            $stmt = $con->prepare("INSERT INTO 
                                    tasks(user_id, title, description, priority, namefile, start_at_time, end_at_time)
                                VALUES(:zuserid, :zname, :zdescription, :zpriority,:znamefile, :zstart_at_time, :zend_at_time)");
            $stmt->execute(array(

                'zuserid'          => $_SESSION['userID'],
                'zname'             => $name,
                'zdescription'      => $des,
                'zpriority'         => $priority,
                'znamefile'         => $namefile,
                'zstart_at_time'    => $_POST['startTime'],
                'zend_at_time'    => $_POST['endTime']
            
            )); 
            $_SESSION['done'] ='';
            header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirect To Dashboard Page
            exit();


    }else {
        $_SESSION['formErrors'] = $formErrors;
        header('Location: ../add-task.php'); // Redirect To Dashboard Page
        exit();
    }


}