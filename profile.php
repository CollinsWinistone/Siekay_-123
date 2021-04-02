<?php

    define('TITLE', "My profile ");
    require 'setup/env.php';
    


    session_start();
    if(! isset($_SESSION['user']))
        header("Location: login.php");
?>
<!DOCTYPE html>
<html>
    <!-- header file-->
    <?php include "includes/html-header.php"; ?>
    </head>
    <body id="pro">
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
            <a href="profile.php"><li id="home">Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
        </ul>
        <!-- end of navigation bar-->
        
        <!-- content -->
        <div id="content">
        <center>
            <h1 id="hea"><?php echo "Profile - ".$_SESSION["user"]; ?></h1>
            <div class="clearfix">
                <div id="hea-det">
                    <p id="first">N</p><p class="tit">ame: </p>
                    <p class="det"><?php echo $_SESSION["name"]; ?></p><br>
                    
                    
                    <p id="first">E</p><p class="tit">mail: </p>
                    <p class="det"><?php echo $_SESSION["email"]; ?></p><br>
                    
                    
                    <p id="first">G</p><p class="tit">roup: </p>
                    <p class="det"><?php echo 'fun'; ?></p><br>
                    
                    
                    <p id="first">Q</p><p class="tit">uestions answered: </p>
                    <p class="det"><?php echo 5; ?></p><br>
                    
                    <p id="first">A</p><p class="tit">sked questions: </p>
                    <p class="det"><?php echo 0; ?></p><br>
                    
                    
                    <p id="first">J</p><p class="tit">oined: </p>
                    <p class="det"><?php echo
                    get_time_ago ( time ()- sec($_SESSION['date']));

                    ; ?></p>
                </div>
                <div id="pic"></div>
            </div>
        </center>
        </div>
    
        <!-- Footer -->
        <?php include "includes/footer.php"; ?>
        <!-- end of footer-->
        
    </body>
    
</html>