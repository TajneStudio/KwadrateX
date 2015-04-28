package klasyPlikow;

import java.awt.Font;
import java.awt.FontFormatException;
import java.io.FileInputStream;
import java.io.IOException;

/**
 * Klasa tworzaca plik fontu
 * 
 * Dzieki niej mozemy pobrac font wczesniej zaladownay
 * 
 * @author Lukasz Flak
 *
 */
public class plikFontu {
	
	private Font fontPrzycisku;
	private String fontSrc;

	/*
	 * Konstruktor w ktorym podajemy sciezke do fontu
	 */
	public plikFontu(String fontSrc) {
		this.fontSrc = fontSrc;
		this.wczytaj_font();
	}
	
	/*
	 * Metoda wczytuje font do pola skladowego klasy
	 */
	public void wczytaj_font(){
		try {
			this.fontPrzycisku = fontPrzycisku.createFont(Font.TRUETYPE_FONT, new FileInputStream("src/fonty/FontleroyBrown.ttf"));
		} catch (FontFormatException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		this.fontPrzycisku = this.fontPrzycisku.deriveFont(46f);
	}
	
	/*
	 * Metoda pozwala pobrac obiekt Font wczesniej zaladownay do tej klasy
	 */
	public Font getFont(){
		return this.fontPrzycisku;
	}

}
