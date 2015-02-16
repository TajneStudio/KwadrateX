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
	/*
	 * Obiekty graficzne dla EkranuPomieszczen
	 */
	kwadratexObrazek lewyGornyRog = new kwadratexObrazek(0,0,"src/obrazki/ekranPomieszczen/lewyGornyRog.png");
	kwadratexObrazek prawyDolnyRog_Rama = new kwadratexObrazek(409,568,"src/obrazki/ekranPomieszczen/prawyDolnyRog_Rama.png");
	kwadratexObrazek sliderLokalizacji = new kwadratexObrazek(94,564,"src/obrazki/ekranPomieszczen/sliderLokalizacji.png");
	
	/*
	 * Obiekty graficzne dla EKRANU STWORKA (chodzi glownie o ramke[narazie])
	 */
	kwadratexObrazek ekranStworkaRamaGora = new kwadratexObrazek(0,0,"src/obrazki/ekranStworka/ekranStworkaRamaGora.png");
	kwadratexObrazek ekranStworkaRamaDol = new kwadratexObrazek(0,495,"src/obrazki/ekranStworka/ekranStworkaRamaDol.png");
}
