package klasyPomocnicze;
import interfejsy.zmienneGlobalne;

import java.awt.Component;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Image;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;


public class kwadratexObrazek extends Component implements zmienneGlobalne{
	
	private int pozycjaX;
	private int maksymalnyX;
	private int pozycjaY;
	private int maksymalnyY;
	
	private int szerokosc;
	private int wysokosc;
	
	private Dimension rozmiarObrazka;
	
	private File fileImage;
	private String imageSrc;
	private Image obrazek;
	
	/*
	 * Konstruktor tworzacy obrazek na danym x i y
	 */
	public kwadratexObrazek(int x, int y, String zrodloDopliku){
		this.imageSrc = zrodloDopliku;
		this.pobierzObrazek();
		
		this.szerokosc = obrazek.getWidth(null);
		this.wysokosc = obrazek.getHeight(null);
		this.ustawRozmiarKomponentu();
		
		this.pozycjaX = x;
		this.maksymalnyX = szerokoscAplikacji-this.szerokosc;
		this.pozycjaY = y;
		this.maksymalnyY = wysokoscAplikacji-this.wysokosc;
		this.obslugaBlednejPozycji();
		this.ustawPozycjeKomponentu();
	}
	
	/*
	 * Metoda odpowiedzialna za obsluge blednej pozycji
	 */
	public void obslugaBlednejPozycji(){
		if(this.pozycjaX < 0){
			System.out.println();
			System.out.println("-----------OBIEKT KLASY obrazek NIE MIEŚCI SI�? W OKNIE!-----------");
			System.out.println("Element : ("+this.imageSrc+") nie mieści się w widocznym oknie!");
			System.out.println("Maksymalny X dla elementu : ("+this.imageSrc+") to X = 0");
			System.out.println("------------------------------------------------------------------");
			System.out.println();
		}
		if(this.pozycjaX > this.maksymalnyX){
			System.out.println();
			System.out.println("-----------OBIEKT KLASY obrazek NIE MIEŚCI SI�? W OKNIE!-----------");
			System.out.println("Element : ("+this.imageSrc+") nie mieści się w widocznym oknie!");
			System.out.println("Maksymalny X dla elementu : ("+this.imageSrc+") to X = "+this.maksymalnyX);
			System.out.println("------------------------------------------------------------------");
			System.out.println();
		}
		if(this.pozycjaY < 0){
			System.out.println();
			System.out.println("-----------OBIEKT KLASY obrazek NIE MIEŚCI SI�? W OKNIE!-----------");
			System.out.println("Element : ("+this.imageSrc+") nie mieści się w widocznym oknie!");
			System.out.println("Maksymalny Y dla elementu : ("+this.imageSrc+") to Y = 0");
			System.out.println("------------------------------------------------------------------");
			System.out.println();
		}
		if(this.pozycjaY > this.maksymalnyY){
			System.out.println();
			System.out.println("-----------OBIEKT KLASY obrazek NIE MIEŚCI SI�? W OKNIE!-----------");
			System.out.println("Element : ("+this.imageSrc+") nie mieści się w widocznym oknie!");
			System.out.println("Maksymalny Y dla elementu : ("+this.imageSrc+") to Y = "+this.maksymalnyY);
			System.out.println("------------------------------------------------------------------");
			System.out.println();
		}
	}
	
	/*
	 * Metoda ustawia szerokosc i wysokosc obrazka czyt Komponentu
	 */
	public void ustawRozmiarKomponentu(){
		this.rozmiarObrazka = new Dimension(this.szerokosc,this.wysokosc);
		this.setSize(rozmiarObrazka);
	}
	
	/*
	 * Metoda ustawia pozycje Komponentu na JPanel
	 */
	public void ustawPozycjeKomponentu(){
		this.setBounds(this.pozycjaX, this.pozycjaY, this.szerokosc, this.wysokosc);
	}
	
	/*
	 * Metoda pobiera ze strumienia obrazek
	 */
	public void pobierzObrazek(){
		this.fileImage = new File(imageSrc);
		
		try {
			this.obrazek = ImageIO.read(fileImage);
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	/*
	 * (non-Javadoc)
	 * @see java.awt.Component#paint(java.awt.Graphics)
	 */
	public void paint(Graphics g){
		g.drawImage(this.obrazek,0,0,null);
	}
}
