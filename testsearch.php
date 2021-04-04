<?php
include "libraries/User.php";
include "libraries/Database.php";
include "libraries/Search.php";
include "connect.php";

$search = new Search();
$columns = [
    'question',
    'answer'
];
$match_c = [
    'question'
];
$join_cond = "on question.question_id = answers.q_id";
$data = $search->searchJoin("what anatomy",$conn,"question",$columns,$match_c,"answers",$join_cond);
print("<pre>".print_r($data,true)."</pre>");

?>