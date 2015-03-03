package interfejsy;

import klasyPomocnicze.kwadratexGrafika;
import stworek.stworek;

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
}
