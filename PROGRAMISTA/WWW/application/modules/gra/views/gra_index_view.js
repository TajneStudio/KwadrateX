function fnEllipse(xC, yC, width, height, rotation) {
	var x, y, rW, rH, inc;
	inc = 0.01 //value by which we increment the angle in each step
	rW = width / 2; //horizontal radius
	rH = height / 2; //vertical radius
	x = xC + rW * Math.cos(rotation); // ...we will treat this as angle = 0
	y = yC + rW * Math.sin(rotation);

	this.moveTo(x, y); //set the starting position
	for (var angle = inc; angle<2*Math.PI; angle+=inc) { //increment the angle from just past zero to full circle (2 Pi radians)
	x = xC + rW * Math.cos(angle) * Math.cos(rotation) - rH * Math.sin(angle) * Math.sin(rotation);
	y = yC + rW * Math.cos(angle) * Math.sin(rotation) + rH * Math.sin(angle) * Math.cos(rotation);
	this.lineTo(x, y); //draw a straight line segment. if the increment is small enough, this will be
	//indistinguishable from a curve in an on-screen pixel array
	}
}

window.requestAnimFrame = (function(){
	return  window.requestAnimationFrame       ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame    ||
			window.oRequestAnimationFrame      ||
			window.msRequestAnimationFrame     ||
			function( callback ){
				window.setTimeout(callback, 1000 / 60);
			};
})();

function plutnoGry(){
	var self = this;
	
	this.canvas_glowny = document.getElementById("kwadrateX_paint");
	this.g2D_glowny = document.getElementById("kwadrateX_paint").getContext("2d");
	
	this.obrazekTla = new Image;
	this.url_obrazekTla = "kartka_tlo.jpg";
	
	this.kwadratexGracza = new kwadratex();
	this.tablicaObiektowKolizyjnych = [
		new obiekt(250,300,1,1),
		new obiekt(400,300,3,2),
		new obiekt(300,350,1,3),
		new obiekt(300,500,4,4)
	];
	
	this.obslugaKlawiatury = new listenerKlawiatury();
	this.obslugaMyszki = new listenerMyszki();
	this.nawigacja = new nawigacja_gry();
	this.kolizje = new system_kolizyjny();
	
	this.uruchomGre = function(){
		//wlacz obsluge klawiszy
		this.obslugaKlawiatury.uruchom();
		this.obslugaMyszki.uruchom(this.canvas_glowny);
		//ladowanie grafiki
		this.nawigacja.uruchom();
		
		this.kwadratexGracza.stworzPlikGraficznyStworka();
		
		this.zaladujObrazekTla();
		
		for(var i = 0; i < this.tablicaObiektowKolizyjnych.length; i++){
			this.tablicaObiektowKolizyjnych[i].stworzPlikGraficznyObiektu();
		}
		
		self.glownaPetla();
		
	}
	
	this.glownaPetla = function(){
		
		self.obslugaKlawiatury.uruchomAkcjeKlawiatury(self.kwadratexGracza);
		
		for(var i = 0; i < self.tablicaObiektowKolizyjnych.length; i++){
			self.kwadratexGracza.czyKwasratexKolidujeZ(self.tablicaObiektowKolizyjnych[i]);
		}
		self.obslugaMyszki.czyMyszkaWskazujeObiekt(self.tablicaObiektowKolizyjnych);

		self.g2D_glowny.setTransform(1,0,0,1,0,0);
		
		//nachwile
		self.g2D_glowny.fillStyle = "#636454";
		self.g2D_glowny.fillRect(0,0,1050,800);
		//self.g2D_glowny.drawImage(self.obrazekTla,null,null);
		

		for(var i = 0; i < self.tablicaObiektowKolizyjnych.length; i++){
			self.tablicaObiektowKolizyjnych[i].renderujObiekt(self.g2D_glowny);
		}

		self.kwadratexGracza.renderujStworka(self.g2D_glowny);
		
		
		self.obslugaMyszki.sprawdzPozycjeMyszki(self.g2D_glowny);
		
		requestAnimFrame(self.glownaPetla);
	}
	
	this.zaladujObrazekTla = function(){
		this.obrazekTla.src = this.url_obrazekTla;
	}
	
	this.uruchomRysowanieStatyczne = function(){
		//ladowanie grafiki
		this.kwadratexGracza.stworzPlikGraficznyStworka();
		
		self.glownaPetlaStatyczna();
	}
	
	this.glownaPetlaStatyczna = function(){
		self.g2D_glowny.setTransform(1,0,0,1,0,0);
		self.g2D_glowny.fillStyle = "#636454";
		self.g2D_glowny.fillRect(1,1,500,500);
		
		self.kwadratexGracza.renderujStworka(self.g2D_glowny);
		

	}
}

function system_kolizyjny(){
	var self = this;
	
	this.uruchom = function(){
		
	}
}

function nawigacja_gry(){
	var self = this;
	
	this.uruchom = function(){
		
	}
}

function obiekt(pozycjaX,pozycjaY,skalaObiektu,idObiektu){
	var self = this;
	this.canvasObiektu;
	this.canvasObiektu_g2D;
	
	this.idObiektu = idObiektu;
	
	this.szerokoscPoczatkowa = 50;
	this.wysokoscPoczatkowa = 50;
	this.pozycjaX = pozycjaX;
	this.pozycjaY = pozycjaY;
	this.skalaObiektu = skalaObiektu;
	this.obrazekObiektu = new Image;
	this.url_obrazka = "obiektKolizyjny1.png";
	
	this.stworzPlikGraficznyObiektu = function(){
		this.canvasObiektu = document.createElement('canvas');
		this.canvasObiektu.width = this.szerokoscPoczatkowa+350;
		this.canvasObiektu.height = this.wysokoscPoczatkowa+350;
		this.canvasObiektu_g2D = this.canvasObiektu.getContext("2d");
		
		this.rysujObiekt(this.canvasObiektu_g2D);
	}
	
	this.rysujObiekt = function(g2D){
		this.transformacjeObiektu(g2D);
		this.obrazekObiektu.onload = function(){
			g2D.drawImage(self.obrazekObiektu,null,null);
			self.szerokoscPoczatkowa = self.obrazekObiektu.width*self.skalaObiektu;
			self.wysokoscPoczatkowa = self.obrazekObiektu.height*self.skalaObiektu;
		};
		this.obrazekObiektu.src = this.url_obrazka;
	}
	
	this.transformacjeObiektu = function(g2D){
		g2D.scale(this.skalaObiektu, this.skalaObiektu);
	}
	
	this.renderujObiekt = function(g2D_glowny_pobrany){
		g2D_glowny_pobrany.setTransform(1,0,0,1,this.pozycjaX,this.pozycjaY);
		g2D_glowny_pobrany.drawImage(this.canvasObiektu,null,null);
	}
}

function listenerMyszki(){
	var self = this;
	
	this.rect;
	this.pozycjaX = 0;
	this.pozycjaY = 0;
	
	this.myszkaWskazujeObiekt = "";
	this.kliknietyObiekt;
	
	this.sprawdzPozycjeMyszki = function(g2d_pobrany){
		g2d_pobrany.setTransform(1,0,0,1,0,20);
        g2d_pobrany.font = '18pt Calibri';
        g2d_pobrany.fillStyle = 'black';
        g2d_pobrany.fillText("PozycjaX: "+this.pozycjaX+" pozycjaY: "+this.pozycjaY+" myszkaWskazujeObiekt: "+this.myszkaWskazujeObiekt+" obiektKlikniety: "+this.kliknietyObiekt, null, null);
	}
	
	this.czyMyszkaWskazujeObiekt = function(tablicaObiektowKolizyjnych_pobrana){
		for(var i = 0; i < tablicaObiektowKolizyjnych_pobrana.length; i++){
		
			if(!(
				this.pozycjaX > tablicaObiektowKolizyjnych_pobrana[i].pozycjaX+tablicaObiektowKolizyjnych_pobrana[i].szerokoscPoczatkowa ||
				this.pozycjaX < tablicaObiektowKolizyjnych_pobrana[i].pozycjaX ||
				this.pozycjaY > tablicaObiektowKolizyjnych_pobrana[i].pozycjaY+tablicaObiektowKolizyjnych_pobrana[i].wysokoscPoczatkowa ||
				this.pozycjaY < tablicaObiektowKolizyjnych_pobrana[i].pozycjaY
			)){
				this.myszkaWskazujeObiekt = tablicaObiektowKolizyjnych_pobrana[i].idObiektu;
				return 0;
			} else {
				this.myszkaWskazujeObiekt = "";
			}
			
		}
	}
	
	this.uruchom = function(canvas_glowny_pobrany){
		this.dodajNasluchiwaniePozycji(canvas_glowny_pobrany);
		//this.dodajNasluchiwanieKlikniec(canvas_glowny_pobrany);
	}
	
	this.aktualizujPozycjeMyszki = function(canvas, evt){
		this.pozycjaX = evt.clientX - this.rect.left;
		this.pozycjaY = evt.clientY - this.rect.top;
	}
	
	this.dodajNasluchiwaniePozycji = function(canvas_glowny_pobrany){

		self.rect = canvas_glowny_pobrany.getBoundingClientRect();
		$(window).resize(function() {
			self.rect = canvas_glowny_pobrany.getBoundingClientRect();
		});
	
		canvas_glowny_pobrany.addEventListener('mousemove', function(evt) {
			self.aktualizujPozycjeMyszki(canvas_glowny_pobrany,evt);
		});
	}
	
	this.dodajNasluchiwanieKlikniec = function(canvas_glowny_pobrany){
		canvas_glowny_pobrany.addEventListener('mousedown', function(evt) {
			alert();
		});
	}
}

function listenerKlawiatury(){
	var self = this;
	
	this.klawiszWgore = false;
	this.klawiszWdol = false;
	this.klawiszWlewo = false;
	this.klawiszWprawo = false;
	
	this.uruchom = function(){
	
		$(document).keydown(function(e) {
			if(e.keyCode == 87){
				self.klawiszWgore = true;
			}
			if(e.keyCode == 83){
				self.klawiszWdol = true;
			}
			if(e.keyCode == 65){
				self.klawiszWlewo = true;
			}
			if(e.keyCode == 68){
				self.klawiszWprawo = true;
			}
		});
		
		$(document).keyup(function(e) {
			if(e.keyCode == 87){
				self.klawiszWgore = false;
			}
			if(e.keyCode == 83){
				self.klawiszWdol = false;
			}
			if(e.keyCode == 65){
				self.klawiszWlewo = false;
			}
			if(e.keyCode == 68){
				self.klawiszWprawo = false;
			}
		});
	}
	
	this.uruchomAkcjeKlawiatury = function(kwadratexGracza_pobrany){
		if(this.klawiszWgore == true){
			kwadratexGracza_pobrany.idzWgore();
		}
		if(this.klawiszWdol == true){
			kwadratexGracza_pobrany.idzWdol();
		}
		if(this.klawiszWlewo == true){
			kwadratexGracza_pobrany.idzWlewo();
		}
		if(this.klawiszWprawo == true){
			kwadratexGracza_pobrany.idzWprawo();
		}
	}
}

function kwadratex(){
	var self = this;
	
	this.canvasStworka;
	this.canvasStworka_g2D;
	
	this.szerokoscPoczatkowa = 50;
	this.wysokoscPoczatkowa = 50;
	this.skalaStworka = 2;
	
	this.predkosc = 2.5;
	
	this.predkoscOczu = 0.3;
	
	this.pozycjaX = 50;
	this.pozycjaY = 50;
	
	//pozycje oczu stworka
	this.pozycjaXoczuStworkaMin = -3;
	this.pozycjaXoczuStworka = 0;
	this.pozycjaXoczuStworkaMax = 3;
	
	this.pozycjaYoczuStworkaMin = -3;
	this.pozycjaYoczuStworka = 0;
	this.pozycjaYoczuStworkaMax = 3;
	
	this.kolorCiala = "#d4d4d4";
	this.kolorObramowaniaStworka = "#7d7d7d";
	this.kolorOkaStworka = "#dff9f5";
	this.kolorTeczowkiStworka = "#0e1010";
	this.kolorNosaStworka = "#3c3c3c";
	this.kolorUstStworka = "#3c3c3c";
	
	this.obrazekOczyAkcesoria = new Image;
	this.url_obrazekOczyAkcesoria = "";
	
	this.obrazekNakrycieGlowy = new Image;
	this.url_obrazekNakrycieGlowy = "brazowaCzapka.png";
	
	this.obrazekWlosow = new Image;
	this.url_obrazekWlosow = "wlosyFalowane.png";
	
	this.obrazekCzescGornaUbrania = new Image;
	this.url_obrazekCzescGornaUbrania = "szaraKurtka.png";
	
	this.obrazekCzescDolnaUbrania = new Image;
	this.url_obrazekCzescDolnaUbrania = "niebieskieSpodnie.png";
	
	this.idzWgore = function(){
		this.pozycjaY -= this.predkosc;
		this.animujOczyStworka("gora");
	}
	this.idzWdol = function(){
		this.pozycjaY += this.predkosc;
		this.animujOczyStworka("dol");
	}
	this.idzWlewo = function(){
		this.pozycjaX -= this.predkosc;
		this.animujOczyStworka("lewo");
	}
	this.idzWprawo = function(){
		this.pozycjaX += this.predkosc;
		this.animujOczyStworka("prawo");
	}
	
	this.czyKwasratexKolidujeZ = function(objekt) {

		if(!(
			this.pozycjaX > objekt.pozycjaX+objekt.szerokoscPoczatkowa-this.predkosc ||
			this.pozycjaX+this.szerokoscPoczatkowa-this.predkosc < objekt.pozycjaX ||
			this.pozycjaY > objekt.pozycjaY+objekt.wysokoscPoczatkowa-this.predkosc ||
			this.pozycjaY+this.wysokoscPoczatkowa-this.predkosc < objekt.pozycjaY
		)){
			//gora
			if(this.pozycjaY < objekt.pozycjaY + objekt.wysokoscPoczatkowa-this.predkosc){
				this.pozycjaY -= this.predkosc;
			}
			//dol
			if(this.pozycjaY + this.wysokoscPoczatkowa-this.predkosc > objekt.pozycjaY){
				this.pozycjaY += this.predkosc;
			}
				
			//lewo
			if(this.pozycjaX < objekt.pozycjaX + objekt.szerokoscPoczatkowa-this.predkosc){
				this.pozycjaX -= this.predkosc;
			}
				
			//prawo
			if(this.pozycjaX + this.szerokoscPoczatkowa-this.predkosc > objekt.pozycjaX){
				this.pozycjaX += this.predkosc;
			}
		}

	};
	
	this.renderujStworka = function(g2D_glowny_pobrany){
		g2D_glowny_pobrany.setTransform(1,0,0,1,this.pozycjaX-10*this.skalaStworka,this.pozycjaY-10*this.skalaStworka);
		g2D_glowny_pobrany.drawImage(this.canvasStworka,null,null);
	}
	
	this.stworzPlikGraficznyStworka = function(){
		this.canvasStworka = document.createElement('canvas');
		this.canvasStworka.width = this.szerokoscPoczatkowa+350;
		this.canvasStworka.height = this.wysokoscPoczatkowa+350;
		this.canvasStworka_g2D = this.canvasStworka.getContext("2d");
		
		this.rysujStworka(this.canvasStworka_g2D);
	}
	this.transformacjeStworka = function(g2D){
		g2D.translate(0.5, 0.5);
		g2D.scale(this.skalaStworka, this.skalaStworka);
	}
	this.rysujStworka = function(g2D){
		this.transformacjeStworka(g2D);
		
		this.rysujCialoStworka(g2D);
		this.rysujOczyStworka(g2D);
		this.rysujNosStworka(g2D,32.5,41.5);
		this.rysujustaStworka(g2D,22,46);
		
		this.rysujCzescDolnaUbrania(g2D);
		this.rysujCzescGornaUbrania(g2D);
		
		this.rysujOczyAkcesoria(g2D);
		
		this.rysujWlosy(g2D);
		this.rysujNakrycieGlowy(g2D);
		
		this.ustaw_szerokosc_wysokosc();

	}
	
	this.rysujOczyAkcesoria = function(g2D){
		this.obrazekOczyAkcesoria.onload = function(){
			g2D.drawImage(self.obrazekOczyAkcesoria,0,0);
		};
		this.obrazekOczyAkcesoria.src = this.url_obrazekOczyAkcesoria;
	}
	
	this.rysujCzescDolnaUbrania = function(g2D){
		this.obrazekCzescDolnaUbrania.onload = function(){
			g2D.drawImage(self.obrazekCzescDolnaUbrania,0,0);
		};
		this.obrazekCzescDolnaUbrania.src = this.url_obrazekCzescDolnaUbrania;
	}
	
	this.rysujCzescGornaUbrania = function(g2D){
		this.obrazekCzescGornaUbrania.onload = function(){
			g2D.drawImage(self.obrazekCzescGornaUbrania,0,0);
		};
		this.obrazekCzescGornaUbrania.src = this.url_obrazekCzescGornaUbrania;
	}
	
	this.rysujWlosy = function(g2D){
		this.obrazekWlosow.onload = function(){
			g2D.drawImage(self.obrazekWlosow,0,0);
		};
		this.obrazekWlosow.src = this.url_obrazekWlosow;
	}
	
	this.rysujNakrycieGlowy = function(g2D){
		this.obrazekNakrycieGlowy.onload = function(){
			g2D.drawImage(self.obrazekNakrycieGlowy,0,0);
		};
		this.obrazekNakrycieGlowy.src = this.url_obrazekNakrycieGlowy;
	}
	
	this.ustaw_szerokosc_wysokosc = function(){
		this.szerokoscPoczatkowa *= this.skalaStworka;
		this.wysokoscPoczatkowa *= this.skalaStworka;
	}
	
	this.rysujCialoStworka = function(g2D){
		g2D.fillStyle = this.kolorCiala;
		g2D.fillRect(10,10,this.szerokoscPoczatkowa-1,this.wysokoscPoczatkowa-1);
		
		g2D.strokeStyle = this.kolorObramowaniaStworka;
		g2D.strokeRect(10,10,this.szerokoscPoczatkowa-1,this.wysokoscPoczatkowa-1);
	}
	
	this.rysujOczyStworka = function(g2D){
		this.rysujOkoStworka(g2D,46,29);
		this.rysujOkoStworka(g2D,23,29);
		g2D.drawImage(this.obrazekOczyAkcesoria,0,0);
	}
	
	this.rysujOkoStworka = function(g2D,x_oka,y_oka){
		//same oko i teczowka
		g2D.ellipse = fnEllipse;
		g2D.strokeStyle = this.kolorObramowaniaStworka;
		var grd = g2D.createRadialGradient(x_oka+this.pozycjaXoczuStworka, y_oka+this.pozycjaYoczuStworka, 7, x_oka+this.pozycjaXoczuStworka, y_oka+this.pozycjaYoczuStworka, 2);
		grd.addColorStop(0, this.kolorOkaStworka);
		grd.addColorStop(1, this.kolorTeczowkiStworka);
		g2D.fillStyle = grd;
		
		g2D.beginPath();
		g2D.ellipse(x_oka, y_oka, 17, 20, Math.PI);
		g2D.closePath();
		
		g2D.stroke();
		g2D.fill();
		
	}
	
	this.rysujNosStworka = function(g2D,x_nosa,y_nosa){
		g2D.fillStyle = this.kolorNosaStworka;
		g2D.fillRect(x_nosa,y_nosa,4,2);
		g2D.fillRect(x_nosa+1,y_nosa-0.8,2,1);
	}
	
	this.rysujustaStworka = function(g2D,x_ust,y_ust){
		g2D.strokeStyle = this.kolorUstStworka;
		g2D.beginPath();
		g2D.moveTo(x_ust,y_ust);
		g2D.bezierCurveTo(x_ust,y_ust+5,x_ust+26,y_ust+5,x_ust+26,y_ust);
		g2D.stroke();
	}

	this.animujOczyStworka = function(kierunek){
    	
    	if(this.pozycjaYoczuStworka >= this.pozycjaYoczuStworkaMin){
	    	if(kierunek == "gora"){
	    		this.pozycjaYoczuStworka -= this.predkoscOczu;
	    	}
    	}
	    
	    if(this.pozycjaYoczuStworkaMax >= this.pozycjaYoczuStworka){
	    	if(kierunek == "dol"){
	    		this.pozycjaYoczuStworka += this.predkoscOczu;
	    	}
    	}
    	
    	if(this.pozycjaXoczuStworkaMax >= this.pozycjaXoczuStworka){
	    	if(kierunek == "prawo"){
	    		this.pozycjaXoczuStworka += this.predkoscOczu;
	    	}
    	}
    	
    	if(this.pozycjaXoczuStworka >= this.pozycjaXoczuStworkaMin){
	    	if(kierunek == "lewo"){
	    		this.pozycjaXoczuStworka -= this.predkoscOczu;
	    	}
    	}
    	
    	this.rysujOczyStworka(this.canvasStworka_g2D);
		
    }
	
}

$(document).ready( function(){
	var gra = new plutnoGry();
	gra.uruchomGre();
});