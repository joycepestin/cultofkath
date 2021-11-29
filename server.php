<?php 

    
// Username: vh3NHBbC7P

// Database name: vh3NHBbC7P

// Password: URYoR09zxD

// Server: remotemysql.com

// Port: 3306

// These are the username and password to log in to your database and phpMyAdmin

$conn = mysqli_connect("remotemysql.com","vh3NHBbC7P","URYoR09zxD","vh3NHBbC7P");
// $conn = mysqli_connect("localhost","root","","itelec");

$awards_list;
$achievements_list;
$legislative_works_list;
$educational_attainment_list;

if (isset($_POST['login'])){
    $Username = $_POST['username'];
    $Pass = $_POST['password'];
    
    $select = mysqli_query($conn," SELECT * FROM users WHERE username = '$Username' AND password = '$Pass' ");
    $row  = mysqli_fetch_array($select);

    if(is_array($row)) {
        $_SESSION["username"] = $row['username'];
        $_SESSION["password"] = $row['password'];
    }   else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");';
        echo 'window.location.href = "login.php" ';
        echo '</script>';
    }

    }
    if(isset($_SESSION["username"])){
        header("Location:index.php");
    }


    $sql = "SELECT * FROM candidates";
    $query = mysqli_query($conn, $sql);

    # add item
    if(isset($_REQUEST["submit"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $description = $_REQUEST["description"];
        if($candidate_name && $description){
            $sql = "INSERT INTO candidates(candidate_name, description) VALUES('$candidate_name','$description')";
            mysqli_query($conn, $sql);
            header("Location: index.php?info=added");
            exit();
        }
    }

    # get indiv item
    if(isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];
        $sql = "SELECT * FROM candidates WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $candidate_name = "";
        foreach($query as $q){
            $candidate_name = $q["candidate_name"];
        }

        $sql = "SELECT * FROM awards WHERE candidate_name = '$candidate_name'";
        $query2 = mysqli_query($conn, $sql);
        $awards_list = mysqli_query($conn, $sql);

        $sql = "SELECT * FROM achievements WHERE candidate_name = '$candidate_name'";
        $query3 = mysqli_query($conn, $sql);
        $achievements_list = mysqli_query($conn, $sql);

        $sql = "SELECT * FROM legislative_works WHERE candidate_name = '$candidate_name'";
        $query4 = mysqli_query($conn, $sql);
        $legislative_works_list = mysqli_query($conn, $sql);

        $sql = "SELECT * FROM educational_attainment WHERE candidate_name = '$candidate_name'";
        $query4 = mysqli_query($conn, $sql);
        $educational_attainment_list = mysqli_query($conn, $sql);
    }

    // if(isset($_REQUEST["edit"]) ){

    //     if(isset($_REQUEST["index"])){
    //         $index = $_REQUEST["index"];
    //         $ach_id = $_REQUEST["ach_id"][$index];
    //         $ach_description = $_REQUEST["ach_description"];
    //         $sql = "UPDATE achievements SET description = '$ach_description' WHERE id = $ach_id";
    //         mysqli_query($conn, $sql);
    //     }

    //     if(isset($_REQUEST["award_id"]) || isset( $_REQUEST["award_description"])){
    //         $award_id = $_REQUEST["award_id"];
    //         $award_description = $_REQUEST["award_description"];
    //         $sql = "UPDATE awards SET description = '$award_description' WHERE id = $award_id";
    //         mysqli_query($conn, $sql);
    //     }

    //     $id = $_REQUEST['id'];
    //     $candidate_name = $_REQUEST['candidate_name'];

    //     $sql = "SELECT * FROM awards WHERE candidate_name = '$candidate_name'";
    //     $query2 = mysqli_query($conn, $sql);
    //     $awards_list = mysqli_query($conn, $sql);

    //     $sql = "SELECT * FROM achievements WHERE candidate_name = '$candidate_name'";
    //     $query3 = mysqli_query($conn, $sql);
    //     $achievements_list = mysqli_query($conn, $sql);

    //     $sql = "SELECT * FROM legislative_works WHERE candidate_name = '$candidate_name'";
    //     $query4 = mysqli_query($conn, $sql);
    //     $legislative_works_list = mysqli_query($conn, $sql);

    //     $sql = "SELECT * FROM educational_attainment WHERE candidate_name = '$candidate_name'";
    //     $query4 = mysqli_query($conn, $sql);
    //     $educational_attainment_list = mysqli_query($conn, $sql);

    //     if($candidate_name && $awards && $achievements && $description && $educational_attainment && $legislative_works){
    //         $sql = "UPDATE candidates SET candidate_name = '$candidate_name', awards = '$awards', description = '$description', achievements = '$achievements', educational_attainment = '$educational_attainment', legislative_works = '$legislative_works' WHERE id = $id";
    //         mysqli_query($conn, $sql);
    //         header("Location: index.php?info=updated");
    //         exit();
    //     }


    //     header("Location: edit.php?id=$id");
    // }

    #update item
    if(isset($_REQUEST["update"])){
        $id = $_REQUEST["id"];
        $candidate_name = $_REQUEST["candidate_name"];
        $awards = $_REQUEST["awards"];
        $achievements = $_REQUEST["achievements"];
        $description = $_REQUEST["description"];
        $educational_attainment = $_REQUEST["educational_attainment"];
        $legislative_works = $_REQUEST["legislative_works"];

        if($candidate_name && $awards && $achievements && $description && $educational_attainment && $legislative_works){
            $sql = "UPDATE candidates SET candidate_name = '$candidate_name', awards = '$awards', description = '$description', achievements = '$achievements', educational_attainment = '$educational_attainment', legislative_works = '$legislative_works' WHERE id = $id";
            mysqli_query($conn, $sql);
            header("Location: index.php?info=updated");
            exit();
        }
    }

    # delete item
    if(isset($_REQUEST["delete"])){
        $id = $_REQUEST["id"];
        $candidate_name = $_REQUEST["candidate_name"];
        $sql = "DELETE FROM candidates WHERE id = $id";
        $awards = "DELETE FROM awards WHERE candidate_name = '$candidate_name'";
        $achievements = "DELETE FROM achievements WHERE candidate_name = '$candidate_name'";
        $educational_attainment = "DELETE FROM educational_attainment WHERE candidate_name = '$candidate_name'";
        $legislative_works = "DELETE FROM legislative_works WHERE candidate_name = '$candidate_name'";
        mysqli_query($conn, $awards);
        mysqli_query($conn, $achievements);
        mysqli_query($conn, $educational_attainment);
        mysqli_query($conn, $legislative_works);
        $query = mysqli_query($conn, $sql);

        header("Location: index.php?info=deleted");
        exit();
    }


###### AWARDS TABLE 
    # add awards
    if(isset($_REQUEST["award-button"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $description = $_REQUEST["awards"];
        // if($candidate_name && $description){
            $sql = "INSERT INTO awards(candidate_name, description) VALUES('$candidate_name','$description')";
            $awards_list = mysqli_query($conn, $sql);
        // }
    }

    # delete awards
    if(isset($_REQUEST["delete_award_button"])){
        $id = $_REQUEST["id"];
        $sql = "DELETE FROM awards WHERE id = $id";
        $awards_list = mysqli_query($conn, $sql);
    }

    #get all awards
    if(isset($_REQUEST["delete_award_button"]) || isset($_REQUEST["award-button"]) || isset($_REQUEST["candidate_name"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $sql = "SELECT * FROM awards WHERE candidate_name = '$candidate_name'";
        $awards_list = mysqli_query($conn, $sql);
    }

###### ACHIEVEMENTS TABLE 
    # add awards
    if(isset($_REQUEST["achievement-button"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $description = $_REQUEST["achievements"];
        // if($candidate_name && $description){
            $sql = "INSERT INTO achievements(candidate_name, description) VALUES('$candidate_name','$description')";
            $achievements_list = mysqli_query($conn, $sql);
        // }
    }

    # delete awards
    if(isset($_REQUEST["delete_achievement_button"])){
        $id = $_REQUEST["ach_id"];
        $sql = "DELETE FROM achievements WHERE id = $id";
        $achievements_list = mysqli_query($conn, $sql);
    }

    #get all awards
    if(isset($_REQUEST["delete_achievement_button"]) || isset($_REQUEST["achievement-button"]) || isset($_REQUEST["candidate_name"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $sql = "SELECT * FROM achievements WHERE candidate_name = '$candidate_name'";
        $achievements_list = mysqli_query($conn, $sql);
    }

###### LEGISLATIVE WORKS TABLE 
    # add
    if(isset($_REQUEST["legislative-button"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $description = $_REQUEST["legislative_works"];
        // if($candidate_name && $description){
            $sql = "INSERT INTO legislative_works(candidate_name, description) VALUES('$candidate_name','$description')";
            $legislative_works_list = mysqli_query($conn, $sql);
        // }
    }

    # delete
    if(isset($_REQUEST["delete_legislative_button"])){
        $id = $_REQUEST["lw_id"];
        $sql = "DELETE FROM legislative_works WHERE id = $id";
        $legislative_works_list = mysqli_query($conn, $sql);
    }

    #get all
    if(isset($_REQUEST["delete_legislative_button"]) || isset($_REQUEST["legislative-button"]) || isset($_REQUEST["candidate_name"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $sql = "SELECT * FROM legislative_works WHERE candidate_name = '$candidate_name'";
        $legislative_works_list = mysqli_query($conn, $sql);
    }

###### EDUCATIONAL ATTAINMENT TABLE 
    # add 
    if(isset($_REQUEST["education-button"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $description = $_REQUEST["educational_attainment"];
        // if($candidate_name && $description){
            $sql = "INSERT INTO educational_attainment(candidate_name, description) VALUES('$candidate_name','$description')";
            $educational_attainment_list = mysqli_query($conn, $sql);
        // }
    }

    # delete 
    if(isset($_REQUEST["delete_education_button"])){
        $id = $_REQUEST["ea_id"];
        $sql = "DELETE FROM educational_attainment WHERE id = $id";
        $educational_attainment_list = mysqli_query($conn, $sql);
    }

    #get all 
    if(isset($_REQUEST["delete_education_button"]) || isset($_REQUEST["education-button"]) || isset($_REQUEST["candidate_name"])){
        $candidate_name = $_REQUEST["candidate_name"];
        $sql = "SELECT * FROM educational_attainment WHERE candidate_name = '$candidate_name'";
        $educational_attainment_list = mysqli_query($conn, $sql);
    }    
?>
