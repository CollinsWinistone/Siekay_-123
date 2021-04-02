<?php
    session_start();

    define('TITLE', "Contact us ");
    require 'setup/env.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE . ' | ' . APP_TITLE; ?></title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
    </head>
    <body id="_4">
       <?php include "includes/navigation_bar.php"; ?>
        <!-- content -->
        <div id="content" class="clearfix">
            
            <div id="box-1">
                <div class="heading">
                    <center>
                    <h1 class="logo"><div id="i">Q</div><div id="cir">Q</div><div id="ntro">_nAnarea</div></h1><br>
                    <p id="tag-line">Where questions are themselves the answers!</p>
                    
                      
                      
                    </center>
                </div>
            </div>
            <div id="box-2">
                <div id="text">
                    <h1>Q_nAnarea.Inc</h1>
                    <p>
                      For troubleshooting and inquiries:<br><br>
                      
                        Email: adminqnanarea@gmail.com<br>
                        Whatsapp: <a style="color:#3800ff"href="https://wa.me/+254745451854">QnAnarea</a><br>
                        Follow us on Instagram: <a href="#">@q_nanarea</a>
                    </p>
                </div>
            </div>
            
        </div>
    
        <!-- Footer -->
        <?php include "includes/footer.php"; ?>
        <!-- end of footer-->
        
    </body>
    
</html>