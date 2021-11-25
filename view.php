<?php require('components/head.inc.php'); ?>
<?php 
    include "server.php";
?>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#page-top">Start Bootstrap</a></li>
                <li class="sidebar-nav-item"><a href="#page-top">Home</a></li>
                <li class="sidebar-nav-item"><a href="#about">List of Presidential Candidates</a></li>
                <li class="sidebar-nav-item"><a href="#services">Services</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">Portfolio</a></li>
                <li class="sidebar-nav-item"><a href="#contact">Contact</a></li>
            </ul>   
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Presidential Candidates</h1>
                <h3 class="mb-5"><em>For 2022 National Elections</em></h3>
                <a class="btn btn-primary btn-xl" href="#portfolio">Find Out More</a>
            </div>
        </header>
        <!-- About-->
        <!-- <section class="content-section bg-light" id="about">
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
        </section> -->
        <!-- Services-->
        <!-- <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Services</h3>
                    <h2 class="mb-5">How to Vote for 2022</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Responsive</strong></h4>
                        <p class="text-faded mb-0">Looks great on any screen size!</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>Redesigned</strong></h4>
                        <p class="text-faded mb-0">Freshly redesigned for Bootstrap 5.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>Favorited</strong></h4>
                        <p class="text-faded mb-0">
                            Millions of users
                            <i class="fas fa-heart"></i>
                            Start Bootstrap!
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>Question</strong></h4>
                        <p class="text-faded mb-0">I mustache you a question...</p>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Callout-->
        <!-- <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mx-auto mb-5">
                    Welcome to
                    <em>your</em>
                    next website!
                </h2>
                <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/theme/stylish-portfolio/">Download Now!</a>
            </div>
        </section> -->
        <!-- Portfolio-->
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
                                    <div class="h3"><?php echo $q['name'];?></div>
                                    <p class="mb-0"><?php echo $q['description'];?></p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/leni3.jpg" alt="..." />
                        </a>
                    </div>
                <?php } ?>
                    <!-- <div class="col-lg-6">
                        <a class="portfolio-item" href="leni.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Leni Robredo</div>
                                    <p class="mb-0">is a Filipina lawyer, politician, and social activist who is the 14th and incumbent vice president of the Philippines. </p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/leni3.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="kaleody.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Leodigario "Ka Leody" Quitain de Guzman</div>
                                    <p class="mb-0">is a Filipino unionist and labor rights activist, a socialist federation of militant trade unions. </p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/kaleody3.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="ernesto.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Ernesto “Ernie” Corpuz Abella</div>
                                    <p class="mb-0">is a Filipino businessman, writer, and former evangelist who served in President Rodrigo Duterte's administration as Presidential Spokesperson </p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/ernesto.jpeg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="noberto.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Norberto B. Gonzales</div>
                                    <p class="mb-0">Philippine government official. Founder, chairman Philipine Democratic Socialist Party, since 1973.</p>
                                </div>  
                            </div>
                            <img class="img-fluid" src="assets/img/norberto.jpg" alt="..." />
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a class="portfolio-item" href="lacson.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Panfilo "Ping" Morena Lacson Sr </div>
                                    <p class="mb-0"> is a Filipino politician and former police general serving as a Senator since 2016, and previously from 2001 to 2013.</p>
                                </div>  
                            </div>
                            <img class="img-fluid" src="assets/img/lacson.jpg" alt="..." />
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a class="portfolio-item" href="moreno.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Francisco Moreno Domagoso</div>
                                    <p class="mb-0">Filipino politician & actor currently serving as the 22nd mayor of Manila since 2019. </p>
                                </div>  
                            </div>
                            <img class="img-fluid" src="assets/img/isko2.jpg" alt="..." />
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a class="portfolio-item" href="pacquiao.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Emmanuel Dapidran Pacquiao Sr.</div>
                                    <p class="mb-0">is a Filipino politician and former professional boxer.</p>
                                </div>  
                            </div>
                            <img class="img-fluid" src="assets/img/manny3.jpg" alt="..." />
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a class="portfolio-item" href="bbm.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Ferdinand "Bongbong" Romualdez Marcos Jr.</div>
                                    <p class="mb-0">a Filipino politician who served as a senator from 2010 to 2016. He is the second child and only son of the president and dictator Ferdinand Marcos Sr. </p>
                                </div>  
                            </div>
                            <img class="img-fluid" src="assets/img/bbm.jpg" alt="..." />
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a class="portfolio-item" href="go.php">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h3">Christopher Lawrence "Bong" Tesoro Go </div>
                                    <p class="mb-0">is a Filipino politician serving as a Senator since 2019. He previously served in President Rodrigo Duterte's Cabinet as Special Assistant to the President</p>
                                </div>  
                            </div>
                            <img class="img-fluid" src="assets/img/bongo.jpg" alt="..." />
                        </a>
                    </div> -->

                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <!-- <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">The buttons below are impossible to resist...</h2>
                <a class="btn btn-xl btn-light me-4" href="#!">Click Me!</a>
                <a class="btn btn-xl btn-dark" href="#!">Look at Me!</a>
            </div>
        </section> -->
        <!-- Map-->
        <!-- <div class="map" id="contact">
            <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
            <br />  
            <small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a></small>
        </div> -->
       
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
