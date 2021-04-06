<?php
/**
 *@author Collins Simiyu
 *The library facilitates different actions related to a normal
 *user for the site
 */


class User {
	private $user_id;
	private $username;

	//constructor function
	public function __construct() {

	}
	/**
	 * Registers the user
	 * @param $user_data User information to
	 *        be registered to the site
	 * @param $db database connection to the data
	 * @param $dbObj the Database class object with various
	 * 		  CRUD operations
	 */
	public function register(array $user_data, $db,Database $dbObj) {
		$username = $user_data['username'];
		$password = $user_data['password'];
		$name = $user_data['name'];
		$email = $user_data['email'];

		//array of values to insert to array
		$values = [
			'username'=>$username,
			'password'=>$password,
			'name'=>$name,
			'email'=>$email
		];
		
		//columns to insert data
		$columns = [
			'username',
			'password',
			'name',
			'email'
		];

		//sql insertion query
		/*$sql = "INSERT INTO users
            (username,password,name,email)
            VALUES(?,?,?,?)";*/
		$dbObj->insert("users",$columns,$values,$db);
		
		

	}

	/**
	 * Authenticate a user login request
	 * @param $user_data -Array of user info to login
	 * @param $dbc -Database connection
	 * @param $dbObj -The Database object to perform CRUD 
	 * 			operations
	 * @param $authObj -Authentication object
	 */
	public function login(array $user_data,$dbc,Database $dbObj,Authenticate $authObj)
	{
		$user_auth = $authObj->login_authenticate($user_data,$dbc,$dbObj);
		
		$user_available = count($user_auth);
		if($user_available == 1)
		{
			$uid = $user_auth[0]['id'];
			$un = $user_auth[0]['username'];
			$this->user_id = $uid;
			$this->username = $un;
			return true;
		}
		else
		{
			return false;
		}
		
		
		

	}

	/**
	 * Adds user's question to the list of questions
	 */
	public function askQuestion() {

	}
	/**
	 * Adds user's answer to a particular question to the database
	 */

	public function answerQuestion() {

	}
	/**
	 * gets the user_id of this user
	 * @return $this->user_id -User id of the current user
	 */
	public function getUserId()
	{
		return $this->user_id;
	}
	/**
	 * gets the username of this user
	 * @return $this->username -Username of this user
	 */
	public function getUsername()
	{
		return $this->username;
	}

	public function getEmail($id,Database $dbObj,$conn)
	{
		$data = $dbObj->retrieve(array('email'),
								 "users",
								"id = $id",
									$conn);
		$email = $data[0]['email'];
		return $email;
	}

	public function getDate($id,Database $dbObj,$conn)
	{
		$data = $dbObj->retrieve(array('join_date'),
								 "users",
								 "id = $id",
								  $conn);
		$date = $data[0]['join_date'];
		return $date;
	}

	public function getUsernameById($id,Database $dbObj,$conn)
	{
		$data = $dbObj->retrieve(array('username'),
								 'users',
								 "id=$id",
							      $conn);

		$username = $data[0]['username'];
		return $username;
	}
}
