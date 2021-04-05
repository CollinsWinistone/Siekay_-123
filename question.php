<?php

include "includes/html-header.php";
include "libraries/Database.php";
include "libraries/Question.php";
include "libraries/Answer.php";
include "connect.php";

$dbObj = new Database();
$qObj = new Question();
$ansObj = new Answer();


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
    <p><?php echo $answer['answer']; ?></p>
    <?php endforeach; ?>

</div>
    
</body>
</html>