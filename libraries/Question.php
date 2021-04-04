<?php 
/**
 * Contains libraries to facilitate a user
 * to do many staffs on question eg ask,answer,like
 * etc
 */

 class Question
 {
    //constructor
    public function __construct()
    {

    }

    /**
     * Adds the question to the questions list
     * @param $dbc -Database connection
     * @param $columns -Columns to add queston data
     * @param $values -Values to insert into those columns
     */
    public function askQuestion(mysqli $dbc,
                                array $columns,
                                array $values,
                                Database $dbObj,
                                string $table)
    {
       
      $dbObj->insert($table,$columns,$values,$dbc);
    }

    /**
     * Adds a response to a question in the list
     * @param $table -Table to insert data into
     * @param $columns to inseet data into
     * @param $db Database connection
     * @param $dbObj -Database CRUd file
     * @param $q_id Question id to be answered
     */
    public function answersQuestion($table,$columns,$values,$db,Database $dbObj)
    {
      
      $dbObj->insert($table,$columns,$values,$db);

    }

    /**
     * Displays all questions
     */
    public function displayAllQuestions()
    {

    }

    /**
     * Display all questions based on Category
     * @param dbObj -The database file containing CRUD 
     *              operations
     * @param table -The table storing question data
     * @param columns -An array of columns to be returned 
     *                for further processing
     * @param cat_id -Category id to retrieve questions from
     * @param conn -Database connection
     */
    public function displayCategoryQuestion(Database $dbObj,
                                            string $table,
                                            array $columns,
                                            int $cat_id,
                                            mysqli $conn)
    {
      $data = $dbObj->retrieve($columns,$table,"cat_id = $cat_id",$conn);
    }
    
    /**
     * Display all questions for a posted by a particular user
     * @param user_id -Id of the user to retrieve questions
     * posted by him/her
     */
    public function displayUserQuestion(int $user_id,
                                        Database $dbObj,
                                        array $selectColumns,
                                        string $condition,
                                        mysqli $conn,
                                        string $table)
    {
      $qns = $dbObj->retrieve($selectColumns,$table,$condition,$conn);
      return $qns;

    }
    /**
     * Display a question posted at a particular time
     */
    public function displayTimeQuestion()
    {

    }
    /**
     * Display all unanswered questions of a 
     * particular category
     */
    public function displayNotAnsweredQuestion()
    {

    }
    
    
    
   
 }

?>