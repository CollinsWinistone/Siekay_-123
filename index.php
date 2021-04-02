<?php
session_start();
error_reporting(0);

define('TITLE', "Home ");
require 'setup/env.php';
echo $_SESSION['user'];


include('connect.php');
if (isset($_POST["ansubmit"])) {
    function valid($data)
    {
        $data = trim(stripslashes(htmlspecialchars($data)));
        return $data;
    }
    $answer = valid($_POST["answer"]);
    if ($answer == NULL) {
        echo "<script>window.alert('Please type something,thank you');</script>";
    } else {

        if (!empty($_SESSION['user'])) {

            $que = "";
            if ($_POST["nul"] == 0) {
                if (strpos($_POST["preby"], $_SESSION["user"]) === false)
                    $que = "update quans set answer=CONCAT(answer,'<br><br>|Next answer<br><br> Ans." . $_POST["answer"] . "'), answeredby=CONCAT(answeredby,', @ " . $_SESSION["user"] . "') where question like '%" . $_POST["question"] . "%'";
                else {
                    echo "<script>window.alert('Sorry,you already answered this question!');</script>";
                    header("Location: index.php");
                }
            } else
                $que = "update quans set answer='Ans." . $_POST["answer"] . "', answeredby = '" . $_SESSION["user"] . "' where question like '%" . $_POST["question"] . "%'";
            if (mysqli_query($conn, $que))
                echo "<style>#box0,.open{display: none;} #tb{display: block;}</style>";
            else
                header("Location: index.php");
        } else {

            echo "<script>window.alert('Please login to answer questions,thank you');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<?php include "includes/html-header.php";?>

</head>

<body id="_1">
    <!--included navigation bar-->
    <?php include "includes/navigation_bar.php";?>
    
    <!--end of navigation bar-->

    <!-- content -->
    <div id="content">

        <div id="searchbox">


            <center>


                <?php
                if (isset($_SESSION['user'])) {
                    echo "<p>Thank you " . "<span style='color:green;'>" . $_SESSION['user'] . "</span>" . " for joining QnAnarea,let's build our community together,invite your friends for greater engagement!</p>";
                } else {
                    echo "<h2>Welcome to QnAnarea,please login and learn more by asking and answering questions!</h2>";
                }
                ?>


            </center>
            <center>
                <div class="heading">
                    <h1 class="logo">
                        <div id="i">Q</div>
                        <div id="cir">Q</div>
                        <div id="ntro">_nAnarea</div>
                    </h1><br>
                    <p id="tag-line">Where questions are themselves the answers!</p>
                </div>
                <!-- search form-->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <input name="text" id="search" type="text" title="Question your Answers" placeholder="Type your question...">
                    <i class="material-icons" id="sign">search</i>
                    <!-- submit button-->
                    <input name="submit" type="submit" value="Search" class="up-in" id="qsearch">
                </form>
                <!-- end of search form-->
            </center>
        </div>
        <div class="pop" id="ta">
            <h1><b style="font-size: 1.5em; margin: -60px auto 10px; display: block;">Ooops...sorry!</b>Your search for "<?php echo $_POST['text'] ?>" didn't match any documents.Please post the question.</h1>
        </div>
        <div class="pop" id="tb">
            <center>
                <h1><b style="font-size: 1.5em; margin: -60px auto 10px; display: block;"></b>Thank you for your answer.</h1>
            </center>
        </div>
        <?php

        if (isset($_POST["submit"])) {
            function valid($data)
            {
                $data = trim(stripslashes(htmlspecialchars($data)));
                return $data;
            }

            function check($data)
            {
                $data = strtolower($data);
                if ($data != "what" && $data != "how" && $data != "who" && $data != "whom" && $data != "when" && $data != "why" && $data != "which" && $data != "where" && $data != "whose" && $data != "is" && $data != "am" && $data != "are" && $data != "do" && $data != "don't" && $data != "does" && $data != "did" && $data != "done" && $data != "was" && $data != "were" && $data != "has" && $data != "have" && $data != "will" && $data != "shall" && $data != "the" && $data != "i" && $data != "a" && $data != "an" && $data != "we" && $data != "he" && $data != "she" && $data != "")
                    return 1;
                return 0;
            }
            $text = valid($_POST["text"]);
            if ($text == NULL) {
                echo "<script>window.alert('Please Enter something to search.');</script>";
            } else {
                $text = preg_replace("/[^A-Za-z0-9]/", " ", $text);
                $words = explode(" ", $text);
                $format = "select * from quans where question like '%";
                $query = "";
                foreach ($words as $word) {
                    if (check($word)) {
                        if ($query == "")
                            $query = $format . $word . "%'";
                        else
                            $query .= " union " . $format . $word . "%'";
                    }
                }
                if (!$query) {
                    echo "<script>window.alert('Search appropriate question.');</script>";
                } else {
                    $r = mysqli_query($conn, $query);
                    if (mysqli_error($conn))
                        echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                    else if (mysqli_num_rows($r) > 0) {
        ?>
                        <style>
                            .open {
                                display: block;
                            }
                        </style>
                        <center>
                            <div class='open' style='height: auto; margin: 60px auto -135px;'>

                                <div id='topic'>
                                    <h2 id='topic-head' style="font-weight: normal; border:none; font-size: 22px;">Your Search Results for '<?php echo $text; ?>' are :</h2>
                                </div>

                                <?php $n = 1;
                                $nul = 0;
                                while ($row = mysqli_fetch_assoc($r)) { ?>

                                    <div id="qa-block">
                                        <div class="question">
                                            <div id="Q">Q.</div><?php echo $row["question"] . "<small id='sml'>Posted by: @<span style='color:orange;'>" . $row['askedby'] . "</span></small>"; ?>
                                        </div>
                                        <div class="answer">
                                            <?php
                                            if ($row["answer"]) {
                                                $nul = 0;
                                                echo $row["answer"] . "<br><small>Answered By: @<span style='color:green;'>" . $row['answeredby'] . "</span></small>";
                                            } else {
                                                $nul = 1;
                                                echo "<em>*** Not Answered Yet ***</em>";
                                            }
                                            ?>
                                            <form id="f<?php echo $n; ?>" style="margin-bottom: -25px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                                <!--                                    <input type="button" value="Click here to answer." id="ans_b" >-->
                                                <label style="margin-bottom: -25px;"><a id="ans_b<?php echo $n; ?>" href="#area<?php echo $no; ?>"><u>Submit your answer</u></a></label>
                                                <br>
                                                <script>
                                                    $(function() {
                                                        $('#ans_b<?php echo $n; ?>').click(function(e) {
                                                            e.preventDefault();
                                                            $('#area<?php echo $n; ?>').css("display", "block");
                                                            $('#ar<?php echo $n; ?>').css("display", "block");
                                                            $('#f<?php echo $n; ?>').css("margin-bottom", "0px");
                                                        });
                                                    });
                                                </script>
                                                <textarea id="area<?php echo $n; ?>" name="answer" placeholder="Your Answer..."></textarea>
                                                <input style="display: none;" name="question" value="<?php echo $row['question'] ?>">
                                                <input style="display: none;" name="nul" value="<?php echo $nul ?>">
                                                <input style="display: none;" name="preby" value="<?php echo $row['answeredby'] ?>">
                                                <br>
                                                <input type="submit" name="ansubmit" value="Submit" class="up-in ans_sub" id="ar<?php echo $n; ?>">

                                            </form>


                                        </div>
                                    </div>
                                <?php $n++;
                                } ?>
                            </div>
                        </center>
        <?php
                    } // if for no. of rows
                    else {
                        echo "<style>#searchbox{display: none;} #ta{display: block;}</style>";
                    }
                }
            } // a non null if
        } // isset for submit
        ?>



        <center>

            <p><span style="color:red;"><strong>N/B: </strong></span>We are still under development and this is the legacy version of QnAnarea,a new version coming soon!</p>

        </center>
    </div>
    <!-- Footer -->
    <?php include "includes/footer.php";?>
    <!-- end of footer-->

</body>

</html>