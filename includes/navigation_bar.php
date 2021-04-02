<!-- navigation bar -->
<a href="index.php">
        <div id="log">
            <div id="i">Q</div>
            <div id="cir">Q</div>
            <div id="ntro">_nAnarea</div>
        </div>
    </a>
    <ul id="nav-bar">
        <a href="index.php">
            <li id="home">Home</li>
        </a>
        <a href="categories.php">
            <li>Categories</li>
        </a>
        <a href="contacts.php">
            <li>Contact</li>
        </a>
        <a href="ask.php">
            <li>Ask Question</li>
        </a>
        <!--show login and signup page if user is not logges in-->
        <?php
        if (!isset($_SESSION['user'])) {
        ?>
            <a href="login.php">
                <li>Log In</li>
            </a>
            <a href="signup.php">
                <li>Sign Up</li>
            </a>
        <?php
        } else {
        ?>
            <a href="profile.php">
                <li>Hi, <?php echo $_SESSION["user"]; ?></li>
            </a>
            <a href="logout.php">
                <li>Log Out</li>
            </a>
        <?php
        }
        ?>
    </ul>
    <!--end of navigation bar-->