<?php 
    include "server.php";
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


    <?php if(isset($_REQUEST["info"])){?>
        <?php if($_REQUEST["info"] == "added"){?>
            <div class="alert alert-success" role="alert">
                <h4 class="text-center">Post added successfully!</h4>
            </div>
        <?php } else if($_REQUEST["info"] == "updated"){?>
            <div class="alert alert-success" role="alert">
                <h4 class="text-center">Post updated successfully!</h4>
            </div>
        <?php } else if($_REQUEST["info"] == "deleted"){?>
            <div class="alert alert-success" role="alert">
                <h4 class="text-center">Post deleted successfully!</h4>
            </div>
        <?php } ?>
    <?php } ?>

    <div class="container my-5" style="max-width:60%, min-width:50%">
        <form method="POST">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="name" name="name" placeholder="Juan Dela Cruz">
                <label for="name">Name of Candidate</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Awards" id="awards" name="awards"></textarea>
                <label for="awards">Awards</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Description" id="description" name="description"></textarea>
                <label for="description">Description</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Achievements" id="achievements" name="achievements"></textarea>
                <label for="achievements">Achievements</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Legislative Works" id="legislative_works" name="legislative_works"></textarea>
                <label for="legislative_works">Legislative Works</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Educational " id="educational_attainment" name="educational_attainment"></textarea>
                <label for="exampleCheck1">Educational Attainment</label>
            </div>
            <div class="d-flex justify-content-center">
                <button name="submit" type="submit" class="btn btn-primary">Submit Details</button>
            </div>
        </form>
    </div>

    <div class="d-flex flex-row container my-5 flex-wrap align-items-center justify-content-center">
        <?php foreach($query as $q){?>
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $q['name'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $q['awards'];?></h6>
                <p class="card-text"><?php echo $q['achievements'];?></p>
                <div class="d-flex justify-content-center">
                    <a href="candidate.php?id=<?php echo $q['id']; ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $q['id']; ?>" class="btn btn-primary  mx-2">Edit</a>
                    <form method="POST">
                        <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                        <button name="delete" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>