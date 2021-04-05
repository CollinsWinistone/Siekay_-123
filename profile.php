<?php

define('TITLE', "My profile ");
require 'setup/env.php';
include "libraries/User.php";
include "libraries/Database.php";
include "connect.php";
$userObj = new User();
$dbObj = new Database();



session_start();
if (!isset($_SESSION['user']))
    header("Location: login.php");
?>
<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
<!-- header file-->
<?php include "includes/html-header.php"; ?>
</head>

<body id="pro">
    <?php include "includes/navigation_bar.php"; ?>

    <!-- content -->
    <div id="content">
        <center>
            <h1 id="hea"><?php echo "Profile - " . $_SESSION["user"]; ?></h1>
            <div class="clearfix">
                <div id="hea-det">
                    <p id="first">N</p>
                    <p class="tit">ame: </p>
                    <p class="det"><?php echo $_SESSION["user"]; ?></p><br>


                    <p id="first">E</p>
                    <p class="tit">mail: </p>
                    <p class="det">
                        <?php

                        $email = $userObj->getEmail(
                            $_SESSION['id'],
                            $dbObj,
                            $conn
                        );
                        echo $email;
                        ?>
                    </p>
                    <br>


                    <p id="first">G</p>
                    <p class="tit">roup: </p>
                    <p class="det"><?php echo 'fun'; ?></p><br>


                    <p id="first">Q</p>
                    <p class="tit">uestions answered: </p>
                    <p class="det"><?php echo 5; ?></p><br>

                    <p id="first">A</p>
                    <p class="tit">sked questions: </p>
                    <p class="det"><?php echo 0; ?></p><br>


                    <p id="first">J</p>
                    <p class="tit">oined: </p>
                    <p class="det">
                        <?php
                        $date = $userObj->getDate(
                            $_SESSION['id'],
                            $dbObj,
                            $conn
                        );


                        echo get_time_ago(time() - sec($date));; ?></p>
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