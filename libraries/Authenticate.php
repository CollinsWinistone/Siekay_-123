<?php 
/**
 * @author Eng Collins Simiyu
 * Authentication our users
 * 
 * 
 */
class Authenticate
{
    /**
     * Authenticates validity of a user
     * @param $user_data User information to be authenticated
     * @param $db The database connection
     */
    public function login_authenticate(array $user_data,$db,Database $dbObj)
    {
        
        
        //data to authenticate
        $username = $user_data['username'];
        $password = $user_data['password'];


        $selected_cols = [
            'username',
            'password',
            'id'
        ];
        
        $condition = "username = '$username'";

        $auth_data = $dbObj->retrieve($selected_cols,"users",$condition,$db);
        
        
        return $auth_data;
        



    }
    /**
     * Logs out a user
     * or destroys a user session
     */
    public function logout_request()
    {
        session_destroy();
        
    }
}

?>