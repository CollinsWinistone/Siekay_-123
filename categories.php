<?php

    session_start();
    error_reporting(0);
    include('connect.php');

    define('TITLE', "Categories ");
    require 'setup/env.php';


    if(isset($_POST["ansubmit"])){
        function valid($data){
            $data = trim(stripslashes(htmlspecialchars($data)));
            return $data;
        }
        $answer = valid($_POST["answer"]);
        if($answer == NULL){
            echo "<script>window.alert('Please type something,thank you');</script>";
        }
        else{
          
          if(!empty($_SESSION['user'])){
            
            $que = "";
            if($_POST["nul"]==0){
                if(strpos($_POST["preby"],$_SESSION["user"]) === false)
                    $que = "update quans set answer=CONCAT(answer,'<br><br>|Next answer<br><br> Ans.".$_POST["answer"]."'), answeredby=CONCAT(answeredby,', @ ".$_SESSION["user"]."') where question like '%".$_POST["question"]."%'";
                else{
                  echo "<script>window.alert('Sorry,you already answered this question!');</script>";
                  header("Location: index.php");
                  
            }}
            else
                $que = "update quans set answer='Ans.".$_POST["answer"]."', answeredby = '".$_SESSION["user"]."' where question like '%".$_POST["question"]."%'";
            if(mysqli_query($conn,$que))
                echo "<style>#box0,.open{display: none;} #tb{display: block;}</style>";
            else
                header("Location: index.php");
        
          }else{
            
            echo "<script>window.alert('Please login to answer questions,thank you');</script>";
    }
        }
    } 

?>
<!DOCTYPE html>
<html>
        <?php include "includes/html-header.php"; ?>
        <!-- Sripts -->
        
        <script type="text/javascript" src="js/script.js"></script>
        
    </head>
    <body id="_3">
       <?php include "includes/navigation_bar.php"; ?>
        
        <!-- content -->
        <div id="content">
            <h4>
                <a id="title-head" href="categories.php">Categories</a>
            </h4>
            <div id="box0">
                <center>
                    <a id="ada" href="#box1">
                        <div id="algo" class="img">
                            <div id="p" title="Open">Biochemistry</div>
                        </div>
                    </a>
                    <a id="cso" href="#box2">
                        <div id="archi" class="img">
                            <div id="p" title="Open">Anatomy</div>
                        </div>
                    </a>
                    <a id="t" href="#box3">
                        <div id="toc" class="img">
                            <div id="p" title="Open">Physiology</div>
                        </div>
                    </a>
                </center>
                
                
                
                <center>
                    <a id="db" href="#box4">
                        <div id="database" class="img">
                            <div id="p" title="Open">Physics</div>
                        </div>
                    </a>
                    <a id="pqt" href="#box5">
                        <div id="prob" class="img">
                            <div id="p" title="Open">Microbiology</div>
                        </div>
                    </a>
                    <a id="se" href="#box6">
                        <div id="soft" class="img">
                            <div id="p" title="Open">Genetics</div>
                        </div>
                    </a>
                </center>
                
                
                
                <center>
                    <a id="web" href="#box7">
                        <div id="web-img" class="img">
                            <div id="p" title="Open">Web Dev</div>
                        </div>
                    </a>
                    <a id="mat" href="#box8">
                        <div id="mat-img" class="img">
                            <div id="p" title="Open">Mathematics</div>
                        </div>
                    </a>
                    <a id="eng" href="#box9">
                        <div id="eng-img" class="img">
                            <div id="p" title="Open">Engineering</div>
                        </div>
                    </a>
                </center>
                
                
                
                <center>
                    <a id="eco" href="#box10">
                        <div id="eco-img" class="img">
                            <div id="p" title="Open">Economics</div>
                        </div>
                    </a>
                    <a id="pro" href="#box11">
                        <div id="pro-img" class="img">
                            <div id="p" title="Open">Programming</div>
                        </div>
                    </a>
                    <a id="bra" href="#box12">
                        <div id="bra-img" class="img">
                            <div id="p" title="Open">Brain Games</div>
                        </div>
                    </a>
                </center>
                
                
                
                
                
                
                
            </div>
            <div class="pop" id="tb">
                <center><h1>Your answer has been successfully posted,thank you!</h1></center>
            </div>
            <center>
                <?php
                    $no = 1;
                    $n = 1;
                    $nul=0; 
                    while($no < 13){
                ?>
                <div id="box<?php echo $no; ?>" class="open">
                    <a href=""><div id="close">X</div></a>
                    <div id="topic">
                        <?php 
                            echo "<h2 id='topic-head'>";
                            $q = 'select name, description from category where id='.$no;
                            $r = mysqli_query($conn,$q);

                            $d = mysqli_fetch_assoc($r);
                            echo $d['name'].'</h2><p id="topic-desc">'.$d['description']."<br><br><br>Explore our home page for more questions.</p>";
                        ?>
                    </div>
                    
                    <center>
                        <?php
                            $qu = "select q.question, q.answer, q.askedby, q.answeredby from quans as q, quacat as r, category as c where q.id=r.id and r.category=c.name and c.id='$no' Limit 8";
                            $re = mysqli_query($conn,$qu);
                            while($da = mysqli_fetch_assoc($re)){
                        ?>
                        <div id="qa-block">
                            <div class="question">
                                <div id="Q">Q.</div>
                                <?php echo $da['question']."<small id='sml'>Posted by: @<span style='color:orange;'>".$da['askedby']."</span></small>"; ?>
                            </div>
                            <div class="answer">
                              <span><?php echo 'Posted: 2 mins ago' ?></span><br>
                                <?php 
                                    if($da["answer"]){
                                        $nul=0;
                                        echo $da["answer"]."<br><small>Answered By: @<span style='color:green;'>".$da['answeredby']."</span></small>";
                                    }
                                    else{
                                        $nul=1;
                                        
                                        echo "<em>*** Not Answered Yet ***</em>";
                                    }
                                ?>
                                
                                <form id="f<?php echo $n; ?>" style="margin-bottom: -25px;" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">
<!--                                    <input type="button" value="Click here to answer." id="ans_b" >-->
                                    <label style="margin-bottom: -25px;"><a id="ans_b<?php echo $n; ?>" href="#area<?php echo $no; ?>"><u>Submit your answer</u></a></label>
                                    <br>
                                    <script>
                                        $(function(){
                                            $('#ans_b<?php echo $n; ?>').click(function(e){
                                                e.preventDefault();
                                                $('#area<?php echo $n; ?>').css("display","block");
                                                $('#ar<?php echo $n; ?>').css("display","block");
                                                $('#f<?php echo $n; ?>').css("margin-bottom","0px");
                                            });
                                        });
                                    </script>
                                    <textarea id="area<?php echo $n; ?>" name="answer" placeholder="Type your answer..."></textarea>
                                    <input style="display: none;" name="question" value="<?php echo $da['question'] ?>">
                                    <input style="display: none;" name="nul" value="<?php echo $nul ?>">
                                    <input style="display: none;" name="preby" value="<?php echo $da['answeredby'] ?>">
                                    <br>
                                    <input type="submit" name="ansubmit" value="Submit" class="up-in ans_sub" id="ar<?php echo $n; ?>">
                                    
                                </form>
                                

                                
                            </div>
                        </div>
                        <?php $n++; } ?>
                    </center>
                    
                </div><!-- box1 -->
                <?php
                    $no++;
                }
                ?>
            </center>
            
        </div><!-- content -->
        
        <!-- Footer -->
        <?php include "includes/footer.php"; ?>
        <!-- end of footer-->
        
        
    </body>
    
</html>