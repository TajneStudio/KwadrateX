package main;

import interfejsy.obiektyEkranow;

/**
 * Główna klasa naszej gry KwadrateX
 * 
 * @author Lukasz
 *
 */
public class main implements obiektyEkranow{
	
	/*
	 * Główna pętla gry
	 */
	public static void main(String args[]){
		oknoGry.wyswietlOknoGry();
		oknoGry.dodajEkrany();
	}
}
