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

        <div class="container my-5" style="max-width:60%, min-width:50%">
            <form method="POST">
                <?php foreach($query as $q){ ?>
                    <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Juan Dela Cruz" value="<?php
                            if(isset($_REQUEST['candidate_name'])){
                                echo $_REQUEST['candidate_name'];
                            }
                            else{
                                echo $q['candidate_name'];
                            }
                        ?>">
                        <label for="name">Name of Candidate</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control" placeholder="Description" id="description" name="description"><?php 
                            if(isset($_REQUEST['description'])){
                                echo $_REQUEST['description'];
                            }
                            else{
                                echo $q['description'];
                            }
                        ;?></textarea>
                        <label for="awards">Description</label>
                    </div>
                    <!-- <div class="mb-3 form-floating">
                        <textarea class="form-control" placeholder="Awards" id="awards" name="awards"><?php echo $q['awards'];?></textarea>
                        <label for="awards">Awards</label>
                    </div> -->
                <?php } ?>

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
                                    <input type="text" hidden id=<?php echo $award['id']; ?> name="award_id" value="<?php echo $award['id']; ?>">
                                    <td><input type="text" name="award_description" value="<?php echo $award['description']; ?>"><td>
                                    <td><button name="edit" type="submit" class="btn btn-danger">Edit</button><td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                    </div>
                <?php } ?>

                <?php if(isset($achievements_list)){ ?> 
                    <div class="form-floating d-flex flex-column mb-2">
                        <table class="table table-info">
                        <thead>
                            <tr>
                                <th scope="col">Achievements</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($achievements_list as $index=>$award){ ?>
                                <tr>
                                    <?php echo $award['id']; ?>
                                    <input type="text" hidden name="index" value="<?php echo $index ?>">
                                    <input type="text" name="ach_id[]" value="<?php echo $award['id']; ?>">
                                    <td><input type="text" name="ach_description" value="<?php echo $award['description']; ?>"><td>
                                    <td><button name="edit" type="submit" class="btn btn-danger">Edit</button><td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                    </div>
                    <?php } else{ ?> 
                        <div>
                            im the under the water
                    </div>
                <?php } ?>
                

                <div class="mb-3 form-floating">
                    <textarea class="form-control" placeholder="Legislative Works" id="legislative_works" name="legislative_works"><?php echo $q['legislative_works'];?></textarea>
                    <label for="legislative_works">Legislative Works</label>
                </div>
                <div class="mb-3 form-floating">
                    <textarea class="form-control" placeholder="Educational " id="educational_attainment" name="educational_attainment"><?php echo $q['educational_attainment'];?></textarea>
                    <label for="exampleCheck1">Educational Attainment</label>
                </div>
                <div class="d-flex justify-content-center">
                    <button name="update" type="submit" class="btn btn-primary">Update Details</button>
                </div>
            </form>
    </div>
</body>
</html>