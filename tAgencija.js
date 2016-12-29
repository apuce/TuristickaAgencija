function ucitaj(naziv) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200)
          {
          document.getElementById("stranica").innerHTML = ajax.responseText;
          //popunjavanje forme pomocu localStorage
          document.getElementById("email").value=localStorage.getItem("email");
          if(localStorage.getItem("area")==null)document.getElementById("area").value="";
          else document.getElementById("area").value=localStorage.getItem("area");
          }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("stranica").innerHTML = naziv;
    }


    if (naziv === 'NaslovnaTA') {
        document.getElementById("option1").style.color="#0D4F8B";
        document.getElementById("option2").style.color="black";
        document.getElementById("option3").style.color="black";
        document.getElementById("option4").style.color="black";
        document.getElementById("option5").style.color="black";
        ajax.open("GET", "NaslovnaTA.html", true);
        ajax.send();
    }
    if (naziv === 'PonudeTA') {
      document.getElementById("option1").style.color="black";
      document.getElementById("option2").style.color="black";
      document.getElementById("option3").style.color="#0D4F8B";
      document.getElementById("option4").style.color="black";
      document.getElementById("option5").style.color="black";
        ajax.open("GET", "PonudeTA.html", true);
        ajax.send();
    }
    if (naziv === 'IzletiTA') {
      document.getElementById("option1").style.color="black";
      document.getElementById("option2").style.color="black";
      document.getElementById("option3").style.color="black";
      document.getElementById("option4").style.color="#0D4F8B";
      document.getElementById("option5").style.color="black";
        ajax.open("GET", "IzletiTA.html", true);
        ajax.send();
    }
    if (naziv === 'OnamaTA') {
      document.getElementById("option1").style.color="black";
      document.getElementById("option2").style.color="#0D4F8B";
      document.getElementById("option3").style.color="black";
      document.getElementById("option4").style.color="black";
      document.getElementById("option5").style.color="black";
        ajax.open("GET", "OnamaTA.html", true);
        ajax.send();
    }
    if (naziv === 'KontaktTA') {
      document.getElementById("option1").style.color="black";
      document.getElementById("option2").style.color="black";
      document.getElementById("option3").style.color="black";
      document.getElementById("option4").style.color="black";
      document.getElementById("option5").style.color="#0D4F8B";
        ajax.open("GET", "KontaktTA.php", true);
        ajax.send();
    }
    if (naziv === 'DetaljiTA') {

        ajax.open("GET", "DetaljiTA.html", true);
        ajax.send();
    }


}


/*window.onload=function(){
      document.getElementById("email").value=localStorage.getItem("email");
      document.getElementById("area").value=localStorage.getItem("area");

}*/




//Carousel
function SlideShow(direction) {
    var slike = document.getElementsByClassName("hideable");

    var trenutna = pronadjiTrenutnu(slike);
    slike[trenutna].style.display = "none";
    if(!direction) {
      var prikazi;
        if(trenutna == 0) prikazi = slike.length-1;
        else prikazi=trenutna-1;
    } else {
      var prikazi;
        if(trenutna == slike.length-1) prikazi = 0;
        else prikazi=trenutna+1;
    }
    slike[prikazi].style.display = "block";
}

function pronadjiTrenutnu(slike) {
    var trenutna = -1;
    for(var i = 0; i < slike.length; i++) {
        if(slike[i].style.display == "block") {
            trenutna = i;
        }
    }
    return trenutna;
}

//var promjena= setInterval("SlideShow(true)", 2000);


//validacija
function provjeraEmaila() {

   var inputEmail= document.getElementById("email");
    localStorage.setItem("email", inputEmail.value);

    if(inputEmail.value<1 || !(/^\S+@\S+$/.test(inputEmail.value))){
      document.getElementById("greska").style.display="block";
      document.getElementById("greskaTekst").innerHTML="Nije validan email!";
      document.getElementById("dugme").disabled = true;
    }
    else{
      document.getElementById("greska").style.display="none";
      document.getElementById("greskaTekst").innerHTML="";
      document.getElementById("dugme").disabled = false;
      provjeraDatuma();
    }
}

function provjeraPoruke() {
  var inputMessage=document.getElementById("area");
  localStorage.setItem("area", inputMessage.value);

  if(document.getElementById("area").value.length<1){
    document.getElementById("greska").style.display="block";
    document.getElementById("greskaTekst").innerHTML="Ne mozete poslati praznu poruku!";
    document.getElementById("dugme").disabled = true;
  }
  else{
    document.getElementById("greska").style.display="none";
    document.getElementById("greskaTekst").innerHTML="";
    document.getElementById("dugme").disabled = false;
    provjeraEmaila();
  }

}

function provjeraSlanjaPoruke(){
  provjeraEmaila();
  provjeraPoruke();
}


function provjeraAnkete2()
{
  var checked=false;
  if(document.getElementById("jedan").checked==true || document.getElementById("dva").checked==true || document.getElementById("tri").checked==true)checked=true;

  if(checked==false)alert("Izaberite jednu od ponuda!");
}



function provjeraKljucneRijeci(){

var kljucna=document.getElementById("kljucnaRijec").value;

if(kljucna.length<1){
  document.getElementById("greska").style.display="block";
  document.getElementById("greskaTekst").innerHTML="Unesite kljucnu rijec!";
  document.getElementById("pretraga").disabled = true;
}
else if(!(/^[a-zA-Z]+$/.test(kljucna)))
{
  document.getElementById("greska").style.display="block";
  document.getElementById("greskaTekst").innerHTML="Unesite validnu kljucnu rijec!";
  document.getElementById("pretraga").disabled = true;
}
else{
  document.getElementById("greska").style.display="none";
  document.getElementById("greskaTekst").innerHTML="";
}


}


function provjeraDatuma(){

var danasnjiDatum=new Date();
var datumA= document.getElementById("datum1").valueAsDate;
var datumB= document.getElementById("datum2").valueAsDate;

if(!(/^\d{2}\/\d{2}\/\d{4}$/.test(datumA)) || !(/^\d{2}\/\d{2}\/\d{4}$/.test(datumB)))
{
  document.getElementById("greska").style.display="block";
  document.getElementById("greskaTekst").innerHTML="Nije validan format datuma !";
  document.getElementById("pretraga").disabled = true;
}

if(datumB==null || datumA==null)
{
  document.getElementById("greska").style.display="block";
  document.getElementById("greskaTekst").innerHTML="Unesite oba datuma !";
  document.getElementById("pretraga").disabled = true;
}

if((datumB.getDate()<datumA.getDate() && datumB.getMonth()==datumA.getMonth() && datumB.getFullYear()==datumA.getFullYear()) || (datumB.getMonth()<datumA.getMonth() && datumB.getFullYear()==datumA.getFullYear()) || (datumA.getFullYear()<2016 || datumB.getFullYear()<2016)){
  document.getElementById("greska").style.display="block";
  document.getElementById("greskaTekst").innerHTML="Nije validan period !";
  document.getElementById("pretraga").disabled = true;
}

  else{
    document.getElementById("greska").style.display="none";
    document.getElementById("greskaTekst").innerHTML="";
    document.getElementById("pretraga").disabled = false;

  }

}

function provjeraPretraga()
{
  provjeraKljucneRijeci();
  provjeraDatuma();
}
