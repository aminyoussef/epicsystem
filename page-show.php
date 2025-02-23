
<?php
	ob_start();
	session_start([
    'cookie_lifetime' => 86400
    ]);
    $nomenu = '';
	include 'system/init.php';


    if(!isset($_SESSION['LoginToken']) OR !isset($_GET['id'])) {
        header('Location: index.php'); // Redirect To Dashboard Page
        exit();
    }

    if(!is_numeric($_GET['id'])){
        header('Location: index.php'); // Redirect To Dashboard Page
        exit();
    }
    

?>
<style>
    
input {
  outline: none;
}

ul {
  list-style: none;
  padding: 0;
}

.app-container {
  border-radius: 8px;
  width: 100%;
  max-width: 480px;
  max-height: 100%;
  background-color: #10101d;
  padding: 24px;
  overflow: auto;
}

.app-header {
  font-size: 20px;
  line-height: 32px;
  margin: 0 0 12px 0;
  color: #fff;
}


.task-input {
  border-right: none;
  width: 100%;
  padding: 0 4px;
  outline: none;
  border: none;
  border-bottom: 1px solid #fff;
  background-color: transparent;
  margin-right: 12px;
  color: #fff;
  box-shadow: none;
  border-radius: 0;
}
.task-input:placeholder {
  color: #fff;
}

.task-list-item {
  background-color: #191933;
  border-radius: 4px;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  padding: 8px;
}
.task-list-item input {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: 1px solid #fff;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check' stroke='%23fff'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 0;
  transition: 0.2s;
  margin-left: 8px;
  flex-shrink: 0;
  margin-top: 4px;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}
.task-list-item input:hover {
  border-color: var(--checkbox-color);
  box-shadow: 0 0 0 3px var(--checkbox-shadow);
}
.task-list-item input:checked {
  background-size: 10px;
  border: 1px solid var(--checkbox-color);
  background-color: var(--checkbox-color);
}
.task-list-item input:checked + span {
  color: rgba(255, 255, 255, 0.5);
  -webkit-text-decoration: line-through rgba(255, 255, 255, 0.8);
          text-decoration: line-through rgba(255, 255, 255, 0.8);
}
.task-list-item-label {
  display: flex;
  align-items: flex-start;
  color: #fff;
  margin-left: 8px;
  font-size: 14px;
  line-height: 24px;
  position: relative;
  transition: 0.2s;
  cursor: pointer;
}

.delete-btn {
  margin-right: auto;
  display: block;
  width: 16px;
  height: 16px;
  background-repeat: no-repeat;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23ff3d46' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-trash-2'%3E%3Cpolyline points='3 6 5 6 21 6'/%3E%3Cpath d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'/%3E%3Cline x1='10' y1='11' x2='10' y2='17'/%3E%3Cline x1='14' y1='11' x2='14' y2='17'/%3E%3C/svg%3E");
  background-size: 16px;
  background-position: center;
  cursor: pointer;
}

@supports (-webkit-appearance: none) or (-moz-appearance: none) {
  input[type=checkbox],
input[type=radio] {
    -webkit-appearance: none;
    -moz-appearance: none;
  }
}
</style>
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="page-home.php" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>
        <!-- Hero Start -->
        <section class="bg-home bg-circle-gradiant d-flex align-items-center">
            <div class="bg-overlay bg-overlay-white"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8"> 
                    <div class="app-container" id="taskList">
                    <?php
                                $stmt = $con->prepare("SELECT 
                                                        *
                                                        FROM 
                                                            tasks
                                                        WHERE 
                                                            user_id = ?
                                                        AND
                                                            id  = ?
                                                        ");

                                $stmt->execute(array($_SESSION['userID'], $_GET['id']));

                                $Tasks = $stmt->fetch();

                                if(empty($Tasks)){
                                    header('Location: index.php'); // Redirect To Dashboard Page
                                    exit();
                                }

                                if($Tasks['priority'] == 1){
                                    $priority = 'Low';
                                }elseif($Tasks['priority'] == 2){
                                    $priority = 'Medium';
                                }elseif($Tasks['priority'] == 3){
                                    $priority = 'High';
                                }else{
                                    $priority = 'None';
                                }

                                if($Tasks['is_completed'] == 0){
                                    $status = 'غير مكتملة';
                                }else{
                                    $status = 'مكتملة';
                                }
                            ?>
                        <h1 class="app-header"><?php echo $Tasks['title']; ?></h1>
                        <hr>
                        <p style="color: white;"><?php echo $Tasks['description']; ?></p>
                        <hr>
                        <span style=" color: white;">الاهمية : <?php echo $priority; ?></span>
                        <hr>
                        <a href="controll/task-complated.php?id=<?php echo $Tasks['id'] ?>&status=<?php echo $Tasks['is_completed']; ?>">
                        <span style=" color: white;text-decoration: underline;">الحالة : <?php echo $status; ?></span>
                        </a>
                        <hr>
                        <?php if($Tasks['namefile'] !== '') { ?> 
                        <a href="update/<?php echo $Tasks['namefile']; ?>">
                        <span  style=" color: white; text-decoration: underline;">تحميل الملف <?php echo $Tasks['namefile']; ?></span>
                        </a>
                        <hr>
                        <?php } ?>
                        <span style=" color: white;">بدأ في : <?php echo $Tasks['start_at_time']; ?></span>
                        <hr>
                        <span style=" color: white;">انتهي في : <?php echo $Tasks['end_at_time']; ?></span>
                        <hr>
                        <div style="margin-right: auto;">
                            <a style="color: #fff;margin: 0 10px;" href="page-edit.php?id=<?php echo $Tasks ['id'] ?>">تعديل</a>
                            <a style="color: #c60000;margin: 0 10px;" href="controll/task-delete.php?id=<?php echo $Task['id'] ?>">حذف</a>
                        </div>
                    </div>
                    </div><!--end col-->
                    
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

<?php
    $nofooter = '';
    include 'page/footer.php'; 
    ob_end_flush();
?>