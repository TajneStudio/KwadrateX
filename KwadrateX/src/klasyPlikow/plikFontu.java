package klasyPlikow;

import java.awt.Font;
import java.awt.FontFormatException;
import java.io.FileInputStream;
import java.io.IOException;

public class plikFontu {
	
	private Font fontPrzycisku;
	private String fontSrc;

	public plikFontu(String fontSrc) {
		this.fontSrc = fontSrc;
		this.wczytaj_font();
	}
	
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
	
	public Font getFont(){
		return this.fontPrzycisku;
	}

}
