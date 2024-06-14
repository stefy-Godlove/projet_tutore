const color_cicle_palet = document.querySelectorAll(".elt-filt .fa-square");

color_cicle_palet.forEach(color =>{
    color.addEventListener("click", (e) =>{
        e.preventDefault();
        const i = e.target;
        const couleur = i.style.color;
        console.log(couleur);
        filtrerParCouleur(couleur);
    })
})
// Fonction pour effectuer une requête AJAX
function effectuerRequeteAjax(url, methode, donnees, callback) {
    var xhr = new XMLHttpRequest();
    // Définition de la fonction de rappel pour gérer la réponse de la requête AJAX
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          callback(xhr.responseText);
        } else {
          console.error('Une erreur s\'est produite : ' + xhr.status);
        }
      }
    };
    xhr.open(methode, url, true);
    if (methode === 'POST') {
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    xhr.send(donnees);
  }
  
  // Recuperation des donnee lier a la Maison
  function filtrerParCouleur(color) {
        effectuerRequeteAjax('../php/filter_by_color.php?color=' + color, 'GET', null, function (response) {
          // Traitement des données reçues
          var donnees = JSON.parse(response);
          updateAfterResearch(donnees);
        });
  }

  document.addEventListener("DOMContentLoaded", function() {
    const loadingDiv = document.querySelector(".screen-loader");
    
    loadingDiv.style.display = "flex";
  });
  window.addEventListener("load", function() {
    const loadingDiv = document.querySelector(".screen-loader");
    loadingDiv.style.display = "none";
  });
  
function updateAfterResearch(donnees){
    const section = document.querySelector(".contain-show-product");
    while (section.firstChild) {
        section.removeChild(section.firstChild);
    }
    // console.log(donnees[0][0]);
    for (let index = 0; index < donnees.length; index++) {
        const element = donnees[index];
        const card = document.createElement("div");
        const img = document.createElement("img");
        const cardTitle = document.createElement("div");
        const libelle = document.createElement("p");
        const prix = document.createElement("span");
        card.classList.add("card");
        cardTitle.classList.add("card-title");
        img.src = "../" + element[3];
        libelle.innerText = element[0];
        prix.innerText = element[1];
        cardTitle.appendChild(img);
        cardTitle.appendChild(libelle);
        cardTitle.appendChild(prix);
        card.appendChild(cardTitle);
        section.appendChild(card);
    }

    // const card
}
