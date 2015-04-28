package interfejsy;

import funkcjeGry.generatorObiektowKolizyjnych;
import obiektyPlanszy.stworek;
import klasyPomocnicze.kwadratexGrafika;

/**
 * 
 * Interfejs zawiera wszystkie obiekty generowane na planszy tj
 * Stworek, sciana, podloga, okna itp itd
 * 
 * @author Lukasz Flak
 *
 */
public interface obiektyPlanszy {
	
	//stworek
	stworek stworekUsera = new stworek(100.0d,150.0d);
	
	//tloGry
	kwadratexGrafika tloGry = new kwadratexGrafika(0.0d,0.0d);
	
	//obiekty kolizyjne
	generatorObiektowKolizyjnych obiektyKolizyjne = new generatorObiektowKolizyjnych();
	
}
