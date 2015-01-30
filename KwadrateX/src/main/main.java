package main;

import interfejsy.obiekty;

/**
 * Główna klasa naszej gry KwadrateX
 * 
 * @author Lukasz
 *
 */
public class main implements obiekty{
	
	/*
	 * Główna pętla gry
	 */
	public static void main(String args[]){
		oknoGry.wyswietlOknoGry();
		oknoGry.dodajEkrany();
	}
}
