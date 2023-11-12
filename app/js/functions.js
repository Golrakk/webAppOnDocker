function show() {
  document.getElementById("stock_label").style.display = "table-cell";
  for (var i = 0; i < 5; i++) {
    document.getElementsByClassName("stocks")[i].style.display = "table-cell";
  }
  document.getElementById("hide_button").style.display = "block";
  document.getElementById("show_button").style.display = "none";
}


function hide() {
  document.getElementById("stock_label").style.display = "none";
  for (var i = 0; i < 5; i++) {
    document.getElementsByClassName("stocks")[i].style.display = "none";
  }
  document.getElementById("hide_button").style.display = "none";
  document.getElementById("show_button").style.display = "block";
}


function plus(product_id, haveStock, index) {
  if (haveStock) {
    if (document.getElementById(product_id+"_"+index).value < parseInt(document.getElementById("product_stock_"+index).innerText)) {
      document.getElementById(product_id+"_"+index).value++;
    }
  } else {
    document.getElementById(product_id+"_"+index).value++;
  }
}


function minus(product_id, index) {
  if (document.getElementById(product_id+"_"+index).value > 0) {
    document.getElementById(product_id+"_"+index).value--;
  }
}


function getCookie(name){
  var separator_1 = new RegExp("(; )", "g");
  var cookies = document.cookie.split(separator_1);

  for(var i = 0; i < cookies.length-1; i++){
    var separator_2 = new RegExp("=", "g");
    var infos = cookies[i].split(separator_2);
    if(infos[0] == name){
      return infos[1];
    }
  }
  return -1;
}


function addToCart(page) {
  var product;
  switch (page) {
    case "Raw Ores":
      product = "raw_ore";
      break;
    case "Refined Ores":
      product = "refined_ore";
      break;
    case "Pickaxes":
      product = "pickaxe";
      break;
    default:
      product = "structure";
      break;
  }

  var updateBasket = false;

  for (let index = 0; index < 5; index++) {
    if (document.getElementById("product_name_"+index) != null) {
      if (document.getElementById("product_quantity_"+index).value != 0) {
        if (parseInt(getCookie(product+"_"+index+"_quantity")) > 0) {
          document.cookie = product+"_"+index+"_quantity="+(parseInt(document.getElementById("product_quantity_"+index).value)+parseInt(getCookie(product+"_"+index+"_quantity")));
        } else {
          document.cookie = product+"_"+index+"_name="+document.getElementById("product_name_"+index).innerHTML; 
          document.cookie = product+"_"+index+"_quantity="+document.getElementById("product_quantity_"+index).value;
        }
        document.getElementById("product_quantity_"+index).value = 0;
        updateBasket = true;
      }
    }
  }
}


function deleteCookies() {
  var separator_1 = new RegExp("(; )", "g");
  var cookies = document.cookie.split(separator_1);

  for(var i = 0; i < cookies.length-1; i++){
    var separator_2 = new RegExp("=", "g");
    var infos = cookies[i].split(separator_2);
    document.cookie = infos[0] + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
  }
}


function ouvrir_popUp(source) {
  var popUp = document.getElementById("pop_up");
  popUp.getElementsByClassName("image")[0].src = source;
  popUp.className += "ouvert";
}


function fermer_popUp() {
  document.getElementById("pop_up").className = "";
}


function couleur_input(pattern, id) {
  if (!pattern) {
    document.getElementById(id).style.borderColor = "#ff0000";
  } else {
    document.getElementById(id).style.borderColor = "#00ff00";
  }
}


function verif(id_nom, id_prenom, id_mail, id_objet) {
  var nom = document.getElementById(id_nom).value;
  var pattern_nom = /^[a-zA-ZÀ-ÿ -']{1,}$/;

  var prenom = document.getElementById(id_prenom).value;
  var pattern_prenom = /^[a-zA-ZÀ-ÿ-]{1,}$/;

  var mail = document.getElementById(id_mail).value;
  var pattern_mail = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;

  var objet = document.getElementById(id_objet).value;
  var pattern_objet = /^[a-zA-ZÀ-ÿ0-9 .-]{1,}$/;

  couleur_input(pattern_nom.test(nom), id_nom);
  couleur_input(pattern_prenom.test(prenom), id_prenom);
  couleur_input(pattern_mail.test(mail), id_mail);
  couleur_input(pattern_objet.test(objet), id_objet);
}