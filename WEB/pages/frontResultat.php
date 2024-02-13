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

    
    <!-- ======= About Section ======= -->


    <section id="about" class="about"> 
        <div class="container" data-aos="fade-up" style="margin-top: 50px;margin-bottom: 20px;">
            <div class="row gx-0">
                <div class="col-lg-4 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                  <img src="../../assets/images/stat.svg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-7 d-flex flex-column " data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h2>Résultats</h2>
                        
                        <form action="#" method="get" id="affichageResultat">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="debut">Date début :</label>
                                        <input type="date" class="form-control" id="debut" name="debut">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="fin">Date fin :</label>
                                        <input type="date" class="form-control" id="fin" name="fin">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-5">
                                <button type="submit" class="btn btn-success form-control">Afficher le résultat</button>
                            </div>
                        </form>

                        <div class="hafenina" style="display: none;">
                            <div class="row mt-3">
                                <h3 class="col-md-5 ">Poids total cueillette :</h3>
                                <h3 class="col-md-3 mb-3" style="color: black;">700 kg</h3>
                            </div>

                            <div class="row">
                                <h3 class="col-md-5 " >Coût de revient /kg :</h3>
                                <h3 class="col-md-3 mb-3" style="color: black;">2000 Ar</h3>
                            </div>

                            <div class="row">
                                <h3 class="col-md-5 " >Montant des dépenses :</h3>
                                <h3 class="col-md-3 mb-3" style="color: black;">100000 Ar</h3>
                            </div>

                            
                            <div class="row">
                                <h3 class="col-md-5 " >Montant des ventes :</h3>
                                <h3 class="col-md-3 mb-3" style="color: black;">200000 Ar</h3>
                            </div>

                            <div class="row">
                                <h3 class="col-md-5 " >Montant des bénéfices :</h3>
                                <h3 class="col-md-3 " style="color: black;">100000 Ar</h3>
                            </div>
                            
                            <table class="table datatable mt-3">
                                <thead>
                                <tr>
                                    <th scope="col">N° de parcelle</th>
                                    <th scope="col">Poids restant (kg)</th>
                                    <th scope="col">Poids cueilli (kg)</th>
                                    <th scope="col">Ventes (Ar)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>20</td>
                                    <td>200</td>
                                    <td>3000</td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td>100</td>
                                    <td>400</td>
                                    <td>2000</td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td>60</td>
                                    <td>100</td>               
                                    <td>2000</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section><!-- End About Section -->




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
