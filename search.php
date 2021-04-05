<?php
include "includes/html-header.php";

?>
<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php
include "libraries/Search.php";
include "connect.php";
include "includes/navigation_bar.php";
include "libraries/Category.php";
include "libraries/Database.php";


if(isset($_GET['submit']))
{
    $q=$_GET['q'];//search query
    $searchObj = new search();//search object
    $catObj = new Category();
    $dbObj = new Database();
    $columns = array('question','answer','askedby','category','question_id');
    $match_col = array('question');
    $joinTable = 'answers';
    $joinCond  = "ON question.question_id = answers.q_id";

    $results=$searchObj->searchJoin($q,
                            $conn,
                            "question",
                            $columns,
                            $match_col,
                            $joinTable,
                            $joinCond);
    
    
                           
    
}


?>
<div class="container">
    <?php foreach($results as $result):?>
        <ul class="list-group">
            <li class="list-group-item row">
            <span class="text-danger col">
                <?php 
                
                    echo "@".$result['askedby'];

                ?>
            </span>
            <span class="col">
            <?php 
                $q_id = $result['question_id'];
                $q_link = "question.php?id=$q_id";
            ?>
               <a href="<?php  echo $q_link; ?>">
                <?php

                    echo " {$result['question']}";

                ?>
               </a>
            </span>
            <span class="col">

                <?php
                    $catid=$result['category'];
                    $catname=$catObj->getCategoryName($catid,$dbObj,$conn);
                    echo $catname." category";

                ?>

            </span>
            </li>
            
        </ul>
    <?php endforeach;?>
</div>



<script src="bjs/js/bootstrap.min.js"></script>  
</body>
</html>