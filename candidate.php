<?php 
    //require_once('components/header.inc.php'); 
    include "server.php";
?>
<?php require('components/head1.inc.php'); ?>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="view.php">Presidential Candidates</a>
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
            <?php foreach($query as $q){?>
                <div class="row gx-4 gx-lg-5 align-items-center my-5">
                    <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="./assets/img/leni.jpg" alt="..." /></div>
                    <div class="col-lg-5">
                        <h1 class="font-weight-light"><?php echo $q['candidate_name'];?></h1>
                        <p><?php echo $q['description'];?></p>
                    </div>
                </div>
            <?php } ?>
                <!-- Call to Action-->
                <div class="card text-white bg-secondary my-5 py-4 text-center">
                    <div class="card-body"><p class="text-white m-0"> ???We will defeat the old and rotten type of politics. We will hand back to ordinary Filipinos the power to make change.???</p></div>
                </div>
                <!-- Content Row-->
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h2 class="card-title text-center">Awards</h2>
                                    <?php foreach($query2 as $achievement){?>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <p><?php echo $achievement['description'];?></p>
                                        </div>
                                    <?php } 
                                    ?>
                            </div>
                            <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h2 class="card-title text-center">Achievements</h2>
                                    <?php foreach($query3 as $achievement){?>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <p><?php echo $achievement['description'];?></p>
                                        </div>
                                    <?php } ?>
                            </div>
                            <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <h2 class="card-title text-center">Authored Bills Passed</h2>
                                    <?php foreach($query3 as $achievement){?>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <p><?php echo $achievement['description'];?></p>
                                        </div>
                                    <?php } ?>
                            </div>
                            <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                        </div>
                    </div>
                </div>

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
</html>
