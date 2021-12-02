<?php
    include "./classes/Candidate.php";
    include "db.php";
    
    $candidates = new Candidate;
    $result = $candidates->getAllCandidates($conn);
?>
<?php require('components/head.inc.php'); ?>

<body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#page-top">Presidential Candidates</a></li>
                <li class="sidebar-nav-item"><a href="#page-top">Home</a></li>
                <li class="sidebar-nav-item"><a href="#about">About</a></li>
                <li class="sidebar-nav-item"><a href="#services">Guide</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">List of Candidates</a></li>
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
                        <h2>About the Website</h2>
                        <p>
                        Filipinos have a wide range of candidates from whom to choose. They have
a variety of ideologies, from mundane as their campaign colors and hand
signs to as complex as their stand on good governance and pandemic
response. But all of them have expressed their desire to unite the country
and elevate the Philippines to a higher place than it is presently by their
words and actions. <br> <br>

This website will be a nonpartisan content management system that aims
to disseminate factual information about the presidential candidates that
will help Filipinos to choose whom they shall vote for. The difference
between success and failure begins with choosing the right leaders who
shall lead the country to progress. The website will also provide its viewers
a platform to engage and voice out their insights and opinions about the
presidential candidates.
                        </p>
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
                <?php if($result){?>
                    <?php foreach($result as $q){?>
                        <div class="col-lg-6">
                            <a class="portfolio-item" href="candidate.php?id=<?php echo $q['id']; ?>&candidate_name=<?php echo $q['candidate_name']; ?>">
                                <div class="caption">
                                    <div class="caption-content">
                                        <div class="h3"><?php echo $q['full_name'];?></div>
                                        <p class="mb-0"><?php echo $q['description'];?></p>
                                    </div>
                                </div>
                                <img class="img-fluid" src="forms/uploads/<?php echo $q['image_url'];?>" alt="..." />
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
                    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
