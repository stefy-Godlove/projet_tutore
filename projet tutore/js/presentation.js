
const color_cicle_palet = document.querySelectorAll(".elt-filt .fa-square");

color_cicle_palet.forEach(color => {
  color.addEventListener("click", (e) => {
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

function filtrerParCouleur(color) {
  effectuerRequeteAjax('../php/filter_by_color.php?color=' + color, 'GET', null, function (response) {
    // Traitement des données reçues
    var donnees = JSON.parse(response);
    clearSection();
    updateAfterResearch(donnees);
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const loadingDiv = document.querySelector(".screen-loader");
  loadingDiv.style.display = "flex";
});
window.addEventListener("load", function () {
  const loadingDiv = document.querySelector(".screen-loader");
  loadingDiv.style.display = "none";
});
function clearSection(){
  const section = document.querySelector(".contain-show-product");
  while (section.firstChild) {
    section.removeChild(section.firstChild);
  }
}
function updateAfterResearch(donnees) {
  const section = document.querySelector(".contain-show-product");
  // console.log(donnees[0][0]);
  for (let index = 0; index < donnees.length; index++) {
    const element = donnees[index];
    const card = document.createElement("div");
    const img = document.createElement("img");
    const cardTitle = document.createElement("div");
    const libelle = document.createElement("p");
    const prix = document.createElement("span");
    const information = document.createElement("information");
    const description = document.createElement("div");
    description.classList.add("description");
    card.classList.add("card");
    cardTitle.classList.add("card-title");
    information.classList.add("information");
    img.src = "../" + element[3];
    libelle.innerText = element[0];
    prix.innerText = element[1] + " xaf";

    const text = element[2]; // Supposons que $row[4] contient la chaîne de caractères à tronquer
    const maxLength = 50; // Longueur maximale souhaitée
    const suffix = '...'; // Suffixe à ajouter

    const truncatedText = truncateText(text, maxLength, suffix);

    description.innerText = truncatedText;

    cardTitle.appendChild(img);
    information.appendChild(libelle);
    information.appendChild(description);
    information.appendChild(prix);
    card.appendChild(cardTitle);
    card.appendChild(information);
    section.appendChild(card);
  }
}

const listCategorieId = document.querySelectorAll(".from-categorie-filter input[type='radio']");
listCategorieId.forEach(categorieId => {
  categorieId.addEventListener("change", (e) => {
    e.preventDefault();
    filtrerParCategorie(e.target.id);
  })
})
function filtrerParCategorie(categorieId) {
  effectuerRequeteAjax('../php/filter_by_categorie.php?categorieId=' + categorieId, 'GET', null, function (response) {
    // Traitement des données reçues
    var donnees = JSON.parse(response);
    clearSection();
    updateAfterResearch(donnees);
  });
}
function truncateText(text, maxLength, suffix) {
  if (text.length > maxLength) {
    return text.substring(0, maxLength - suffix.length) + suffix;
  } else {
    return text;
  }
}

const voirPlusLiens = document.querySelectorAll('.voir-plus a');

voirPlusLiens.forEach(voirPlusLien => {
  voirPlusLien.addEventListener('click', function(event) {
    event.preventDefault(); // Empêcher le comportement par défaut du lien
    const categoriesCachees = event.target.parentElement.parentElement.querySelector('.categories-cachees');
    if (categoriesCachees.style.display !== 'block') {
      categoriesCachees.style.display = 'block'; // Afficher le conteneur
      voirPlusLien.textContent = 'Voir moins'; // Modifier le texte du lien
      voirPlusLien.parentElement.querySelector(".voirplus-mark").classList.add("fa-chevron-up");
      voirPlusLien.parentElement.querySelector(".voirplus-mark").classList.remove("fa-chevron-down");
    } else {
      categoriesCachees.style.display = 'none'; // Masquer le conteneur
      voirPlusLien.textContent = 'Voir plus'; // Modifier le texte du lien
      voirPlusLien.parentElement.querySelector(".voirplus-mark").classList.remove("fa-chevron-up");
      voirPlusLien.parentElement.querySelector(".voirplus-mark").classList.add("fa-chevron-down");
    }
  });
});

const listmarques = document.querySelectorAll(".from-categorie-filter input[type='checkbox']");
listmarques.forEach(marque => {
  marque.addEventListener("change", (e) => {
    e.preventDefault();
    clearSection();
    let count = 0;
    for (let index = 0; index < listmarques.length; index++) {
      const marque = listmarques[index];
      if(marque.checked){
        count ++;
        filtrerParMarque(marque.id)
      }
    }
    if(count == 0){
      window.location.href = "presentation.php?idCath=0";
    }
  })
});
function filtrerParMarque(marque) {
  effectuerRequeteAjax('../php/filter_by_marque.php?marque=' + marque, 'GET', null, function (response) {
    // Traitement des données reçues
    var donnees = JSON.parse(response);
    updateAfterResearch(donnees);
  });
}