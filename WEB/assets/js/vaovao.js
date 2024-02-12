// Obtenir l'élément de la boîte de dialogue
var modal = document.getElementById("formulaire");
var modal2 = document.getElementById("formulaire2");

// Obtenir l'élément pour fermer la boîte de dialogue
var span = document.getElementsByClassName("close")[0];

// Quand l'utilisateur clique sur le bouton, ouvrir la boîte de dialogue 
function clickage(){
  modal.style.display = "block";
}

// Quand l'utilisateur clique sur (x), fermer la boîte de dialogue
span.onclick = function() {
  modal.style.display = "none";
  modal2.style.display = "none";
}

// Quand l'utilisateur clique n'importe où en dehors de la boîte de dialogue, la fermer
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}

function creeXHR(){
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
  return xhr;
}

function edit(num) {
  var xhr=creeXHR();
  var data="id="+num;
  xhr.addEventListener("load", function(event) {
    var liste=JSON.parse(xhr.responseText);
    modal2.style.display = "block";
    var name=document.getElementById("varietemod");
    var occ=document.getElementById("occupationmod");
    var red=document.getElementById("rendementmod");
    var idm=document.getElementById("idmod");
    idm.value=liste["id"];
    name.value=liste["nom"];
    occ.value=liste["occupation"];
    red.value=liste["rendement_par_pied"];
  });

  xhr.open("POST","../update/ajax1.php",true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                                         
  xhr.send(data);
}

function editParcelle(num) {
  var xhr=creeXHR();
  var data="id="+num;
  xhr.addEventListener("load", function(event) {
    var liste=JSON.parse(xhr.responseText);
    modal2.style.display = "block";
    var num=document.getElementById("numParsmod");
    var sur=document.getElementById("surfacemod");
    var type=document.getElementById("typemod");
    var idm=document.getElementById("idmod");
    idm.value=liste["id"];
    num.value=liste["numero_parcelle"];
    sur.value=liste["surface_HA"];
    for (let i = 0; i < type.options.length; i++) {
      if (type.options[i].value == liste["id_variete"]) {
        type.options[i].setAttribute("selected","");
      }
    }
  });

  xhr.open("POST","../update/ajax2.php",true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                                         
  xhr.send(data);
}

function editCueilleur(num) {
  var xhr=creeXHR();
  var data="id="+num;
  xhr.addEventListener("load", function(event) {
    var liste=JSON.parse(xhr.responseText);
    modal2.style.display = "block";
    var num=document.getElementById("nommod");
    var sur=document.getElementById("dateNaissancemod");
    var type=document.getElementById("genremod");
    var idm=document.getElementById("idmod");
    idm.value=liste["id"];
    num.value=liste["nom"];
    sur.value=liste["datenaissance"];
    for (let i = 0; i < type.options.length; i++) {
      if (type.options[i].value == liste["genre"]) {
        type.options[i].setAttribute("selected","");
      }
    }
  });

  xhr.open("POST","../update/ajax3.php",true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                                         
  xhr.send(data);
}