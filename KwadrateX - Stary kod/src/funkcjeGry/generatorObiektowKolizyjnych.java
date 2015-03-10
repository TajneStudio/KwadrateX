package funkcjeGry;

import java.awt.Graphics2D;

import obiektyPlanszy.obiektKolizyjny;
import klasyPomocnicze.kwadratexGrafika;
import interfejsy.obiektyGraficzne;

/**
 * 
 * W tej klasie bedziemy tworzyc tablice obiektow ktore beda kolidowac z Stworkiem
 * max obiektow na planszy to 64
 * 
 * @author Lukasz Flak
 *
 */
public class generatorObiektowKolizyjnych implements obiektyGraficzne{
	
	private obiektKolizyjny[] tablicaObiektowKolizyjnych = new obiektKolizyjny[64];
	
	/*
	 * Konstruktor wypelnia tabliceObiektowKolizyjnych
	 */
	public generatorObiektowKolizyjnych(){
		this.zaladujObiektyDoTablicy();
	}
	
	/*
	 * Metoda laduje grafiki do obiektow klasy kwadratexGrafika i wstepnie odrysowuje
	 * buffered image
	 */
	public void zaladujGrafikiDoObiektow(Graphics2D g2d_pobrany){
		this.tablicaObiektowKolizyjnych[0].zaladujGrafike(obiektKolizyjnyTest_grafika);
		this.tablicaObiektowKolizyjnych[1].zaladujGrafike(obiektKolizyjnyTest_grafika);
		
		this.tablicaObiektowKolizyjnych[0].paint(g2d_pobrany);
		this.tablicaObiektowKolizyjnych[1].paint(g2d_pobrany);
	}
	
	/*
	 * Metoda laduje obiekty do tablicy
	 */
	public void zaladujObiektyDoTablicy(){
		this.tablicaObiektowKolizyjnych[0] = new obiektKolizyjny(50.0d,50.0d);
		this.tablicaObiektowKolizyjnych[1] = new obiektKolizyjny(300.0d,300.0d);
	}
	
	/*
	 * Metoda rysuje na planszy wszystkie obiekty kolizyjne z tablicy
	 */
	public void rysujObiektyKolizyjne(Graphics2D g2d_pobrany){

		for(int i = 0; i < this.tablicaObiektowKolizyjnych.length; i++){
			//jesli obiekt istnieje to go narysuj
			if(this.tablicaObiektowKolizyjnych[i] != null){
				this.tablicaObiektowKolizyjnych[i].rysuj(g2d_pobrany);
			}
		}
	}
	
	/*
	 * Metoda zwraca utworzona tablice obiektow kolizyjnych
	 */
	public obiektKolizyjny[] gettablicaObiektowKolizyjnych(){
		return this.tablicaObiektowKolizyjnych;
	}
}
