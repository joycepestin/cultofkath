<?php require('components/header.inc.php'); ?>
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
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="./assets/img/bbm2.jpg" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Ferdinand "Bongbong" Romualdez Marcos Jr</h1>
                    <p>Ferdinand "Bongbong" Romualdez Marcos Jr. is a Filipino politician who served as a senator from 2010 to 2016. He is the second child and only son of the president and dictator Ferdinand Marcos Sr. and former First Lady Imelda Romualdez Marcos.</p>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-black m-0"> “I am a public servant at heart. If I am called to duty in any way whatsoever then it is an honor for me to serve.”</p></div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">About</h2>
                            <p class="card-text">Having been in public service for over 25 years, Ferdinand “Bongbong” Marcos Jr. has achieved a distinguished career in government. 
                                His electoral journey has allowed him to serve in several positions in both the executive and legislative branches of government. His various stints in government have allowed him to carve his niche in the Philippine’s rich political history.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Awards and Achievements</h2>
                            <p class="card-text">Top Most Outstanding Contributor of CDF to Cooperatives 1994</p>
                            <p class="card-text">Young Achiever Awardee for Government and Public Service 1994</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Authored Bills Passed</h2>
                            <p class="card-text">SBN-1186: Postponement of the Sangguniang Kabataan Elections</p>
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
