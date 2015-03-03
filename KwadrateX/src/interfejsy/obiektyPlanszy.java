package interfejsy;

import otoczenieStworka.tloPomieszczenia;
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
	
	//tloGry v2
	tloPomieszczenia tloPomieszczenia = new tloPomieszczenia(0.0d,0.0d);
}
