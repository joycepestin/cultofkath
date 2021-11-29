<?php 
    include "server.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body style="background-color:#ECF0F1;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin</title>
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

            <?php if(isset($awards_list)){ ?> 
                <div class="form-floating d-flex flex-column mb-2">
                    <table class="table table-info">
                    <thead>
                        <tr>
                            <th scope="col">Awards</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($awards_list as $award){ ?>
                            <tr>
                                <td><?php echo $award['description'];?></td>
                                <input type="text" hidden name="id" value="<?php echo $award['id']; ?>">
                                <td><button name="delete_award_button" type="submit" class="btn btn-danger">Delete</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            <?php } ?>

            <div class="mb-3 form-floating d-flex flex-row">
                    <textarea class="form-control" placeholder="Awards" id="awards" name="awards"></textarea>
                    <label for="awards">Awards</label>           
                    <button name="award-button" type="submit" class="m-2 btn btn-primary">Add</button>
            </div>

            <?php if(isset($achievements_list)){ ?>
                <div class="form-floating d-flex flex-column mb-2">
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th scope="col">Achivements</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php foreach($achievements_list as $ach){ ?>
                            <tr>
                                <td><?php echo $ach['description'];?></td>
                                <input type="text" hidden name="ach_id" value="<?php echo $ach['id'];?>">
                                <td><button name="delete_achievement_button" type="submit" class="btn btn-danger">Delete</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            <?php } ?>

            <div class="mb-3 form-floating  form-floating d-flex flex-row">
                <textarea class="form-control" placeholder="Achievements" id="achievements" name="achievements"></textarea>
                <label for="achievements">Achievements</label>
                <button name="achievement-button" type="submit" class="m-2 btn btn-primary">Add</button>
            </div>

            <?php if(isset($legislative_works_list)){ ?>
                <div class="form-floating d-flex flex-column mb-2">
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th scope="col">Legislative Works</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php foreach($legislative_works_list as $lw){ ?>
                            <tr>
                                <td><?php echo $lw['description'];?></td>
                                <input type="text" hidden name="lw_id" value="<?php echo $lw['id'];?>">
                                <td><button name="delete_legislative_button" type="submit" class="btn btn-danger">Delete</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            <?php } ?>

            <div class="mb-3 form-floating  form-floating d-flex flex-row">
                <textarea class="form-control" placeholder="Legislative Works" id="legislative_works" name="legislative_works"></textarea>
                <label for="legislative_works">Legislative Works</label>
                <button name="legislative-button" class="m-2 btn btn-primary">Add</button>
            </div>

            <?php if(isset($educational_attainment_list)){ ?>
                <div class="form-floating d-flex flex-column mb-2">
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th scope="col">Educational Attainment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php foreach($educational_attainment_list as $ea){ ?>
                            <tr>
                                <td><?php echo $ea['description'];?></td>
                                <input type="text" hidden name="ea_id" value="<?php echo $ea['id'];?>">
                                <td><button name="delete_education_button" type="submit" class="btn btn-danger">Delete</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            <?php } ?>

            <div class="mb-3 form-floating form-floating d-flex flex-row">
                <textarea class="form-control" placeholder="Educational " id="educational_attainment" name="educational_attainment"></textarea>
                <label for="exampleCheck1">Educational Attainment</label>
                <button name="education-button" class="m-2 btn btn-primary">Add</button>
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
                <h5 class="card-title"><?php echo $q['candidate_name'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $q['description'];?></h6>
                <div class="d-flex justify-content-center">
                    <a href="candidate.php?id=<?php echo $q['id']; ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $q['id']; ?>" class="btn btn-primary mx-2">Edit</a>
                    <form method="POST">
                        <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                        <button name="delete" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    Click here to <a href = "logout.php">Logout</a>

</body>
</html>