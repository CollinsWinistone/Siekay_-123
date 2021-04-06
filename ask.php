<?php
    session_start();
    if(!isset($_SESSION['id']))
        header("location: login.php");
    define('TITLE', "Post questions ");
    require 'setup/env.php';
    include('connect.php');
    
?>
<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
    <!-- header file-->
    <?php include "includes/html-header.php"; ?>
    <!-- end of header file-->
    </head>
    <body id="ask">
        <?php include "includes/navigation_bar.php"; ?>
        
        <!-- content -->
        <div id="content">
            <div id="sf">
                <center>
                    <div class="heading ask">
                        <h1 class="logo"><div id="i">Q</div><div id="cir">Q</div><div id="ntro">_nAnarea</div></h1><br>
                        <p id="tag-line">Where questions are themselves the answers!</p>
                    </div>

                    <form action="includes/ask.inc.php" method="post" enctype="multipart/form-data">

                        <input name="question" type="text" title="Your Question..." placeholder="Post questions on our Community for greater user expereince!" id="question">

                        <select name="cat">
                            <option value="Category">Category</option>
                            <option value="Biochemistry">Biochemistry</option>
                            <option value="Anatomy">Anatomy</option>
                            <option value="Physiology">Physiology</option>
                            <option value="Genetics">Genetics</option>
                            <option value="Physics">Physics</option>
                            <option value="Microbiology">Microbiology</option>
                            <option value="Web development">Web Dev</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Brain Games">Brain Games</option>
                            <option value="Programming">Programming</option>
                            <option value="Economics">Economics</option>
                        </select>
                        <input name="submit" type="submit" class="up-in" id="ask_submit">
                    </form>
                </center>
            </div>
        </div>
        
        <div id="ask-ta">
            <h1>Your question has been posted successfully,stay tuned for the answers!</h1>
        </div>
        
        <?php
        
            if( isset( $_POST["submit"] ) )
            {

                function valid($data){
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }
                $question = valid( $_POST["question"] );
                
                $no = valid( $_POST["cat"]);
                $question = addslashes($question);
                $q = "SELECT * FROM quans WHERE question = '$question'";
                $result = mysqli_query($conn,$q);
                if(mysqli_error($conn))
                    echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                else if( $no == "Category"){
                    echo "<script>window.alert('Choose a Category.');</script>";
                }
                else if( mysqli_num_rows($result) == 0 ){
                  if (!empty($_POST['question'])) {
                    $query = "INSERT INTO quans VALUES(NULL, '$question', NULL,'".$_SESSION['user']."',NULL)";
                    $query1 = "INSERT INTO quacat SELECT q.id, c.name FROM quans as q, category as c WHERE q.question = '".$question."' AND c.name = '".$_POST['cat']."'";
                    mysqli_query( $conn, $query);
                    if(mysqli_query( $conn, $query1)){
                        echo "<style>#sf{display: none;} #ask-ta{display:block;}</style>";
                     } else{
                        echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                    }
                    // code...
                  
                    } else{
                      echo "<script>window.alert('Please write something :/.');</script>";
                    }
                  
                }
                else{
                    echo "<script>window.alert('Question was already Asked. Search it on Home Page.');</script>";
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