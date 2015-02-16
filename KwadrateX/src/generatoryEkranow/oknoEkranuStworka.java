package generatoryEkranow;

import interfejsy.obiektyEkranow;
import interfejsy.obiektyGraficzne;
import interfejsy.zmienneGlobalne;

import java.awt.Color;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;

import javax.swing.JPanel;

public class oknoEkranuStworka extends JPanel implements zmienneGlobalne, obiektyGraficzne{
	
	private int szerokoscOkna = szerokoscAplikacji;
	private int wysokoscOkna = wysokoscEkranuStworka;
	private Color kolorTla;
	
	int pozycjaX;
	int pozycjaY;
	
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
	 * Metoda dodaje komponenty do Ekranu Stworka
	 */
	public void dodajKomponentyEkranuStworka(){
		this.dodajStworka();
		
		this.dodajObiektyGraficzne();
	}
	
	/*
	 * Metoda dodaje stworka na plansze
	 */
	public void dodajStworka(){
		this.add(stworekUsera);
	}
	
	/*
	 * Metoda dodaje obiekty graficzne do Ekranu Stworka
	 */
	public void dodajObiektyGraficzne(){
		this.add(ekranStworkaRamaGora);
		this.add(ekranStworkaRamaDol);
	}
	
	/*
	 * Metoda tworzy Ekran Stworka
	 */
	public void stworzEkranStworka(){
		this.dodajKomponentyEkranuStworka();
		
		this.kolorTla = new Color(255,255,255);
		this.setBackground(this.kolorTla);

		this.setVisible(true);
	}

	
}
