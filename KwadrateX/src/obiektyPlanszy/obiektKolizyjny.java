package obiektyPlanszy;

import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.AffineTransform;
import java.awt.image.BufferedImage;

import javax.swing.JPanel;

import klasyPomocnicze.kwadratexObrazek;

/**
 * 
 * Klasa abstrakcyjna odpowiadajaca za szkielet dla obiektow ktore rysuja
 * na planszy stworka kopiujemy ta klase wszedzie tam gdzie bedziemy uzywac grafiki
 * 
 * @author Lukasz Flak
 *
 */
public class obiektKolizyjny extends JPanel {
	
	private double pozycjaX;
	private double pozycjaY;
	
	//grafika
	private BufferedImage plikGraficzny;
	private BufferedImage obrazekZewnetrzny;
	private AffineTransform macierzTransformacji = new AffineTransform();
	private boolean pierwszeRysowanie = true;
	
	/*
	 * Konstruktor tworzacy grafike, x i y to pozycje na planszy
	 */
	public obiektKolizyjny(double x, double y){
		this.pozycjaX = x;
		this.pozycjaY = y;
		
		this.ustawPodstawoweParametry();
	}
	
	/*
	 * Metoda laduje grafike do obiektu utworzonoego w ramach tej klasy
	 */
	public void zaladujGrafike(kwadratexObrazek obrazek_pobrany){
		this.obrazekZewnetrzny = obrazek_pobrany.getObrazek();
	}
	
	/*
	 * Metoda ustawia podstawowe parametry
	 */
	public void ustawPodstawoweParametry(){
		this.setBounds(0, 0, 0, 0);
		this.setVisible(true);
	}
	
	/*
	 * Metoda generuje grafike
	 * 
	 * (non-Javadoc)
	 * @see javax.swing.JComponent#paint(java.awt.Graphics)
	 */
    public void paint(Graphics g) {
    	if(this.pierwszeRysowanie){
    		this.plikGraficzny = new BufferedImage( obrazekZewnetrzny.getWidth(),obrazekZewnetrzny.getHeight(), BufferedImage.TYPE_INT_RGB);
	    	Graphics2D bf_draw = this.plikGraficzny.createGraphics();
	    	
	    	//generacja grafiki
	    	bf_draw.drawImage(obrazekZewnetrzny, 0, 0, null);
	
	    	this.pierwszeRysowanie = false;
    	}
    }
    
    /*
     * Metoda ustawia parametry macierzy transformacji takie jak skalowanie czy
     * przesuniecie
     */
    public void ustawParametryMacierzyTransformacji(Graphics2D g2d_ekranuStworka_pobrany){
    	//resetowanie macierzy transformacji
    	this.macierzTransformacji.setToIdentity();
    	
    	//przesuniecie
    	this.macierzTransformacji.translate(this.pozycjaX, this.pozycjaY);
    	
    	//zaakceptowanie transformacji stworka
    	g2d_ekranuStworka_pobrany.setTransform(this.macierzTransformacji);
    }
    
    /*
     * Metoda powinna byc wywolana na ekranie rysujacym, pozwala ona na odrysowanie grafiki
     * z wszystkimi transformacjami
     */
    public void rysuj(Graphics2D g2d_ekranuStworka){
    	
    	this.ustawParametryMacierzyTransformacji(g2d_ekranuStworka);
    	
    	//odrysuj stworka na ekranie
    	g2d_ekranuStworka.drawImage(this.plikGraficzny,0,0,null);
    	
    }
	
}
