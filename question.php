<?php
session_start();

include "includes/html-header.php";
include "libraries/Database.php";
include "libraries/Question.php";
include "libraries/Answer.php";
include "libraries/User.php";
include "connect.php";

$dbObj = new Database();
$qObj = new Question();
$ansObj = new Answer();
$uObj = new User();



if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
$data=$qObj->getQuestionInfo($id,$conn,$dbObj);
$answers =  $ansObj->getAnswer($id,$conn,$dbObj);

?>
<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
</head>
<body>
<!-- navigation bar-->
<?php include "includes/navigation_bar.php"; ?>
<div class="container">
    <h3 class="text-center">
        <?php
            echo $data[0]['question'];
            
        ?>
    </h3>
    <?php foreach($answers as $answer):?>
    <p>
    <span class="text-danger pr-5">
        <?php 
            $data=$uObj->getEmail($_SESSION['id'],$dbObj,$conn);
            echo $data;
        ?>
    </span>
    <span class="text-primary pr-5">
        <?php
            

            echo $answers[0]['answer'];

        ?>
    </span>
    <span class="text-primary">
        <?php
            

            $uid = $answers[0]['answered_by'];
            $name = $uObj->getUsernameById($uid,$dbObj,$conn);
            echo $name;

        ?>
    </span>
    </p>
    <?php endforeach; ?>

</div>
    
</body>
</html>