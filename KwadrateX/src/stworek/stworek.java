package stworek;

import java.awt.Color;

import javax.swing.JLayeredPane;
import javax.swing.JPanel;

/**
 * Klasa zrobiona narazie na potrzeby malego stworka, duzy nie jest brany pod uwage!
 * 
 * @author Alien
 *
 */
public class stworek extends JPanel{
	private int pozycjaX;
	private int pozycjaY;
	
	private Color kolorStworka;
	
	private int szerokoscStworkaMalego = 50;
	private int wysokoscKolizyjnaStworkaMalego = 10;
	private int wysokoscStworkaMalego = 50;
	
	private int szerokoscStworkaDuzego;
	private int wysokoscKolizyjnaStworkaDuzego;
	private int wysokoscStworkaDuzego;
	
	/*
	 * Konstruktor tworzacy stworka, x i y to jego pozycje na planszy
	 */
	public stworek(int x, int y){
		this.pozycjaX = x;
		this.pozycjaY = y;
		
		this.aktualizujPozycjeStworka();
		this.ustawPodstawoweParametryStworka();
	}
	
	/*
	 * Metoda stawia stworka w odpowiednim miejscu na mapie
	 */
	public void aktualizujPozycjeStworka(){
		this.setBounds(this.pozycjaX, this.pozycjaY, this.szerokoscStworkaMalego, this.wysokoscStworkaMalego);
	}
	
	public void idzWprawo(){
		this.pozycjaX++;
		this.aktualizujPozycjeStworka();
	}
	
	public void idzWlewo(){
		this.pozycjaX--;
		this.aktualizujPozycjeStworka();
	}
	
	public void idzWGore(){
		this.pozycjaY--;
		this.aktualizujPozycjeStworka();
	}
	
	public void idzWdol(){
		this.pozycjaY++;
		this.aktualizujPozycjeStworka();
	}
	
	/*
	 * Metoda ustawia podstawowe parametry stweorka
	 */
	public void ustawPodstawoweParametryStworka(){
		
		this.kolorStworka = new Color(0,255,0);
		this.setBackground(this.kolorStworka);
		
		this.setVisible(true);
	}
}
