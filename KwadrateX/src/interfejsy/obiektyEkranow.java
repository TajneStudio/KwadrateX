package interfejsy;

import generatoryEkranow.oknoEkranuGlownego;
import generatoryEkranow.oknoEkranuPomieszczen;
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
public interface obiektyEkranow {
	okno oknoGry = new okno();
	oknoEkranuGlownego ekranGlowny = new oknoEkranuGlownego();
	oknoEkranuPomieszczen ekranPomieszczen = new oknoEkranuPomieszczen();
}
