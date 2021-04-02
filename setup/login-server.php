
<?php
include('connect.php');



    if( isset( $_POST["submit"] ) )
    {   

        function valid($data){
            $data=trim(stripslashes(htmlspecialchars($data)));
            return $data;
        }

        $inuser = valid( $_POST["username"] );
        $inkey = valid( $_POST["password"] );


        $query = "SELECT username, password, name, email, join_date FROM users WHERE username='$inuser'";

        $result = mysqli_query( $conn, $query);
        if(mysqli_error($conn)){
            echo "<script>window.alert('Something went wrong. Try again');</script>";
        }
        else if( mysqli_num_rows($result) > 0 ){
            while( $row = mysqli_fetch_assoc($result) ){
                $user = $row['username'];
                $pass = $row['password'];
                $name = $row['name'];
                $email = $row['email'];
                $date = $row['join_date'];
            }

            if( password_verify( $inkey, $pass ) ){
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['date'] = $date;
                header('Location: /index.php');
            }
            else{
                echo "<script>window.alert('Wrong username or password.Try again!');</script>";
            }
        }
        else{
            $error = "<script>window.alert('No Such User exist in database');</script>";
            
            
        }
        mysqli_close($conn);
        header('Location: ../login.php');
    }
    
    
?>
