<?php
/**
 * @author Eng Collins Simiyu
 * Contains and exposes different APi methods to 
 * manipulate,retrieve and perform operations related to answers
 */

class Answer
{
    /**
     * returns all the answers for a particular question
     * @param $id Question id
     * @param $conn Database connection
     * @param $db database file to perfom CRUD operations
     * @return $answers array of answers for a particular question
     */
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