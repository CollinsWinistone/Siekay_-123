<?php
include "../libraries/Search.php";
include "../connect.php";


if(isset($_GET['submit']))
{
    $q=$_GET['q'];//search query
    $searchObj = new search();//search object
    $columns = array('question','answer');
    $match_col = array('question');
    $joinTable = 'answers';
    $joinCond  = "on question_id=q_id";

    $results=$searchObj->searchJoin($q,
                            $conn,
                            "question",
                            $columns,
                            $match_col,
                            $joinTable,
                            $joinCond);
    header("Location :../search.php");

    

    
}

?>