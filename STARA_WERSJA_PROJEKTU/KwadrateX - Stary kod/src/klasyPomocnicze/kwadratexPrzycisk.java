package klasyPomocnicze;

import interfejsy.obiektyCzcionek;

import java.awt.Color;
import java.awt.Cursor;
import java.awt.Graphics;

import javax.swing.JButton;

/**
 * Klasa tworzaca przycisk tekstowy, ktory mozna pozniej
 * spokojnie dodac do JLabel
 * 
 * TO DO:
 * -trzeba dodac przycisk graficzny(grafika musi byc ladowana z klasy kwadratexObrazek!)
 * 
 * @author Lukasz Flak
 *
 */
public class kwadratexPrzycisk extends JButton implements obiektyCzcionek{
	private int szerokosc_przycsiku;
	private int wysokosc_przycsiku;
	private int pozycjaX;
	private int pozycjaY;
	private String tekst_przycisku;
	
	/*
	 * Konstruktor tworzacy przycisk na podanej x,y o okreslonych szerokosciach i odpowiednim stringu
	 */
	public kwadratexPrzycisk(int x, int y, int szerokosc, int wysokosc, String tekstButtona){
		this.szerokosc_przycsiku = szerokosc;
		this.wysokosc_przycsiku = wysokosc;
		this.tekst_przycisku = tekstButtona;
		this.pozycjaY = y;
		this.pozycjaX = x;
		
		this.ustawPozycjeKomponentu();
		
		this.setFont(fontGry.getFont());
		
		this.setOpaque(false);
		this.setContentAreaFilled(false);
		this.setBorderPainted(false);
		this.setFocusPainted(false);
		
		this.setText(tekstButtona);
		
		this.setForeground(new Color(65,65,65));
		this.setCursor(new Cursor(Cursor.HAND_CURSOR));
		
		this.uruchom_najechanie_na_przycisk_akcja();
	}
	
	/*
	 * Metoda ustawia pozycje Komponentu na JLabel
	 */
	public void ustawPozycjeKomponentu(){
		this.setBounds(this.pozycjaX, this.pozycjaY, this.szerokosc_przycsiku, this.wysokosc_przycsiku);
	}
	
	/*
	 * Metoda uruchamia akcje po najechaniu myszka na przycisk, w tym przypadku
	 * bedzie to zmiana koloru
	 */
	public void uruchom_najechanie_na_przycisk_akcja(){

		this.addMouseListener(new java.awt.event.MouseAdapter() {
		    public void mouseEntered(java.awt.event.MouseEvent evt) {
		    	evt.getComponent().setForeground(new Color(36,144,213));
		    }
		    public void mouseExited(java.awt.event.MouseEvent evt) {
		    	evt.getComponent().setForeground(new Color(65,65,65));
		    }
		});
		
	}
	
	/*
	 * (non-Javadoc)
	 * @see javax.swing.JComponent#paintComponent(java.awt.Graphics)
	 */
	public void paintComponent(Graphics g) {
		super.paintComponent(g);
	}
	
}
