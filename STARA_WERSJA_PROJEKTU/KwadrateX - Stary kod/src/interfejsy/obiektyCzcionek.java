package interfejsy;

import klasyPlikow.plikFontu;

/**
 * Interfejs zawierajacy obiekty czcionek
 * 
 * UWAGA! Tutaj umieszczmy obiekty czcionek z ktorych bedziemy chcieli skorzystac.
 * Pozwoli to na optymalizacje i zwiekszenie predkosci i wydajnosci gry
 * 
 * @author Lukasz Flak
 *
 */
public interface obiektyCzcionek {
	plikFontu fontGry = new plikFontu("src/fonty/FontleroyBrown.ttf");
}
