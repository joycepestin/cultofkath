<?php
    include_once "Candidate.php";
    include_once "Achievement.php";
    include_once "Award.php";
    include_once "LegislativeWork.php";
    include_once "EducationalAttainment.php";
    include_once "Comment.php";
    include_once "db.php";

    if(isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];
    }
    if(isset($_REQUEST["candidate_name"])){
        $candidate_name = $_REQUEST["candidate_name"];
    }
    
    $candidates = new Candidate;
    $result = $candidates->getCandidate($conn, $id);

    $achievements = new Achievement;
    $achievement_result = $achievements->getAllAchievements($conn, $id);

    $awards = new Award;
    $award_result = $awards->getAllAwards($conn, $id);

    $legislativeWork = new LegislativeWork;
    $legislative_result = $legislativeWork->getAllLegislativeWorks($conn, $id);

    $educational = new EducationalAttainment;
    $educational_result = $educational->getAllEducationalAttainments($conn, $id);

    $comment = new Comment;

    if(isset($_REQUEST["add"])){
        if(isset($_REQUEST["id"]) && isset($_REQUEST["comment"]) && isset($_REQUEST["username"]) && $_REQUEST['comment'] != ""){
            $content = $_REQUEST["comment"];
            $username = $_REQUEST["username"];
            $comment->createComment($conn, $username, $id, $content);
            header("location: candidate.php?id=$id&candidate_name=$candidate_name&username=$username");
        }
    }   

    if(isset($_REQUEST["enter"])){
            $username = $_REQUEST["username"];
            header("location: candidate.php?id=$id&candidate_name=$candidate_name&username=$username");
    }   


    if(isset($_REQUEST["delete"])){
        $item_id = $_REQUEST["item_id"];
        $comment->deleteComment($conn, $item_id);
    }   

    $comment_result = $comment->getAllComments($conn, $id);

?>
<?php require('components/head1.inc.php'); ?>
<body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Presidential Candidates</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Achievements</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Authored Bills Passed</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Legislative Works</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <?php foreach($result as $q){?>
                <div class="row gx-4 gx-lg-5 align-items-center my-5">
                    <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="uploads/<?php echo $q['image_url'];?>" /></div>
                    <div class="col-lg-5">
                        <h1 class="font-weight-light"><?php echo $q['full_name'];?></h1>
                        <p><?php echo $q['description'];?></p>
                    </div>
                </div>
            <?php } ?>
                <!-- Call to Action-->
                <div class="card text-white bg-dark my-5 py-4 text-center">
                    <div class="card-body"><p class="text-white m-0"> “We will defeat the old and rotten type of politics. We will hand back to ordinary Filipinos the power to make change.”</p></div>
                </div>
                <!-- Content Row-->


                <div class="row gx-4 gx-lg-5">


                <div class="col-md-6 mb-5">
                        <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h2 class="card-title text-center">Educational Attainment</h2>
                                    <?php foreach($educational_result as $educational){?>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <p><?php echo $educational['description'];?></p>
                                        </div>
                                    <?php } ?>
                            </div>
                            <!-- <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div> -->
                        </div>
                    </div>



                    <div class="col-md-6 mb-5">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h2 class="card-title text-center">Awards</h2>
                                    <?php foreach($award_result as $award){?>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <p><?php echo $award['description'];?></p>
                                        </div>
                                    <?php } 
                                    ?>
                            </div>
                            <!-- <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div> -->
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-5">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h2 class="card-title text-center">Achievements</h2>
                                    <?php foreach($achievement_result as $achievement){?>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <p><?php echo $achievement['description'];?></p>
                                        </div>
                                    <?php } ?>
                            </div>
                            <!-- <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div> -->
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-5">
                        <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h2 class="card-title text-center">Authored Bills Passed</h2>
                                    <?php foreach($legislative_result as $legislative){?>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <p><?php echo $legislative['description'];?></p>
                                        </div>
                                    <?php } ?>
                            </div>
                            <!-- <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div> -->
                        </div>
                    </div>
                </div>
                <form method="POST">
                            <div class="mb-3 form-floating d-flex flex-row">
                                <textarea class="form-control" placeholder="Username" id="username" name="username"><?php echo isset($_REQUEST['username']) ? $_REQUEST['username'] : '' ?></textarea>
                                <label for="username">Username</label>
                                <button name="enter" type="submit" class="m-2 btn btn-primary">Enter</button>
                            </div>
                        <?php if(isset($_REQUEST['username'])){ ?>
                        <div class="mb-3 form-floating d-flex flex-row">
                            <textarea class="form-control" placeholder="Comment" id="comment" name="comment"></textarea>
                            <label for="comment">Comment</label>           
                            <button name="add" type="submit" class="m-2 btn btn-primary">Add</button>
                        </div>
                        <?php } ?>
                        
                        <?php if(isset($comment_result)){ ?> 
                                <div class="form-floating d-flex flex-column mb-2">
                                        <?php foreach($comment_result as $index=>$comment){ ?>
                                            <div class="d-flex flex-column border p-2">
                                                <h6><?php echo $comment['username'];?></h6>
                                                <p class="mx-4"><?php echo $comment['comment'];?></p>
                                            </div>
                                            <div>
                                            <?php if(isset($_REQUEST['username']) && $_REQUEST['username'] == $comment['username']){ ?>
                                                <form method="POST">
                                                        <input type="text" hidden name="index" value="<?php echo $index; ?>">
                                                        <input type="text" hidden name="item_id" value="<?php echo $comment['id']; ?>">
                                                        <button name="delete" type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            <?php } ?>
                                        <?php } ?>
                                </div>
                            <?php } ?>
      
                </form>

        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Cult of Kath 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>