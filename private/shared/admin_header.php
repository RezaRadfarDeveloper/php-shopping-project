<?php if(!isset($page_title)){
    $page_title = 'ADMIN AREA';
 } ?>
<!DOCTYPE html>
<html>
<head>
    <title> <?php echo($page_title);?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo  url_for('/public/stylesheet/private.css');?> ">
</head>
<body>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark pink scrolling-navbar" style="background-color:#e91e63">
        <a class="navbar-brand" href="#"><strong>Navbar</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo url_for('/private/index.php'); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="<?php 
                    echo WWW_ROOT."/private/logout.php"; 
                    ?>">Logout</a>
                    <a class="nav-link" href="<?php echo url_for('/public/product/index.php'); ?>">products Home <span class="sr-only">(current)</span></a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/private/new.php'); ?>">Create Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Opinions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="margin-left:600px">LoggedIn User: <?php echo $_SESSION['user_name']?? "Anonymous Entry"; ?></a>
                </li>
            </ul>
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"><i class="fab fa-instagram"><?php echo display_session_message(); ?></i></a>
                </li>
            <li class="nav-link"></li></div>
            </ul>
            <div id="message" >
        </div>
    </nav>

</header>
