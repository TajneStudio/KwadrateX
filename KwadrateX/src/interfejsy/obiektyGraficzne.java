package interfejsy;

import klasyPomocnicze.kwadratexObrazek;

public interface obiektyGraficzne {
	/*
	 * Obiekty graficzne dla EkranuGlownego
	 */
	kwadratexObrazek prawyGornyRog = new kwadratexObrazek(409,0,"src/obrazki/ekranGlowny/prawyGornyRog.png");
	kwadratexObrazek prawyDolnyRog = new kwadratexObrazek(288,514,"src/obrazki/ekranGlowny/prawyDolnyRog.png");
	kwadratexObrazek lewyDolnyRog = new kwadratexObrazek(0,568,"src/obrazki/ekranGlowny/lewyDolnyRog.png");
	kwadratexObrazek logoGry = new kwadratexObrazek(97,24,"src/obrazki/ekranGlowny/logoGry.png");
	kwadratexObrazek obszarNaPrzyciski = new kwadratexObrazek(104,218,"src/obrazki/ekranGlowny/obszarNaPrzyciski.png");
	kwadratexObrazek zajawkaEkranGlowny = new kwadratexObrazek(63,429,"src/obrazki/ekranGlowny/zajawkaEkranGlowny.png");
	
}
