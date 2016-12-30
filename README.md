# Turisticka agencija

## Amina Puce, 16923
Projektni zadatak - Web Tehnologije

## SPIRALA 3

### I  - Šta je urađeno?
1.)Napravljena je serijalizacija svih podataka u XML fajlove. (Ponude agencije, poruke agenciji, odgovori na anketu i podaci za prijavu administratora). Administratoru je omogućen unos, brisanje i izmjena ponuda. Na naslovnoj stranici se prikazuju samo 4 ponude, nebitno ima li ih više, dok je na podstranici kao i adminovom profilu moguć pregled svih ponuda. Ponude se učitavaju iz XML fajla. Urađena je validacija, i pazilo se na XSS ranjivost koda. Adminova šifra je kodirana preko md5 u XML fajlu, a glasi '123'.    
2.)Omogućen je download csv fajla sa ponudama agencije.  
3.)Omogućeno je generisanje pdf fajla uz pomoć fpdf biblioteke. Podaci se uzimaju iz XML fajla sa ponudama agencije.  
4.)Urađen je livesearch, prikazuje se do deset najsličnijih stavki, pretražuje se po nazivu i opisu ponude. Klikom na button Pretraga, prikazuju se sve ponude koje zadovoljavaju uslov. Stranica se ne reloada pri upisivanju teksta.  
5.)Napravljen je deployment stranice na OpenShift, link: http://turisticka-agencija-turisticka-agencija-amina.44fs.preview.openshiftapps.com/     

### II  - Šta nije urađeno?
-mislim da je sve urađeno.

### III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)
/

### IV  - Bug-ovi koje ste primijetili ali ne znate rješenje
/

### V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi

index.php - početni fajl, na njemu je sada omogućen i login admina, i prikazuju se 4 ponude agencije iz XML fajla.  
OnamaTA.php - informacije o agenciji  
PonudeTA.php - prikazuju se sve ponude, omogućena pretraga ponuda (livesearch)  
IzletiTA.php - u budućnosti se mogu izdvojiti iz ponuda izleti po BiH, na podstranici bi bile iste funkcionalnosti kao na PonudeTA.php  
KontaktTA.php - mogućnost slanja poruka agenciji, sada se sve poruke spašavaju u XML.
profile.php - adminov profil

xml fajlovi: 
korisnici.xml (adminovi podaci)
ponude.xml, poruke.xml, rezAnkete.xml

php skripte za dodavanje komentara, ponuda, rezultata ankete, te brisanje i izmjenu ponuda:
dodajKomentar.php, dodajPonudu.php, dodajRezultat.php, izbrisiPonudu.php, izmjena.php

php skripte za generisanje CSV i PDF fajlova:
downloadCSV.php, downloadPDF.php

php skripta za livesearch: livesearch.php

php skripte za login admina:
login.php, session.php, logout.php

php skripte za prikaz podataka adminu:
prikaziPoruke.php, prikaziOcjene.php
