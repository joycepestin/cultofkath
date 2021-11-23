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
    <?php foreach($query as $q){ ?>
        <form method="POST">
            <input type="text" hidden value='<?php echo $q['id']?>' name="id">
            <input type="text" name="name" placeholder="Name of Candidate" value="<?php echo $q['name'];?>"/>
            <textarea name="awards" placeholder="Awards"><?php echo $q['awards'];?></textarea>
            <textarea name="achievements" placeholder="Achievements"><?php echo $q['achievements'];?></textarea>
            <textarea name="legislative_works" placeholder="Legislative Works"><?php echo $q['legislative_works'];?></textarea>
            <textarea name="educational_attainment" placeholder="Educational Attainment"><?php echo $q['educational_attainment'];?></textarea>
            <button name="update">Update Details</button>
        </form>
    <?php } ?>
</body>
</html>