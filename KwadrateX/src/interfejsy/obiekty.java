package interfejsy;

import generatoryEkranow.oknoEkranuGlownego;
import main.okno;

/**
 * Interfejs zawierajacy referencje do obiektow
 * 
 * UWAGA! Tutaj tworzymy obiekty klas, potem odowlujemy sie do tego interfejsu 
 * aby skorzystac z jakiegos potrzebnego nam obiektu
 * 
 * @author Lukasz
 *
 */
public interface obiekty {
	okno oknoGry = new okno();
	oknoEkranuGlownego ekranGlowny = new oknoEkranuGlownego();
}
