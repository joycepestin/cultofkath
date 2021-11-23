<?php 
    include "server.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
        <?php foreach($query as $q){?>
        <div>
            <h5><?php echo $q['name'];?></h5>
            <p><?php echo $q['awards'];?></h5>
            <p><?php echo $q['achievements'];?></h5>
            <p><?php echo $q['legislative_works'];?></h5>
            <p><?php echo $q['educational_attainment'];?></h5>
            <button><a href="edit.php?id=<?php echo $q['id']; ?>">Edit</a></button>
            <form method="POST">
                <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                <button name="delete">Delete</button>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>