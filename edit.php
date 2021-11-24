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

    <?php foreach($query as $q){ ?>
        <div class="container my-5" style="max-width:60%, min-width:50%">
            <form method="POST">
                <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Juan Dela Cruz" value="<?php echo $q['name'];?>">
                    <label for="name">Name of Candidate</label>
                </div>
                <div class="mb-3 form-floating">
                    <textarea class="form-control" placeholder="Awards" id="awards" name="awards"><?php echo $q['awards'];?></textarea>
                    <label for="awards">Awards</label>
                </div>
                <div class="mb-3 form-floating">
                    <textarea class="form-control" placeholder="Description" id="description" name="description"><?php echo $q['description'];?></textarea>
                    <label for="awards">Description</label>
                </div>
                <div class="mb-3 form-floating">
                    <textarea class="form-control" placeholder="Achievements" id="achievements" name="achievements"><?php echo $q['achievements'];?></textarea>
                    <label for="achievements">Achievements</label>
                </div>
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
        <?php } ?>
    </div>
</body>
</html>