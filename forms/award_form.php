<?php 
    require_once('..\classes\Award.php');
    require_once('..\db.php');
    $award = new Award;
    $candidate_name = $_REQUEST["candidate_name"];

    if(isset($_REQUEST["add_award"])){
        if(isset($_REQUEST["candidate_name"]) && isset($_REQUEST["description"])){
            $description = $_REQUEST["description"];
            $award->createAward($conn, $candidate_name, $description);
        }
    }
    
    if(isset($_REQUEST["delete"])){
        $id = $_REQUEST["id"];
        $award->deleteAward($conn, $id);
    }      

    $award_result = $award->getAllAwards($conn, $candidate_name);

    if(isset($_REQUEST["submit"])){
        if(isset($_REQUEST["candidate_name"]) && isset($_REQUEST["description"])){
            header("location: candidate_form.php?info=added");
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
                                    <td><?php echo $award['description'];?></td>
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
                        <button name="submit" class="btn btn-primary">Submit Details</button>
                </div>
        </form>            

    </div>
</body>
</html>