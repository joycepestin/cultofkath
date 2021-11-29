<?php require('components/head.inc.php'); ?>
<?php 
    include "server.php";
?>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#page-top">Presidential Candidates</a></li>
                <li class="sidebar-nav-item"><a href="#page-top">Home</a></li>
                <li class="sidebar-nav-item"><a href="#about">List of Presidential Candidates</a></li>
                <li class="sidebar-nav-item"><a href="#services">Guide</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">Portfolio</a></li>
                <li class="sidebar-nav-item"><a href="#contact">Contact</a></li>
            </ul>   
        </nav>
       
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Presidential Candidates</h1>
                <h3 class="mb-5"><em>For 2022 National Elections</em></h3>
            </div>
        </header>
        
        <!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="row-list-of-candidates">
                        <h2>List of Presidential Candidates</h2>
                        <div class='row'>
                            <div class="col-sm-4">Maria Leonor Gerona Robredo</div>
                            <div class="col-sm-4">Ernesto Abella</div>
                            <div class="col-sm-4">Leodigario "Ka Leody" Quitain de Guzman </div>
                        </div>
                        <div class='row'>
                            <div class="col-sm-4">Norberto Gonzales</div>
                            <div class="col-sm-4">Panfilo "Ping" Morena Lacson Sr.</div>
                            <div class="col-sm-4">Francisco Moreno Domagoso</div>
                        </div>
                        <div class='row'>
                            <div class="col-sm-4">Emmanuel Dapidran Pacquiao Sr.</div>
                            <div class="col-sm-4">Ferdinand "Bongbong" Romualdez Marcos Jr.</div>
                            <div class="col-sm-4">Christopher Lawrence "Bong" Tesoro Go </div>
                        </div>
                        <a class="btn btn-dark btn-xl" href="#portfolio">Learn more</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Guide</h3>
                    <h2 class="mb-5">How to Vote for 2022</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Identify yourself</strong></h4>
                        <p class="text-faded mb-0">Look for your name on the voters’ list posted by your polling precinct.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>Get your ballot</strong></h4>
                        <p class="text-faded mb-0">Approach the board of elections inspectors (BEI) chairperson to get your ballot, 
                            ballot secrecy folder, and marking pen.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>Choose candidates</strong></h4>
                        <p class="text-faded mb-0">
                        Take note, you cannot vote for more 
                        candidates than what it listed beside each position as this can invalidate your vote. 
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-envelope"></i></span>
                        <h4><strong>Cast your ballot</strong></h4>
                        <p class="text-faded mb-0">After filling out your ballot, keep it inside the ballot secrecy folder. 
                            Bring this to the VCM and insert it into the machine.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h2 class="mb-5">Presidential Candidates</h2>
                </div>
                <div class="row gx-0">

                <?php foreach($query as $q){?>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="candidate.php?id=<?php echo $q['id']; ?>">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3"><?php echo $q['candidate_name'];?></div>
                                    <p class="mb-0"><?php echo $q['description'];?></p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/leni3.jpg" alt="..." />
                        </a>
                    </div>
                <?php } ?>
                    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
