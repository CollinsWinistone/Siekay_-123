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
     */
    public function answersQuestion()
    {

    }

    /**
     * Displays all questions
     */
    public function displayAllQuestions()
    {

    }

    /**
     * Display all questions based on Category
     */
    public function displayCategoryQuestion()
    {

    }
    
    /**
     * Display all questions for a posted by a particular user
     */
    public function displayUserQuestion()
    {

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