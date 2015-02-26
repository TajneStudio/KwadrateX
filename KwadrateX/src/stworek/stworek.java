package stworek;

import interfejsy.obiektyGraficzne;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.RadialGradientPaint;
import java.awt.geom.AffineTransform;
import java.awt.geom.Point2D;
import java.awt.image.BufferedImage;

import javax.swing.JPanel;

/**
 * Klasa zrobiona narazie na potrzeby malego stworka, duzy nie jest brany pod uwage!
 * 
 * TO DO:
 * -Rozbudowa tej klasy, jest ona narazie w bardzo wczesnej fazie
 * 
 * @author Lukasz Flak
 *
 */
public class stworek extends JPanel implements obiektyGraficzne{
	private double pozycjaX;
	private double pozycjaY;
	
	private Color kolorStworka;
	
	private int szerokoscStworkaPoczatkowa = 50;
	private int wysokoscKolizyjnaStworkaPoczatkowa = 10;
	private int wysokoscStworkaPoczatkowa = 50;
	
	private double skalaXstworka = 2;
	private double skalaYstworka = 2;
	
	private int szybkoscStworka = 2;
	
	private BufferedImage plikGraficznyStworka;
	private AffineTransform macierzTransformacjiStworka = new AffineTransform();
	
	private boolean pierwszeRysowanieStworka = true;
	
	/*
	 * Konstruktor tworzacy stworka, x i y to jego pozycje na planszy
	 */
	public stworek(double x, double y){
		this.pozycjaX = x;
		this.pozycjaY = y;
		
		this.ustawPodstawoweParametryStworka();
	}
	
	/*
	 * Metoda obsluguje chodzenie stworka
	 * w prawo
	 */
	public void idzWprawo(){
		this.pozycjaX += this.szybkoscStworka;
	}
	
	/*
	 * Metoda obsluguje chodzenie stworka
	 * w lewo
	 */
	public void idzWlewo(){
		this.pozycjaX -= this.szybkoscStworka;
	}
	
	/*
	 * Metoda obsluguje chodzenie stworka
	 * w gore
	 */
	public void idzWGore(){
		this.pozycjaY -= this.szybkoscStworka;
	}
	
	/*
	 * Metoda obsluguje chodzenie stworka
	 * w dol
	 */
	public void idzWdol(){
		this.pozycjaY += this.szybkoscStworka;
	}
	
	/*
	 * Metoda ustawia podstawowe parametry stweorka
	 */
	public void ustawPodstawoweParametryStworka(){
		this.setBounds(0, 0, this.szerokoscStworkaPoczatkowa, this.wysokoscStworkaPoczatkowa);
		this.setVisible(true);
	}
	
	/*
	 * Metoda generuje stworka
	 * 
	 * (non-Javadoc)
	 * @see javax.swing.JComponent#paint(java.awt.Graphics)
	 */
    public void paint(Graphics g) {
    	if(this.pierwszeRysowanieStworka){
    		this.plikGraficznyStworka = new BufferedImage( this.getWidth(),this.getHeight(), BufferedImage.TYPE_INT_RGB);
	    	Graphics2D bf_draw = this.plikGraficznyStworka.createGraphics();
	    	
	    	//generacja stworka
	    	this.rysujCialoStworka(bf_draw);
	    	this.rysujOkoStworka(bf_draw,5,9);
	    	this.rysujOkoStworka(bf_draw,28,9);
	    	this.rysujNosStworka(bf_draw, 23, 31);
	    	this.rysujUstaStworka(bf_draw, 12, 32);
	
	    	this.pierwszeRysowanieStworka = false;
    	}
    }
    
    /*
     * Metoda rysuje usta stworka
     */
    public void rysujUstaStworka(Graphics2D bf_draw_pobrany,int x_ust,int y_ust){
    	bf_draw_pobrany.setColor(new Color(60,60,60));
    	
    	bf_draw_pobrany.drawArc(x_ust, y_ust, 25, 9, 0, -180);
    }
    
    /*
     * Metoda rysuje nos stworka
     */
    public void rysujNosStworka(Graphics2D bf_draw_pobrany,int x_nosa,int y_nosa){
    	bf_draw_pobrany.setColor(new Color(60,60,60));
    	bf_draw_pobrany.fillRect(x_nosa, y_nosa, 4, 2);
    	bf_draw_pobrany.fillRect(x_nosa+1, y_nosa-1, 2, 1);
    }
    
    /*
     * Mrtoda rysuje pojedyncze oko stworka
     */
    public void rysujOkoStworka(Graphics2D bf_draw_pobrany,int x_oka,int y_oka){
    	//oko wypelnienie
    	bf_draw_pobrany.setColor(new Color(223,249,245));
    	bf_draw_pobrany.fillOval(x_oka, y_oka, 16, 20);
    	
    	//oko teczowka
        Point2D center = new Point2D.Float(x_oka+1+7, y_oka+3+7);
        float radius = 14;
        float[] dist = {0.1f, 0.45f};
        Color[] colors = {new Color(0,0,0), new Color(223,249,245)};
        RadialGradientPaint p = new RadialGradientPaint(center, radius, dist, colors);
        bf_draw_pobrany.setPaint(p);

        bf_draw_pobrany.fillOval(x_oka, y_oka, 16, 20);
        
    	//oko ramka
    	bf_draw_pobrany.setColor(new Color(133,133,133));
    	bf_draw_pobrany.drawOval(x_oka, y_oka, 16, 20);
    }
    
    /*
     * Metoda rysuje cialo stworka
     */
    public void rysujCialoStworka(Graphics2D bf_draw_pobrany){
    	//cialo ramka
    	bf_draw_pobrany.setColor(new Color(125,125,125));
    	bf_draw_pobrany.drawRect(0, 0, 49, 49);
    	
    	//cialo wypelenieni
    	bf_draw_pobrany.setColor(new Color(212,212,212));
    	bf_draw_pobrany.fillRect(1, 1, 48, 48);
    }
    
    /*
     * Metoda ustawia parametry macierzy transformacji stworka takie jak skalowanie czy
     * przesuniecie
     */
    public void ustawParametryMacierzyTransformacjiStworka(Graphics2D g2d_ekranuStworka_pobrany){
    	//resetowanie macierzy transformacji
    	this.macierzTransformacjiStworka.setToIdentity();
    	
    	this.macierzTransformacjiStworka.translate(this.pozycjaX, this.pozycjaY);
    	this.macierzTransformacjiStworka.scale(this.skalaXstworka,this.skalaYstworka);
    	
    	//zaakceptowanie transformacji stworka
    	g2d_ekranuStworka_pobrany.setTransform(this.macierzTransformacjiStworka);
    }
    
    /*
     * Metoda powinna byc wywolana na ekranie rysujacym, pozwala ona na odrysowanie stworka
     * z wszystkimi transformacjami
     */
    public void rysujStworka(Graphics2D g2d_ekranuStworka){
    	
    	this.ustawParametryMacierzyTransformacjiStworka(g2d_ekranuStworka);
    	
    	//odrysuj stworka na ekranie
    	g2d_ekranuStworka.drawImage(this.plikGraficznyStworka,0,0,null);
    	
    }
}
