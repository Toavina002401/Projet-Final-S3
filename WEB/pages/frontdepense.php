    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center" style="text-decoration: none;">
            <img src="../../assets/images/logo.png" alt="">
            <span>Théicole</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto " href="../../pages/Templates/template.php?page=accueil.php">Accueil</a></li>
            <li><a href="../../pages/Templates/template.php?page=frontCueilletes.php" style="text-decoration: none;">Saisie des cueillettes</a></li>
            <li><a class="nav-link scrollto" href="../../pages/Templates/template.php?page=frontdepense.php">Saisie des dépenses</a></li>
            <li><a class="nav-link scrollto" href="../../pages/Templates/template.php?page=paiementFront.php">Paiements</a></li>
            <li><a class="nav-link scrollto" href="../../pages/Templates/template.php?page=frontResultat.php">Résultats</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="../../inc/deconnexion.php" style="text-decoration: none;">Deconnexion</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <br>

    <main id="main">

    <!-- ======= Saisie des dépenses Section ======= -->
    <?php
        $listedep=listCategoriesDepense();
    ?>
    <section id="depense" class="about">
        <div class="container" data-aos="fade-up" style="margin-top: 150px;margin-bottom: 20px;">
            <div class="row gx-0">
              <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <form action="../insertion/frontInsDepense.php" method="post" onsubmit="return maFonctionAlerte()">
                        <div class="form-group mb-3 log d-flex align-items-center">
                            <h2>Saisie des dépenses</h2>
                        </div>
                        <div class="form-group mb-3">
                            <label for="date">Date :</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="variete">Catégorie :</label>
                                <select class="form-control" id="variete" name="variete" required>
                                    <?php for ($i=0; $i < count($listedep); $i++) { ?>
                                        <option value="<?php echo($listedep[$i]["id"]); ?>"><?php echo($listedep[$i]["nom"]); ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="poids">Montant :</label>
                            <input type="number" class="form-control" id="poids" name="poids" required>
                        </div>
                        <div class="form-group mb-3  ">
                            <button type="submit" class="btn btn-success form-control">Insérer</button>
                        </div>
                  </form>  
                </div>
              </div>
              <div class="col-lg-1"></div>
              <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="../../assets/images/xou.jpg" class="img-fluid" alt="">
              </div>
            </div>
        </div>
    </section><!-- End Saisie des dépenses Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>Contacts</p>
                </header>

                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Addresse</h3>
                                <p>Madagascar,<br>Antananarivo 102, ITU Andoharanofotsy</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Contact</h3>
                                    <p>+261 38 40 708 49<br>+261 34 42 075 00<br>+261 34 99 354 38</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>antemazazart@gmail.com<br>toavinawukeys@gmail.com<br>malalaninah6@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Heures d'ouverture</h3>
                                    <p>Lundi - Vendredi<br>8h00 - 17h00</p>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
