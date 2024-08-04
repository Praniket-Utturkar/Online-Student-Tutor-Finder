<?php
include("inc/connection.inc.php");

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
    $user = "";
    $utype_db = "";
} else {
    $user = $_SESSION['user_login'];
    $result = $con->query("SELECT * FROM user WHERE id='$user'");
    $get_user_name = $result->fetch_assoc();
    $uname_db = $get_user_name['fullname'];
    $utype_db = $get_user_name['type'];
}

//time ago convert
include_once("inc/timeago.php");
$time = new timeago();


?>



<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/footer.css" rel="stylesheet" type="text/css" media="all" />

    <!-- menu tab link -->
    <link rel="stylesheet" type="text/css" href="css/homemenu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <style>
        .heading {
            text-align: center;
            
            font-size: 3rem;
            margin-top: 2rem;
            font-family: Verdana, Geneva, sans-serif;
        
        }

        .para{
            padding-left: 3rem;
            padding-right: 3rem;
            margin-top: 2rem;
            line-height: 30px;
            color: white;
        }

        /* body {
            background: linear-gradient(rgba(54, 48, 48, 0.9), rgba(54, 48, 48, 0.7)), url('https://images.unsplash.com/photo-1577985051167-0d49eec21977?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGxpYnJhcnl8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            min-width: 100vw;
        } */
    </style>

</head>

<body class="body1">
    <div>
        <div>
            <header class="header">

                <div class="header-cont">

                    <?php
                    include 'inc/banner.inc.php';
                    ?>

                </div>
            </header>

        </div>
        <div class="topnav">
            <div class="parent2">
         <div class="test1 bimage1"><a href="#"><img src="https://i.pinimg.com/originals/c1/17/25/c117254de6fbc71a924865a5ddee1faf.png" title="IT Solution" style="border-radius: 50%;" width="42" height="42"></a></div>
                <div class="test2"><a href="#"><img src="image/fb-logo.png" title="Event Management" width="42" height="42" style="border-radius: 50%;"></a></div>
                <div class="test3"><a href="#"><img src="https://cdn.icon-icons.com/icons2/2351/PNG/512/logo_github_icon_143196.png" title="Photography" width="42" height="42" style="border-radius: 50%;"></a></div>
                <div class="test4"><a href="#"><img src="image/twitter-logo.png" title="Tution" style="border-radius: 50%;" width="42" height="42"></a></div>
                <div class="mask2"><i class="fa fa-home fa-3x"></i></div>
        </div>
            <a class="navlink" href="index.php" style="margin: 0px 0px 0px 100px;">Student Posts</a>
            <a class="navlink" href="search.php">Search Tutor</a>
            <?php 
            if($utype_db == "teacher")
                {

                }else {
                    echo '<a class="navlink" href="postform.php">Post</a>';
                }

             ?>
            <a class="active navlink" href="aboutus.php">About</a>
        <div style="float: right;" >
                <table>
                    <tr>
                        <?php
                            if($user != ""){
                                $resultnoti = $con->query("SELECT * FROM applied_post WHERE post_by='$user' AND student_ck='no'");
                                $resultnoti_cnt = $resultnoti->num_rows;
                                if($resultnoti_cnt == 0){
                                    $resultnoti_cnt = "";
                                }else{
                                    $resultnoti_cnt = '('.$resultnoti_cnt.')';
                                }
                                echo '<td>
                            <a class="navlink" href="notification.php">Notification'.$resultnoti_cnt.'</a>
                        </td>
                                <td>
                            <a class="navlink" href="profile.php?uid='.$user.'">'.$uname_db.'</a>
                        </td>
                        <td>
                            <a class="navlink" href="logout.php">Logout</a>
                        </td>';
                            }else{
                                echo '<td>
                            <a class="navlink" href="login.php">Login</a>
                        </td>
                        <td>
                            <a class="navlink" href="registration.php">Register</a>
                        </td>';
                            }
                        ?>
                        
                    </tr>
                </table>
            </div>
        </div>
    </div>


        <h1 class="heading"> ABOUT US </h1>
        <p class="para">The system of private tuition has been in existence in India for a long time but in recent times it has 
        grown in manifold affecting the core of the educational system. This online student tutor system will help to find 
        tuition teachers from nearby locations. Teachers can also get a student just by logging onto the website and 
        setting up the profile. <br>In the online tutor finder system, there are two entities namely, Student and 
        Tutor. Student can login, manage profile by update their details. In homepage, one can also check for the 
        registered students. 
        After selecting, a notification will be sent to that particular tutor saying that the student has selected him as
         the tutor. The tutor can login by using credentials . They can check for the request
         and accept the request. They can also check the booking done. They need to set their profile. This online student tutor
          system can help the tutors to get students and vice versa.
        </p>
    </div>





    <!-- main jquery script -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- homemenu tab script -->
    <script src="js/homemenu.js"></script>

    <!-- topnavfixed script -->
    <script src="js/topnavfixed.js"></script>

</body>

</html>