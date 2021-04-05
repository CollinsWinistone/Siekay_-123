<?php include "./config/config.php"; ?>

<nav class="navbar navbar-expand-md navbar-light bg-light ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container w-75 mx-auto">
        <a class="navbar-brand" href="#">
            <div id="ntro">Q_nAnarea</div>
        </a>


        <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active ">
                    <a class="nav-link" href="<?php echo $root_url . "index.php"; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_url . "categories.php"; ?>">categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_url . "contacts.php"; ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_url . "ask.php"; ?>">Ask Question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_url . "login.php"; ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_url . "profile.php"; ?>">profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_url . "signup.php"; ?>">Sign up</a>
                </li>

            </ul>

        </div>
    </div>
</nav>