## SPIRALA 2

### I  - Šta je urađeno?
a)validirana su sva polja formi 
b)implementirani su pomoću JavaScripta -Carousel i -LocalStorage
Carousel je smješten na podstranici DetaljiTA.html, koja se otvara klikom na detalje o ponudi "Venecija".
Listaju se slike vezane za tu ponudu.
LocalStorage je urađen na podstranici KontaktTA.html, gdje se spašava posljednji unos na formu za slanje poruka.
c)podstranice se učitavaju bez reloada cijele stranice (Ajax)

### II  - Šta nije urađeno?
-mislim da je sve urađeno.

### III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)
/

### IV  - Bug-ovi koje ste primijetili ali ne znate rješenje
/

### V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi

-INDEXTA.HTML -> početna stranica na kojoj se nalaze 4 glavne ponude agencije, forma (anketa) za ocjenu agencije, te meni sa linkovima na sve ostale podstranice.  
-ONAMATA.HTML -> podstranica koja sadrži jednu "priču" o turističkoj agenciji.  
-PONUDETA.HTML -> podstranica sa svim aktuelnim ponudama agencije, također će biti omogućena pretraga istih tako da korisnik može unijeti naziv države ili grada za koji želi vidjeti da li postoji ponuda. Također klikom na ponudu otvarat će se detalji o toj ponudi (DETALJITA.HTML) -> Detalji ponude "Venecija". Tu je urađen carousel.
-IZLETITA.HTML -> podstranica slična prethodnoj, samo što će na ovoj podstranici biti ponude za jednodnevne izlete po Bosni i Hercegovini.  
-KONTAKTTA.HTML -> podststranica sa brojem telefona, mailom i adresom agencije, tj.osnovnim podacima za kontakt sa agencijom. Tu je također forma za slanje poruka agenciji. Tu je urađen localstorage. 
-TA.CSS -> fajl koji sadrži cijeli stil stranice  
-tAgencija.js -> javascript fajl 