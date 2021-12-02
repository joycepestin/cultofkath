<?php 
    require_once('..\classes\LegislativeWork.php');
    require_once('..\classes\Candidate.php');
    require_once('..\db.php');
    $legislative = new LegislativeWork;
    $candidate = new Candidate;
    $candidate_name = $_REQUEST["candidate_name"];
    $id = $_REQUEST["candidate_id"];

    if(isset($_REQUEST["add_legislative"])){
        if(isset($_REQUEST["candidate_id"]) && isset($_REQUEST["description"])){
            $description = $_REQUEST["description"];
            $legislative->createLegislativeWork($conn, $id, $description);
        }
    }

    if(isset($_REQUEST["update"])){
        $item_id = $_REQUEST["id"];
        $description = $_REQUEST["description"];
        $legislative->updateLegislativeWork($conn, $item_id, $description);
    }   
    
    if(isset($_REQUEST["delete"])){
        $item_id = $_REQUEST["id"];
        $legislative->deleteLegislativeWork($conn, $item_id);
    }      

    $legislative_result = $legislative->getAllLegislativeWorks($conn, $id);

    if(isset($_REQUEST["submit"])){
        if(isset($_REQUEST["candidate_name"]) && isset($_REQUEST["description"])){
            header("location: educational_form.php?candidate_id=$id&candidate_name=$candidate_name");
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
            header("location: candidate_form.php");
            $candidate->deleteCandidate($conn,$id);
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
    <title>Title</title>
</head>
<body>
    <div class="container my-5" style="max-width:60%, min-width:50%">
        <form method="POST">
                <div class="mb-3 form-floating d-flex flex-row">
                        <textarea class="form-control" placeholder="Legislative Work" id="description" name="description"></textarea>
                        <label for="description">Legislative Work</label>           
                        <button name="add_legislative" type="submit" class="m-2 btn btn-primary">Add</button>
                </div>
            <?php if(isset($legislative_result)){ ?> 
                    <div class="form-floating d-flex flex-column mb-2">
                        <table class="table table-info">
                        <thead>
                            <tr>
                                <th scope="col">Legislative Works</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($legislative_result as $index=>$legislative){ ?>
                                <tr>
                                    <form method="POST">
                                            <td><input type="text" class="form-control" id="description" name="description" value="<?php echo $legislative['description'];?>"><td>
                                            <input type="text" hidden name="index" value="<?php echo $index; ?>">
                                            <input type="text" hidden name="id" value="<?php echo $legislative['id']; ?>">
                                            <td><button name="update" type="submit" class="btn btn-success">Update</button></td>
                                        </form>
                                    <form method="POST">
                                        <input type="text" hidden name="index" value="<?php echo $index; ?>">
                                        <input type="text" hidden name="id" value="<?php echo $legislative['id']; ?>">
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
                    <button name="submit" class="btn btn-primary">Next</button>
                </div>
        </form>            

    </div>
</body>
</html>