package main;

import interfejsy.obiektyEkranow;
import interfejsy.zmienneGlobalne;

import javax.swing.JFrame;
/**
 * Klasa tworzaca glowne oknno gry
 * 
 * @author Lukasz Flak
 *
 */
public class okno extends JFrame implements zmienneGlobalne, obiektyEkranow{
	
	private int szerokosc = szerokoscAplikacji;
	private int wysokosc = wysokoscAplikacji;
	
	/*
	 * Metoda ustawiajaca opcje okna
	 */
	public okno(){
		this.setLayout(null);
		this.setSize(this.szerokosc+6, this.wysokosc+28);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.setLocationRelativeTo(null);
		this.setResizable(false);
		this.setTitle(this.tytulGry);
		

		this.dodajObslugeKlawiatury();
		this.dodajTimerGry();
	}
	
	/*
	 * Metoda dodaje odopowiednie ekrany
	 */
	public void dodajEkrany(){
		this.add(ekranGlowny);
		ekranGlowny.stworzEkranGlowny();
		
		this.add(ekranPomieszczen);
		ekranPomieszczen.stworzEkranPomieszczen();
	}
	
	/*
	 * Metoda dodaje glowny Timer do gry
	 */
	public void dodajTimerGry(){
		zegarGry.schedule(glowneZadania, 0);
	}
	
	/*
	 * Metoda dodaje obsluge klawiatury
	 */
	public void dodajObslugeKlawiatury(){
		this.addKeyListener(klawiaturaListener);
		this.setFocusable(true);
	}
	
	/*
	 * Metoda wyswietla okno Gry
	 */
	public void wyswietlOknoGry(){
		this.setVisible(true);
	}
}