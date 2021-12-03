<?php 
    require_once('../classes/EducationalAttainment.php');
    require_once('../classes/Candidate.php');
    require_once('../db.php');
    $educational = new EducationalAttainment;
    $candidate = new Candidate;
    $candidate_name = $_REQUEST["candidate_name"];
    $id = $_REQUEST["candidate_id"];

    if(isset($_REQUEST["add_legislative"])){
        if(isset($_REQUEST["candidate_id"]) && isset($_REQUEST["description"]) &&  $_REQUEST["description"] != ""){
            $description = $_REQUEST["description"];
            $educational->createEducationalAttainment($conn, $id, $description);
        }
    }

    if(isset($_REQUEST["update"])){
        $item_id = $_REQUEST["id"];
        $description = $_REQUEST["new_description"];
        $educational->updateEducationalAttainment($conn, $item_id, $description);
        header("location: educational_form.php?candidate_id=$id&candidate_name=$candidate_name&editing=1&info=updated");
    }   
    
    if(isset($_REQUEST["delete"])){
        $item_id = $_REQUEST["id"];
        $educational->deleteEducationalAttainment($conn, $item_id);
        header("location: educational_form.php?candidate_id=$id&candidate_name=$candidate_name&editing=1&info=deleted");

    }      

    $educational_result = $educational->getAllEducationalAttainments($conn, $id);

    if(isset($_REQUEST["submit"])){
        if(isset($_REQUEST["candidate_name"]) && isset($_REQUEST["description"])){
            header("location: candidate_form.php?info=added");
        }
    }

    if(isset($_REQUEST["back"])){
        if(isset($_REQUEST["editing"])){
            $edit = $_REQUEST["editing"];
            if($edit == "1"){
                header("location: candidate_form.php");
            }
        }
        else{
           $candidate->deleteCandidate($conn,$id);
            header("location: candidate_form.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Educational Form</title>
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
            <?php if($_REQUEST["info"] == "updated"){ ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="text-center">Educational attainment updated successfully!</h4>
                </div>
            <?php } else if($_REQUEST["info"] == "deleted"){ ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="text-center">Educational attainment deleted successfully!</h4>
                </div>
            <?php } ?>
    <?php } ?>

    <div class="container my-5" style="max-width:60%, min-width:50%">
        <form method="POST">
                <div class="mb-3 form-floating d-flex flex-row">
                        <textarea class="form-control" placeholder="Educational Attainment" id="description" name="description"></textarea>
                        <label for="description">Educational Attainment</label>           
                        <button name="add_legislative" type="submit" class="m-2 btn btn-primary">Add</button>
                </div>
            <?php if(isset($educational_result)){ ?> 
                    <div class="form-floating d-flex flex-column mb-2">
                        <table class="table table-info">
                        <thead>
                            <tr>
                                <th scope="col">Educational Attainment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($educational_result as $index=>$educational){ ?>
                                <tr>
                                    <form method="POST">
                                        <td><input type="text" class="form-control" id="description" name="new_description" value="<?php echo $educational['description'];?>"><td>
                                        <input type="text" hidden name="index" value="<?php echo $index; ?>">
                                        <input type="text" hidden name="id" value="<?php echo $educational['id']; ?>">
                                        <td><button name="update" type="submit" class="btn btn-success">Update</button></td>
                                    </form>
                                    <form method="POST">
                                        <input type="text" hidden name="index" value="<?php echo $index; ?>">
                                        <input type="text" hidden name="id" value="<?php echo $educational['id']; ?>">
                                        <td><button name="delete" type="submit" class="btn btn-danger">Delete</button></td>
                                    </form>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                    </div>
                <?php } ?>    
                <div class="d-flex justify-content-center">
                    <button name="back" class="btn btn-danger mx-2">Cancel</button>
                    <button name="submit" class="btn btn-primary">Submit Details</button>
                </div>
        </form>            

    </div>
</body>
</html>