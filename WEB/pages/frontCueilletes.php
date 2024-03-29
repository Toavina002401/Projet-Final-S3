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

    <!-- ======= Saisie des cueillettes Section ======= -->
    <?php
        $listeCu=listCueilleursByNom();
        $listeParcelle=listParcelleByNumero();
    ?>

    <section id="about" class="about"> 
        <div class="container" data-aos="fade-up" style="margin-top: 130px;margin-bottom: 20px;">
            <div class="row gx-0">
                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                  <img src="../../assets/images/cueillette.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                <form id="tpajax">
                    <div class="form-group mb-3 log d-flex align-items-center">
                        <h2>Saisie des cueillettes</h2>
                    </div>
                    <div class="form-group mb-3">
                      <label for="date">Date :</label>
                      <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="variete">Cueilleur :</label>
                        <select class="form-control" id="variete" name="variete" required>
                            <?php for ($i=0; $i < count($listeCu); $i++) {  ?>
                                <option value="<?php echo($listeCu[$i]["id"]); ?>"><?php echo($listeCu[$i]["nom"]); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="num">Numero de parcelle :</label>
                        <select class="form-control" id="num" name="num" required>
                            <?php for ($i=0; $i < count($listeParcelle); $i++) {  ?>
                                <option value="<?php echo($listeParcelle[$i]["id"]); ?>"><?php echo($listeParcelle[$i]["numero_parcelle"]); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="poids">Poids cueilli :</label>
                        <input type="number" class="form-control" id="poids" name="poids" required>
                    </div>
                    <div class="form-group mb-3  ">
                      <button type="submit" class="btn btn-success form-control">Insérer</button>
                    </div>
                  </form>  
            </div>
          </div>
        </div>
      </div>
    <script>
        var formTp=document.getElementById("tpajax");
        formTp.addEventListener('submit',(e)=>{
            e.preventDefault();
            var formData = new FormData(formTp);
            var xhr; 
            try {  
                xhr = new ActiveXObject('Msxml2.XMLHTTP');   
            }
            catch (e) {
                try {   
                    xhr = new ActiveXObject('Microsoft.XMLHTTP'); 
                }
                catch (e2) {
                    try {  
                        xhr = new XMLHttpRequest();  
                    }
                    catch (e3) {
                        xhr = false;   
                    }
                }
            }

            xhr.onreadystatechange  = function() 
            { 
                if(xhr.readyState  == 4){
                    if(xhr.status  == 200) {
                        if (xhr.responseText=="true") {
                            alert("Insertion cueillettes reussi avec succes");
                            var formData2 = new FormData(formTp);
                            var xhr2; 
                            try {  
                                xhr2 = new ActiveXObject('Msxml2.XMLHTTP');   
                            }
                            catch (e) {
                                try {   
                                    xhr2 = new ActiveXObject('Microsoft.XMLHTTP'); 
                                }
                                catch (e2) {
                                    try {  
                                        xhr2 = new XMLHttpRequest();  
                                    }
                                    catch (e3) {
                                        xhr2 = false;   
                                    }
                                }
                            }
                            
                            //XMLHttpRequest.open(method, url, async)
                            xhr2.open("POST", "../insertion/insPayment.php",  true); 
                            
                            //XMLHttpRequest.send(body)
                            xhr2.send(formData);
                        }
                        else{
                            alert("Erreur sur la saisie du poids");
                        }
                        
                    } else {
                        document.dyn="Error code " + xhr.status;
                    }
                }
            };

            //XMLHttpRequest.open(method, url, async)
            xhr.open("POST", "../insertion/insCueillettes.php",  true); 
            
            //XMLHttpRequest.send(body)
            xhr.send(formData);
        });
    </script>

    </section><!-- End Saisie des cueillettes Section -->

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
