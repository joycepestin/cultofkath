<?php 
    require_once('..\classes\Candidate.php');
    require_once('..\classes\Achievement.php');
    require_once('..\db.php');
    $candidate = new Candidate;
    $achievement = new Achievement;
    $candidate_name = $_REQUEST["candidate_name"];
    $id = $_REQUEST["candidate_id"];

    if(isset($_REQUEST["add_achievement"])){

        if(isset($_REQUEST["candidate_id"]) && isset($_REQUEST["description"])){
            $description = $_REQUEST["description"];
            $id = $_REQUEST["candidate_id"];
            $achievement->createAchievement($conn, $id, $description);
        }
    }    

    if(isset($_REQUEST["delete_achievement"])){
        $item_id = $_REQUEST["id"];
        $achievement->deleteAchievement($conn, $item_id);
    }    

    $achievement_result = $achievement->getAllAchievements($conn, $id);

    if(isset($_REQUEST["next"])){
        if(!isset($_REQUEST["editing"])){
            if(isset($_REQUEST["candidate_name"]) && isset($_REQUEST["description"])){
                header("location: award_form.php?candidate_id=$id&candidate_name=$candidate_name");
            }
        }
        else{
            header("location: award_form.php?candidate_id=$id&candidate_name=$candidate_name&editing=1");
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
                    <textarea class="form-control" placeholder="Achievement" id="description" name="description"></textarea>
                    <label for="description">Achievement</label>           
                    <button name="add_achievement" type="submit" class="m-2 btn btn-primary">Add</button>
            </div>
        <?php if(isset($achievement_result)){ ?> 
                <div class="form-floating d-flex flex-column mb-2">
                    <table class="table table-info">
                    <thead>
                        <tr>
                            <th scope="col">Achievements</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($achievement_result as $index=>$achievement){ ?>
                            <tr>
                                <td><?php echo $achievement['description'];?></td>
                                <form method="POST">
                                    <input type="text" hidden name="index" value="<?php echo $index; ?>">
                                    <input type="text" hidden name="id" value="<?php echo $achievement['id']; ?>">
                                    <td><button name="delete_achievement" type="submit" class="btn btn-danger">Delete</button></td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            <?php } ?>
      
            <div class="d-flex justify-content-center">
                    <button name="back" class="btn btn-danger mx-2">Cancel</button>
                    <button name="next" class="btn btn-primary mx-2">Next</button>
            </div>
        </form>
    </div>
</body>
</html>