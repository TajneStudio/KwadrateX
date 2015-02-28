package generatoryEkranow;

import interfejsy.obiektyGraficzne;
import interfejsy.zmienneGlobalne;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;

import javax.swing.JPanel;

/**
 * Klasa tworzy ekran Storka
 * (ten po ktorym porusza sie stworek)
 * 
 * @author Lukasz Flak
 *
 */
public class oknoEkranuStworka extends JPanel implements zmienneGlobalne, obiektyGraficzne{
	
	private int szerokoscOkna = szerokoscAplikacji;
	private int wysokoscOkna = wysokoscEkranuStworka;
	private Color kolorTla;
	
	int pozycjaX;
	int pozycjaY;
	
	private boolean pierwszeRysowaniePlanszy = true;
	
	/*
	 * Konstruktor ustawia layout i rozmiar danego ekranu (nie zmieniamy tego!)
	 */
	public oknoEkranuStworka(int x, int y){
		this.pozycjaX = x;
		this.pozycjaY = y;
		
		this.setLayout(null);
		this.setSize(this.szerokoscOkna,this.wysokoscOkna);
		
		this.setBounds(this.pozycjaX, this.pozycjaY, this.szerokoscOkna, this.wysokoscOkna);
	}
	
	/*
	 * Metoda tworzy Ekran Stworka
	 */
	public void stworzEkranStworka(){
		this.setVisible(true);
	}
	
	/*
	 * Metoda rysuje cala plansze i obiekty ktore ona zawiera
	 * 
	 * (non-Javadoc)
	 * @see javax.swing.JComponent#paint(java.awt.Graphics)
	 */
	public void paint(Graphics g) {
		
		Graphics2D g2d = ( Graphics2D ) g;
		
		
		if(this.pierwszeRysowaniePlanszy){
			stworekUsera.paint(g2d);
			this.pierwszeRysowaniePlanszy = false;
		}
		
		g2d.setColor(new Color(255,255,255));
		g2d.fillRect(0, 0, 300, 400);
		
		this.dodajStworka(g2d);
		
	}
	
	/*
	 * Metoda dodaje stworka na plansze
	 */
	public void dodajStworka(Graphics2D g2d_pobrany){
		stworekUsera.rysujStworka(g2d_pobrany);
	}
	
	/*
	 * Nadpisanie metody update pozwoli na przyspieszenie dzia³ania aplikacji
	 * 
	 * (non-Javadoc)
	 * @see javax.swing.JComponent#update(java.awt.Graphics)
	 */
	public void update(Graphics g){
		
	}
	
}