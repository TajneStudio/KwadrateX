package main;

import interfejsy.obiektyEkranow;

/**
 * Glowna klasa gry KwadrateX
 * 
 * @author Lukasz Flak
 *
 */
public class main implements obiektyEkranow{
	
	/*
	 * Glowna metoda gry
	 */
	public static void main(String args[]){
		oknoGry.wyswietlOknoGry();
		oknoGry.dodajEkrany();
	}
}
