<?php

class Answer
{
    public function getAnswer($id,$conn,Database $db)
    {
        $answers = $db->retrieve(array('answer','q_id','answered_by'),
                                 "answers",
                                 "q_id = $id",
                                 $conn);

        return $answers;
    }
}

?>