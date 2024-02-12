    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center" style="text-decoration: none;">
            <img src="../../assets/images/logo.png" alt="">
            <span>Théicole</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto " href="#hero">Accueil</a></li>
            <li><a style="text-decoration: none;" href="../../pages/Templates/template.php?page=accueilAdmin.php">Variation des thés</a></li>
            <li><a class="nav-link scrollto" href="../../pages/Templates/template.php?page=parcelleAdmin.php">Nos parcelles</a></li>
            <li><a class="nav-link scrollto" href="../../pages/Templates/template.php?page=cueilleurAdmin.php">Cueilleurs</a></li>
            <li><a style="text-decoration: none;" href="../../pages/Templates/template.php?page=depenseAdmin.php">Dépenses</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="../../inc/deconnexion.php" style="text-decoration: none;">Deconnexion</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <br>

    <main id="main">

    <!-- ======= Variation des thés Section ======= -->
    <?php
        $listeThe=getAllThea();
    ?>
    <section id="variation" class="about">
        <header class="section-header" data-aos="fade-up">
            <p>Variation des thés</p>
        </header>
        <div class="container" data-aos="fade-up">
            <div class="row">
            <div class="col-12">
                <table class="table datatable">
                <thead>
                    <tr>
                    <th scope="col" style="color: #CE5768;">Id</th>
                    <th scope="col"  style="color: #CE5768;">Variété</th>
                    <th scope="col"  style="color: #CE5768;">Occupation (m2/pied)</th>
                    <th scope="col"  style="color: #CE5768;">Rendement par pied (kg/mois)</th>
                    <th scope="col"  style="color: #CE5768;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <?php for ($i=0; $i < count($listeThe); $i++) { ?>
                            <tr>
                                <th  scope="row"> <?php echo($listeThe[$i]["id"]); ?></th>
                                <td><?php echo($listeThe[$i]["nom"]); ?></td>
                                <td  class="text-center"><?php echo($listeThe[$i]["occupation"]); ?></td>
                                <td  class="text-center"><?php echo($listeThe[$i]["rendement_par_pied"]); ?></td>
                                <td>
                                    <a href="#" style="text-decoration: none;">
                                        <button type="button" class="btn btnIcone"><img src="../../assets/images/edit.png" width="30px"></button>
                                    </a>
                                    <a href="../../pages/delete/delVariete.php?id=<?php echo($listeThe[$i]["id"]); ?>">
                                        <button type="button" class="btn btnIcone"><img src="../../assets/images/delete.png" width="30px"></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center"  style="text-decoration: none;">
                <span>Inserer</span>
                <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            </div>
        </div>

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