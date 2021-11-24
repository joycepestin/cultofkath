<?php 

    $conn = mysqli_connect("localhost","root","","itelec");

    if(!$conn){
        echo "<h3>Error</h3>";
    }

    $sql = "SELECT * FROM candidates";
    $query = mysqli_query($conn, $sql);

    # add item
    if(isset($_REQUEST["submit"])){
        $name = $_REQUEST["name"];
        $awards = $_REQUEST["awards"];
        $achievements = $_REQUEST["achievements"];
        $description = $_REQUEST["description"];
        $educational_attainment = $_REQUEST["educational_attainment"];
        $legislative_works = $_REQUEST["legislative_works"];
        if($name && $awards && $achievements && $educational_attainment && $legislative_works){
            $sql = "INSERT INTO candidates(name, achievements, description, educational_attainment, awards, legislative_works) VALUES('$name', '$achievements', '$educational_attainment', '$awards', '$legislative_works')";
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
    }

    #update item
    if(isset($_REQUEST["update"])){
        $id = $_REQUEST["id"];
        $name = $_REQUEST["name"];
        $awards = $_REQUEST["awards"];
        $achievements = $_REQUEST["achievements"];
        $description = $_REQUEST["description"];
        $educational_attainment = $_REQUEST["educational_attainment"];
        $legislative_works = $_REQUEST["legislative_works"];

        if($name && $awards && $achievements && $description && $educational_attainment && $legislative_works){
            $sql = "UPDATE candidates SET name = '$name', awards = '$awards', description = '$description', achievements = '$achievements', educational_attainment = '$educational_attainment', legislative_works = '$legislative_works' WHERE id = $id";
            mysqli_query($conn, $sql);

            header("Location: index.php?info=updated");
            exit();
        }
    }

    # delete item
    if(isset($_REQUEST["delete"])){
        $id = $_REQUEST["id"];
        $sql = "DELETE FROM candidates WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        header("Location: index.php?info=deleted");
        exit();
    }
?>