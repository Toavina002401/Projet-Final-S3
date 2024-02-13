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
    <section class="breadcrumbs">
        <div class="container" data-aos="fade-up">
            <h2>Variation des thés</h2>
        </div>
    </section>

    <section id="variation" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
            <div class="col-12">
                <table class="table datatable">
                <thead>
                    <tr>
                    <th scope="col" >Id</th>
                    <th scope="col" >Variété</th>
                    <th scope="col"  >Occupation (m2/pied)</th>
                    <th scope="col" >Rendement par pied (kg/mois)</th>
                    <th scope="col" >Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <?php for ($i=0; $i < count($listeThe); $i++) { 
                            $num="edit(".$listeThe[$i]["id"].")";
                        ?>
                            <tr>
                                <th  scope="row"> <?php echo($listeThe[$i]["id"]); ?></th>
                                <td><?php echo($listeThe[$i]["nom"]); ?></td>
                                <td  class="text-center"><?php echo($listeThe[$i]["occupation"]); ?></td>
                                <td  class="text-center"><?php echo($listeThe[$i]["rendement_par_pied"]); ?></td>
                                <td>
                                    <button type="button" class="btn btnIcone" onclick="<?php echo($num);?>"><img src="../../assets/images/edit.png" width="30px"></button>
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
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center"  style="text-decoration: none;" onclick="clickage()">
                <span>Inserer</span>
                <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            </div>
        </div>

        <!-- Structure de la boîte de dialogue -->

        <section id="formulaire" class="modal">
            <div class="modal-content"  style="width: 30%;">
                <span class="close hidden">&times;</span>
                <div class="form-group mb-3 log d-flex align-items-center justify-content-center">
                    <img src="../../assets/images/logo.png" alt="">
                    <h2>Insertion</h2>
                </div>
                <form action="../insertion/insVarite.php" method="post">
                    <div class="form-group mb-3">
                        <label for="variete">Variété :</label>
                        <input type="text" class="form-control" id="variete" name="variete" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="occupation">Occupation (m2/pied) :</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="rendement">Rendement par pied (kg/mois) :</label>
                        <input type="text" class="form-control" id="rendement" name="rendement" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-success form-control">Insérer</button>
                    </div>
                </form>        
            </div>
        </section>

        <section id="formulaire2" class="modal">
            <div class="modal-content"  style="width: 30%;">
                <span class="close hidden">&times;</span>
                <div class="form-group mb-3 log d-flex align-items-center justify-content-center">
                    <img src="../../assets/images/logo.png" alt="">
                    <h2>Modification</h2>
                </div>
                <form action="../update/updVarite.php" method="post">
                    <input type="hidden" name="idmod" id="idmod">
                    <div class="form-group mb-3">
                        <label for="variete">Variété :</label>
                        <input type="text" class="form-control" id="varietemod" name="variete" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="occupation">Occupation (m2/pied) :</label>
                        <input type="text" class="form-control" id="occupationmod" name="occupation" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="rendement">Rendement par pied (kg/mois) :</label>
                        <input type="text" class="form-control" id="rendementmod" name="rendement" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-success form-control">Modifier</button>
                    </div>
                </form>        
            </div>
        </section>

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