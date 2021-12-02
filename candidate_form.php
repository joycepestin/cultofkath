<?php 
    require_once('Candidate.php');
    require_once('Achievement.php');
    require_once('Award.php');
    require_once('db.php');

    $candidate = new Candidate;
    $award = new Award;
    $achievement = new Achievement;
    
    if(isset($_REQUEST["delete"])){
        $id = $_REQUEST["id"];
        $candidate_name = $_REQUEST["candidate_name"];
        $candidate->deleteCandidate($conn, $id);
        header("location: candidate_form.php?info=deleted");
    }
   
    $result = $candidate->getAllCandidates($conn);

    if(isset($_REQUEST["submit"])){
        if(isset($_REQUEST["editing"]) && $_REQUEST["editing"] == "1"){
            $candidate_name = $_REQUEST["candidate_name"];
            $id = $_REQUEST["candidate_id"];
            foreach($obj as $ob){
                $id = $ob["id"];
            }
            header("location: achievement_form.php?candidate_id=$id&candidate_name=$candidate_name&editing=1");
        }
        else{
            if(isset($_REQUEST["full_name"]) && isset($_REQUEST["description"]) && $_FILES['image'] && $_REQUEST["full_name"] != "" && $_REQUEST["description"] != "" &&  $_FILES["image"]){

                $img_name = $_FILES['image']['name'];
                $img_size = $_FILES['image']['size'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];
        
                $full_name = $_REQUEST["full_name"];
                $description = $_REQUEST["description"];
                $id = $_REQUEST["candidate_id"];
        
                if ($error === 0) {
                    if ($img_size > 125000) {
                        $em = "Sorry, your file is too large.";
                    }else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
            
                        $allowed_exs = array("jpg", "jpeg", "png"); 
            
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'uploads/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
                            // echo '<div class="alb">';
                            // echo  '<img src="uploads/'.$new_img_name.'">';
                            // echo '</div>';
                        }else {
                            echo '<div class="alert alert-success" role="alert">';
                            echo '<h4 class="text-center">You cant upload files of this type!</h4>';
                            echo '</div>';
                        }
                    }
                }else {
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<h4 class="text-center">"unknown error occurred!</h4>';
                    echo '</div>';
                }

                $candidate_name = $_REQUEST["full_name"];
                $full_name = $_REQUEST["full_name"];
                $description = $_REQUEST["description"];
                $candidate->createCandidate($conn, $candidate_name, $description, $full_name, $new_img_name);
                $obj = $candidate->getCandidateByName($conn, $full_name);
                foreach($obj as $ob){
                    $id = $ob["id"];
                }
                header("location: achievement_form.php?candidate_id=$id&candidate_name=$candidate_name");
            }
        }
    }
    
    if(isset($_REQUEST["update"])){
        if(isset($_REQUEST["full_name"]) && isset($_REQUEST["description"]) && $_FILES['image']){

            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
    
            $full_name = $_REQUEST["full_name"];
            $description = $_REQUEST["description"];
            $id = $_REQUEST["candidate_id"];
    
            if ($error === 0) {
                if ($img_size > 125000) {
                    $em = "Sorry, your file is too large.";
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png"); 
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        // echo '<div class="alb">';
                        // echo  '<img src="uploads/'.$new_img_name.'">';
                        // echo '</div>';
                    }else {
                        echo '<div class="alert alert-success" role="alert">';
                        echo '<h4 class="text-center">You cant upload files of this type!</h4>';
                        echo '</div>';
                    }
                }
            }else {
                echo '<div class="alert alert-success" role="alert">';
                echo '<h4 class="text-center">"unknown error occurred!</h4>';
                echo '</div>';
            }

            $id = $_REQUEST["candidate_id"];
            $full_name = $_REQUEST["full_name"];
            $candidate_name = $_REQUEST["candidate_name"];
            $description = $_REQUEST["description"];
            $candidate->updateCandidate($conn, $id, $full_name, $description,$new_img_name);
            header("location: candidate_form.php?candidate_id=$id&candidate_name=$candidate_name&full_name=$full_name&description=$description&editing=1");
        }
    }

    if(isset($_REQUEST["edit"])){
        $item_id = $_REQUEST["candidate_id"];
        $obj = $candidate->getCandidate($conn, $item_id);
        foreach($obj as $ob){
            $id = $ob["id"];
            $full_name = $ob["full_name"];
            $candidate_name = $ob["candidate_name"];
            $description = $ob["description"];
            $image_url = $ob["image_url"];
        }
        header("location: candidate_form.php?candidate_id=$id&candidate_name=$candidate_name&full_name=$full_name&description=$description&image_url=$image_url&editing=1");
    }

    //Upload image

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Candidate Form</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Presidential Candidates</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>

            <form method="POST" action="../logout.php">
                    <button name="edit" class="btn btn-danger">Logout</button>
            </form>
</nav>


    <?php if(isset($_REQUEST["info"])){ ?>
            <?php if($_REQUEST["info"] == "added"){ ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="text-center">Post added successfully!</h4>
                </div>
            <?php } else if($_REQUEST["info"] == "updated"){ ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="text-center">Post updated successfully!</h4>
                </div>
            <?php } else if($_REQUEST["info"] == "deleted"){ ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="text-center">Post deleted successfully!</h4>
                </div>
            <?php } ?>
    <?php } ?>
    <div class="container my-5" style="max-width:60%, min-width:50%">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Juan Dela Cruz" value="<?php echo isset($_REQUEST['full_name']) ? $_REQUEST['full_name'] : '' ?>">
                <label for="full_name">Name of Candidate</label>
            </div>
            <div class="mb-3 form-floating">               
                <textarea class="form-control" placeholder="Description" id="description" name="description"><?php echo isset($_REQUEST['description']) ? $_REQUEST['description'] : '' ?></textarea>
                <label for="description">Description</label>
            </div>

            <div>
                <input type="file" name="image">
            </div>

            <div class="d-flex justify-content-center">
                <?php if(isset($_REQUEST["candidate_id"])) {?>
                    <a href="candidate_form.php" class="btn btn-danger">Clear</a>
                    <button name="update" type="submit" class="btn btn-success">Update</button>
                <?php } ?>
                <button name="submit" type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>

    <?php if(!isset($_REQUEST["candidate_id"])) { ?>
    <div class="d-flex flex-row container my-5 flex-wrap align-items-center justify-content-center">
    <?php if($result){?>
        <?php foreach($result as $q){?>
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $q['full_name'];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $q['description'];?></h6>
                    <div class="d-flex justify-content-center">
                        <a href="candidate.php?id=<?php echo $q['id']; ?>&candidate_name=<?php echo $q['candidate_name']; ?>" class="btn btn-primary">View</a>                
                        <form method="POST">
                            <input type="text" hidden name="candidate_id" value="<?php echo $q['id']; ?>">
                            <button name="edit" class="btn btn-danger">Edit</button>
                        </form>
                        <form method="POST">
                            <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                            <input type="text" hidden name="candidate_name" value="<?php echo $q['candidate_name']; ?>">
                            <button name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php } ?>
    </div>
    <?php } ?>

</body>
</html>