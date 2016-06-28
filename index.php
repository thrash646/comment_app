<?php 
    include("db-connect.php");
    include("handle-form.php");
    $errors = handleComments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fenix Feedback Test</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container-box">
        <h1>Deck the halls to win a Bugatti!</h1>
        <div class="bg-tree">

            <div class="box">
                <ul>
                   <?php 
                        treeComments();
                    ?>
    <!--
                    <li class="decoration">
                        <div class="container">
                           <div class="bulb">
                                <img src="" alt="" class="ball">
                                <p class="userFeedback">

                                </p>
                            </div>
                        </div>
                    </li>
    -->
                </ul>
            </div>
        </div>
        <!-- Feedback Form Area -->
        <div class="fb-form clearfix">
            <h2>Submit your feedback for your chance to WIN</h2>
            <form class="formBox" id="usrform" action="" method="post">
               <div class="input-small">
                    <input type="text" name ="fullname" id="fullname"  placeholder="Full Name (Required)">
                    <input type="text" id="email" name="email"  placeholder="Email: 'name@mail.com' -will not be published (Required)">
                </div>
                <textarea id="comment" name="comment" form="usrform" placeholder="Please enter your comments"></textarea>
                <input type="submit" id="send" name="send" value="Send">
            </form>
        </div>
        <div class="response">
        <?php 
            if (isset($errors) && !empty($errors) && $errors != false ) {
                echo $errors;
            }
        ?>
        </div>
        <div class="comment-thread">
           <h2>User Feedback:</h2>
            <?php 
                postComments();
            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="js/comments.js"></script>
</body>
</html>

