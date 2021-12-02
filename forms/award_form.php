<?php 
    require_once('..\classes\Award.php');
    require_once('..\classes\Achievement.php');
    require_once('..\classes\Candidate.php');
    require_once('..\db.php');
    $award = new Award;
    $candidate = new Candidate;
    $candidate_name = $_REQUEST["candidate_name"];
    $id = $_REQUEST["candidate_id"];

    if(isset($_REQUEST["add_award"])){
        if(isset($_REQUEST["candidate_id"]) && isset($_REQUEST["description"]) &&  $_REQUEST["description"] != ""){
            $description = $_REQUEST["description"];
            $award->createAward($conn, $id, $description);
        }
    }

    if(isset($_REQUEST["update"])){
        $item_id = $_REQUEST["id"];
        $description = $_REQUEST["new_description"];
        $award->updateAward($conn, $item_id, $description);
    }   
    
    if(isset($_REQUEST["delete"])){
        $item_id = $_REQUEST["id"];
        $award->deleteAward($conn, $item_id);
    }      

    $award_result = $award->getAllAwards($conn, $id);

    if(isset($_REQUEST["submit"])){
        if(isset($_REQUEST["candidate_name"]) && isset($_REQUEST["description"])){
            header("location: legislative_form.php?candidate_id=$id&candidate_name=$candidate_name");
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
    <title>Award Form</title>
</head>
<body>
    <div class="container my-5" style="max-width:60%, min-width:50%">
        <form method="POST">
                <div class="mb-3 form-floating d-flex flex-row">
                        <textarea class="form-control" placeholder="Award" id="description" name="description"></textarea>
                        <label for="description">Award</label>           
                        <button name="add_award" type="submit" class="m-2 btn btn-primary">Add</button>
                </div>
            <?php if(isset($award_result)){ ?> 
                    <div class="form-floating d-flex flex-column mb-2">
                        <table class="table table-info">
                        <thead>
                            <tr>
                                <th scope="col">Awards</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($award_result as $index=>$award){ ?>
                                <tr>
                                <form method="POST">
                                    <td><input type="text" class="form-control" id="description" name="new_description" value="<?php echo $award['description'];?>"><td>
                                    <input type="text" hidden name="index" value="<?php echo $index; ?>">
                                    <input type="text" hidden name="id" value="<?php echo $award['id']; ?>">
                                    <td><button name="update" type="submit" class="btn btn-success">Update</button></td>
                                </form>
                                    <form method="POST">
                                        <input type="text" hidden name="index" value="<?php echo $index; ?>">
                                        <input type="text" hidden name="id" value="<?php echo $award['id']; ?>">
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