package main;
import interfejsy.obiekty;
import interfejsy.zmienneGlobalne;

import java.awt.Dimension;

import javax.swing.JFrame;
/**
 * Klasa tworząca Główne oknno gry
 * 
 * @author Lukasz
 *
 */
public class okno extends JFrame implements zmienneGlobalne, obiekty{
	
	private int szerokosc = szerokoscAplikacji;
	private int wysokosc = wysokoscAplikacji;
	
	/*
	 * Metoda ustawiająca opcje okna
	 */
	public okno(){
		this.setLayout(null);
		this.setSize(this.szerokosc+6, this.wysokosc+28);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.setLocationRelativeTo(null);
		this.setResizable(false);
		this.setTitle(this.tytulGry);
	}
	
	/*
	 * Metoda dodaje odopowiednie ekrany
	 */
	public void dodajEkrany(){
		this.add(ekranGlowny);
		ekranGlowny.stworzEkranGlowny();
	}
	
	/*
	 * Metoda wyswietla okno Gry
	 */
	public void wyswietlOknoGry(){
		this.setVisible(true);
	}
	
}