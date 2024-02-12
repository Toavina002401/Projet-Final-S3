// Obtenir l'élément de la boîte de dialogue
var modal = document.getElementById("formulaire");

// Obtenir l'élément pour fermer la boîte de dialogue
var span = document.getElementsByClassName("close")[0];

// Quand l'utilisateur clique sur le bouton, ouvrir la boîte de dialogue 
window.onload = function() {
  modal.style.display = "block";
}

// Quand l'utilisateur clique sur (x), fermer la boîte de dialogue
span.onclick = function() {
  modal.style.display = "none";
}

// Quand l'utilisateur clique n'importe où en dehors de la boîte de dialogue, la fermer
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}