<?php 
    include "server.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>


    <?php if(isset($_REQUEST["info"])){?>
        <?php if($_REQUEST["info"] == "added"){?>
            <p>Post has been added</p>;
        <?php } else if($_REQUEST["info"] == "updated"){?>
            <p>Post has been updated</p>;
        <?php } else if($_REQUEST["info"] == "deleted"){?>
            <p>Post has been deleted</p>;
        <?php } ?>
    <?php } ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Name of Candidate"/>
        <textarea name="awards" placeholder="Awards"></textarea>
        <textarea name="achievements" placeholder="Achievements"></textarea>
        <textarea name="legislative_works" placeholder="Legislative Works"></textarea>
        <textarea name="educational_attainment" placeholder="Educational Attainment"></textarea>
        <button name="submit">Submit Details</button>
    </form>
    <div>
        <?php foreach($query as $q){?>
        <div>
            <h5><?php echo $q['name'];?></h5>
            <button><a href="view.php?id=<?php echo $q['id']; ?>">View</a></button>
        </div>
        <?php } ?>
    </div>
</body>
</html>