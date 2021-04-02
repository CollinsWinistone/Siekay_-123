<?php
    session_start();
    
    if( isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    include('connect.php');
    
    
    define('TITLE', "Sign-in ");
    require 'setup/env.php';




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
                echo "<script>window.location.href='index.php'</script>";
            }
            else{
                echo "<script>window.alert('Wrong username or password.Try again!');</script>";
            }
        }
        else{
            echo "<script>window.alert('No Such User exist in database');</script>";
        }
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>
    <!--header file-->
    <?php include "includes/html-header.php";?>
    </head>
    <!-- end of header file-->
    <body id="_5">
       <!-- navigation bar-->

       <?php include "includes/navigation_bar.php"; ?>

       <!-- end navigation bar-->
        
        <!-- content -->
        <div id="content">
            <center>
                <div class="heading">
                    <h1 class="logo"><div id="i">Q</div><div id="cir">Q</div><div id="ntro">_nAnarea</div></h1><br>
                    <p id="tag-line">Where questions are themselves the answers!</p>
                    <h1>Login to your account </h1>
                </div>

                <!-- login form-->
                <form action="<?php echo "http://" . $_SERVER['HTTP_HOST']."/legacy/includes/login.inc.php";?>" method="post" enctype="multipart/form-data">
                    <input name="username" id="user" type="text" title="Username" placeholder="Username" required>
                    <input name="password" id="key" type="password" title="Password" placeholder="Password" required>
                    <i class="material-icons" id="lock">lock</i>
                    <i class="material-icons" id="person">person</i>
                    <div id="button-block">
                        <center>
                            <div class="buttons"><input name="submit" type="submit" value="Log In" class="up-in"></div>
                            <div class="buttons" id="new"><input type="button" value="Create a new account" class="up-in" id="tosign"></div>
                        </center>
                    </div>
                    <a href="contacts.php" id="trouble"><span>Having Trouble logging in? Contact Us</span></a>
                </form>
                <!-- end of login form-->
            </center>
        </div>
        
        
        <!-- Footer -->
        <?php include "includes/footer.php"; ?>
        <!-- end of footer-->
        
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    </body>
    
</html>