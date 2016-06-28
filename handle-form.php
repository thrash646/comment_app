<?php 
function sanitize_input($data) {
    global $conn;
    $data = trim(strip_tags($data));
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}
    function treeComments() {
        global $conn;
        $tree_comments = "";
        
        $check = mysqli_query($conn, "SELECT * FROM feedback");
        $sql  = mysqli_query($conn, "SELECT name, comment FROM feedback");
        
        if (mysqli_num_rows($check)>0 || isset($_POST["send"])) {
//            echo "TREE POSTS soon...</br>";
            while($row = mysqli_fetch_assoc($sql)) {
                $tree_comments .= "<li class='decoration'><div class='container'><div class='bulb'></div>";
                foreach ($row as $k => $v) {
                    if ($k == "name"){
                        $tree_comments .= "<div class='feedback'><p><span>Name:</span> $v </p>" ;
                    }
                    else if ($k == "comment"){
                        $tree_comments .= "<p><span>Comment:</span> $v </p></div>";
                    }
                }
                $tree_comments .="</div></li>";
            }
        }
        if(isset($tree_comments)){
                echo $tree_comments;
        }
    }
    function handleComments() {
        global $conn;
        $success = false;
        $err = "";

        if(isset($_POST["send"])) {
            if (!empty($_POST["fullname"])) {
                $fn = sanitize_input($_POST["fullname"]);
            } else {
                $success = false;
                $err .= "Please enter your name. </br>";
            }

            if (trim($_POST["email"])) {
                $_POST["email"] = sanitize_input($_POST["email"]);
                    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $em = sanitize_input($_POST["email"]);
                        $sql = mysqli_query($conn, "SELECT * FROM feedback WHERE email='$em'");
                        if (mysqli_num_rows($sql)>0) {
                            $err .= "We're sorry, that EMAIL has already been submitted.";
                            $em = null;
                        } 
                    } else {
                        $em = null;
                        $err .= "Please enter a VALID email. </br>";
                        $success = false;
                    }
                
            } else {
                    $err .= "Please enter your email.</br>";  
                    $success = false;   
            } 
            if (trim($_POST["comment"])) {
                $comm = sanitize_input($_POST["comment"]);
            } else {
                $success = false;
                $err .= "Please enter your feedback. </br>";
            }
            if (!empty($fn) && !empty($em) && !empty($comm)) {
                $success = true;
                $query = "INSERT INTO feedback (name, email, comment) VALUES ('$fn', '$em', '$comm')";
                if (mysqli_query($conn, $query)) {
                    //echo "New record created successfully";
                } else {
                    //echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            } 
            if (isset($err) && !empty($err)) {
                $error = "<div class=\"err-msg\"><h4>I'm sorry, but we found the following errors:</h4><p class=\"error\">" . $err . "</p></div>";
                return $error;
            } else {
                return false;
            }
        }

    }
    function postComments(){
        global $conn;
        $page = isset($_GET['page']) ? (int)$_GET['page']: 1;
        $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 10 ? (int)$_GET['per-page']: 3;
        $db = new PDO('mysql:dbname=fenix-test;host=localhost', "root", "");
        
        //Start positioning of pagination
        
        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
        $articles= $db->prepare("
            SELECT SQL_CALC_FOUND_ROWS name, email, comment
            FROM feedback
            LIMIT {$start}, {$perPage}
        ");
        $articles-> execute();
        $articles = $articles->fetchAll(PDO::FETCH_ASSOC);
        
        // TOTAL PAGE NUMBERS
        $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
        $pages = ceil($total/$perPage);
        $check = mysqli_query($conn, "SELECT * FROM feedback");
        if (mysqli_num_rows($check)>0) {
            
            foreach ($articles as $article) {
                echo "<div class='comment-box'>";
                echo "<p class='usrName'>".$article['name'].":</p>";
                echo "<p class='usrComment'>".$article['comment']."</p>";
                echo"</div>";
            }
            echo "<ul>";
            for ($i=1; $i<=$pages; $i++) {
                echo "<li class='pgNum'><a href ='?page=$i'";
                if ($page === $i) {
                    echo "class = 'selected'";
                }
                echo ">$i</a></li>";
            }
            echo "</ul>";
        } 
        if(isset($scoop_html)){
                echo $scoop_html;
        }
         mysqli_close($conn);
    }
    

?>