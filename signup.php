<?php
    session_start();
    
   
    
    include('connect.php');
    
    
    define('TITLE', "Sign-up ");
    require 'setup/env.php';

?>

<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
    <!-- header file-->
    <?php include "includes/html-header.php"; ?>
    
    </head>
    <!-- end of header file-->
    <body id="_6">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">Q</div><div id="cir">Q</div><div id="ntro">_nAnarea</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
            <a href="categories.php"><li>Categories</li></a>
            <a href="contacts.php"><li>Contact</li></a>
            <a href="ask.php"><li>Ask Question</li></a>
            <?php 
                if(! isset($_SESSION['user'])){
            ?>
            <a href="login.php"><li>Log In</li></a>
            <a href="signup.php"><li id="home">Sign Up</li></a>
            <?php
                }
                else{
            ?>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>
        <!-- end of navigation bar-->
        
        <!-- content -->
        <div id="content">
            <div id="sf">
                <center>
                    <div class="heading">
                        <h1 class="logo"><div id="i">Q</div><div id="cir">Q</div><div id="ntro">_nAnarea</div></h1><br>
                        <p id="tag-line">Where questions are themselves the answers!</p>
                        <h1>Create an account </h1>
                    </div>

                    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">
                        <input name="username" id="user" type="text" title="This will be your parmanent Id." placeholder="username" required>
                        <input name="password" id="key" type="password" title="Password must contain at least 8 characters including alphabets,numbers, and symbols." placeholder="password" required>
                        <i class="material-icons" id="lock">lock</i>
                        <i class="material-icons" id="person">person</i>
                        <input name="name" id="name" type="text" title="Although, you will be called by your name only" placeholder="full name" required>
                        <input name="email" id="mailbox" type="email" title="Your Email id is in safe hands." placeholder="Enter a valid email address." required>
                        <i class="material-icons" id="email">mail</i>
                        <i class="material-icons" id="iden">perm_identity</i>

                        <div id="button-block">
                            <center>
                                <div class="buttons"><input name="submit" type="submit" value="Create An Account" class="up-in"></div>
                                <div class="buttons" id="new"><input type="button" value="Already a member : Log In" class="up-in" id="tolog"></div>
                            </center>
                        </div>
                    </form>
                </center>
            </div>
            
            <div id="ta">
                <h1>Thank You For Registering With Us.</h1>
            </div>
            
        </div>
        
        <?php
        
            if( isset( $_POST["submit"] ) )
            {

                function valid($data){
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }

                $username = valid( $_POST["username"] );
                $password = valid( $_POST["password"] );
                $password = password_hash($password, PASSWORD_DEFAULT);
                $name = valid( $_POST["name"] );
                $email = valid( $_POST["email"] );

                $query = "INSERT INTO users values( NULL, '$username', '$password', '$name', '$email', CURRENT_TIMESTAMP )";
                if(mysqli_error($conn)){
                    echo "<script>window.alert('Something went wrong.Try again');</script>";
                }
//                echo $query;
                else if( mysqli_query( $conn, $query) ){
                    echo "<style>#sf{display: none;} #ta{display:block;}</style>";
                }
                else{
//                    echo mysqli_error($conn);
                    echo "<script>window.alert('Username already exists.Try again!');</script>";
                }
                mysqli_close($conn);
            }
        
        ?>
        
       
        
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    </body>
    
</html>