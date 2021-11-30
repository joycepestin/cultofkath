<?php 
    require_once('..\classes\Candidate.php');
    require_once('..\classes\Achievement.php');
    require_once('..\classes\Award.php');
    require_once('..\db.php');
    $candidate = new Candidate;
    $award = new Award;
    $achievement = new Achievement;
    
    if(isset($_REQUEST["delete"])){
        $id = $_REQUEST["id"];
        $candidate_name = $_REQUEST["candidate_name"];
        $candidate->deleteCandidate($conn, $id);
        $award->deleteAward($conn, $candidate_name);
        $candidate->deleteCandidate($conn, $candidate_name);
        header("location: candidate_form.php?info=deleted");
    }
    
    $result = $candidate->getAllCandidates($conn);

    if(isset($_REQUEST["submit"])){
        if(isset($_REQUEST["candidate_name"]) && isset($_REQUEST["description"])){
            $candidate_name = $_REQUEST["candidate_name"];
            $description = $_REQUEST["description"];
            $candidate->createCandidate($conn, $candidate_name, $description);
            header("location: achievement_form.php?candidate_name=$candidate_name");
        }
    }

    if(isset($_REQUEST["candidate_name"])){
        $name = $_REQUEST["candidate_name"];
        $obj = $candidate->getCandidateByName($conn,$name);
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
        <form method="POST">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="candidate_name" name="candidate_name" placeholder="Juan Dela Cruz" value="<?php echo isset($_REQUEST['candidate_name']) ? $_REQUEST['candidate_name'] : '' ?>">
                <label for="candidate_name">Name of Candidate</label>
            </div>
            <div class="mb-3 form-floating">               
                <textarea class="form-control" placeholder="Description" id="description" name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                <label for="description">Description</label>
            </div>
            <div class="d-flex justify-content-center">
                <button name="submit" type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>

    <div class="d-flex flex-row container my-5 flex-wrap align-items-center justify-content-center">
        <?php foreach($result as $q){?>
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $q['candidate_name'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $q['description'];?></h6>
                <div class="d-flex justify-content-center">
                    <a href="../candidate.php?id=<?php echo $q['id']; ?>&candidate_name=<?php echo $q['candidate_name']; ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $q['id']; ?>" class="btn btn-primary mx-2">Edit</a>
                    <form method="POST">
                        <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                        <input type="text" hidden name="candidate_name" value="<?php echo $q['candidate_name']; ?>">
                        <button name="delete" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>