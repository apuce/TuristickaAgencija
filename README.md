# Turisticka agencija

## Amina Puce, 16923
Projektni zadatak - Web Tehnologije

## SPIRALA 4

### I  - Šta je urađeno?
a) Baza ima sljedeće tabele: ponuda, poruka, rezervacija, slika, korisnik i anketa
Tri uvezane tabele su: ponuda, rezervacija i slika. Povezane su tako, što rezervacija ima foreign key na ponudu (za koju ponudu je rezervacija), i slika ima foreign key na ponudu (na osnovu toga se iz tabele slika, u carousel učitavaju 3 slike vezane za ponudu). 
Dodane su nove forme za rezervaciju ponuda i za unos 3 slike pri dodavanju nove ponude. Omogućeno je da se klikom na dugme 'Detalji' ispisuju detalji o ponudi, forma za rezervaciju i carousel sa slikama te ponude.
    
b) skripta prebaciUbazu.php prebacuje sve podatke koji se nalaze u xmlu, a nema ih u bazi, u bazu.
  
c) sve skripte su prepravljene tako da rade sa bazom umjesto sa xmlom.  

d) link na stranicu: http://turisticka-agencija-turisticka-agencija-amina.44fs.preview.openshiftapps.com  

e) napravljena je restMethod.php metoda koja vraća ponude u obliku JSON-a.  

f) u folderu "ScreenshotsPostman" nalaze se slike testiranja metode preko Postmana  
  

### II  - Šta nije urađeno?
-mislim da je sve urađeno.

### III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)
Primjetila sam tek nakon deploya da klikom sa podstranice "Onama" opet na "Onama" u a href= imam pogrešan naziv fajla, tj fali slovo, ide na Onam.php.   

### IV  - Bug-ovi koje ste primijetili ali ne znate rješenje
/

### V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi

index.php - početni fajl, na njemu je sada omogućen i login admina, i prikazuju se 4 ponude agencije  
OnamaTA.php - informacije o agenciji  
PonudeTA.php - prikazuju se sve ponude, omogućena pretraga ponuda (livesearch)    
IzletiTA.php - u budućnosti se mogu izdvojiti iz ponuda izleti po BiH, na podstranici bi bile iste funkcionalnosti kao na PonudeTA.php   
KontaktTA.php - mogućnost slanja poruka agenciji, sada se sve poruke spašavaju u bazu.  
profile.php - adminov profil

xml fajlovi: 
korisnici.xml (adminovi podaci)
ponude.xml, poruke.xml, rezAnkete.xml, rezervacije.xml, slike.xml  

php skripte za dodavanje komentara, ponuda, rezultata ankete, te brisanje i izmjenu ponuda:
dodajKomentar.php, dodajPonudu.php, dodajRezultat.php, izbrisiPonudu.php, izmjena.php

php skripte za generisanje CSV i PDF fajlova:
downloadCSV.php, downloadPDF.php

php skripta za livesearch: livesearch.php

php skripte za login admina:
login.php, session.php, logout.php

php skripte za prikaz podataka adminu:
prikaziPoruke.php, prikaziOcjene.php, prikaziRezervacije.php  

restMethod.php: metoda web servisa koja vraća podatke u obliku JSON-a  

ta.sql: exportovana baza  
