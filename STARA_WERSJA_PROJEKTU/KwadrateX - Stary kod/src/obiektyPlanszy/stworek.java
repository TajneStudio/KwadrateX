package obiektyPlanszy;

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
	//pozycje stworka
	private double pozycjaX;
	private double pozycjaY;
	
	//kolory stworka
	private Color kolorRamkiStworka = new Color(125,125,125);
	private Color kolorCialaStworka = new Color(212,212,212);
	
	private Color kolorGalkiOcznejStworka = new Color(223,249,245);
	private Color kolorTeczowkiStworka = new Color(0,0,0);
	
	private Color kolorNosaStworka = new Color(60,60,60);
	
	private Color kolorUstStworka = new Color(60,60,60);
	
	//rozmairy stworka
	private int szerokoscStworkaPoczatkowa = 50;
	private int wysokoscKolizyjnaStworkaPoczatkowa = 10;
	private int wysokoscStworkaPoczatkowa = 50;
	
	private double skalaXstworka = 2;
	private double skalaYstworka = 2;
	
	//predkosci stworka
	private int szybkoscStworka = 2;
	private float szybkoscOczuStworka = 0.1f;
	
	//pozycje oczu stworka
	private float pozycjaXoczuStworkaMin = 5;
	private float pozycjaXoczuStworka = 7;
	private float pozycjaXoczuStworkaPodstawowa = 7;
	private float pozycjaXoczuStworkaMax = 9;
	
	private float pozycjaYoczuStworkaMin = 5;
	private float pozycjaYoczuStworka = 7;
	private float pozycjaYoczuStworkaPodstawowa = 7;
	private float pozycjaYoczuStworkaMax = 9;
	
	//grafika stworka
	private BufferedImage plikGraficznyStworka;
	private AffineTransform macierzTransformacjiStworka = new AffineTransform();
	
	//zmienna inicjujaca pierwsze rysownaie stworka
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
		this.animujOczyStworka(this.szybkoscOczuStworka,"prawo");
	}
	
	/*
	 * Metoda obsluguje chodzenie stworka
	 * w lewo
	 */
	public void idzWlewo(){
		this.pozycjaX -= this.szybkoscStworka;
		this.animujOczyStworka(this.szybkoscOczuStworka,"lewo");
	}
	
	/*
	 * Metoda obsluguje chodzenie stworka
	 * w gore
	 */
	public void idzWGore(){
		this.pozycjaY -= this.szybkoscStworka;
		this.animujOczyStworka(this.szybkoscOczuStworka,"gora");
	}
	
	/*
	 * Metoda obsluguje chodzenie stworka
	 * w dol
	 */
	public void idzWdol(){
		this.pozycjaY += this.szybkoscStworka;
		this.animujOczyStworka(this.szybkoscOczuStworka,"dol");
	}
	
	/*
	 * Metoda ustawia podstawowe parametry stweorka
	 */
	public void ustawPodstawoweParametryStworka(){
		this.setBounds(0, 0, this.szerokoscStworkaPoczatkowa, this.wysokoscStworkaPoczatkowa);
		this.plikGraficznyStworka = new BufferedImage( this.getWidth(),this.getHeight(), BufferedImage.TYPE_INT_RGB);
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
	    	Graphics2D bf_draw = this.plikGraficznyStworka.createGraphics();
	    	
	    	//generacja stworka
	    	this.rysujCialoStworka(bf_draw);
	    	this.rysujOczyStworka(bf_draw,5,28);
	    	this.rysujNosStworka(bf_draw, 23, 31);
	    	this.rysujUstaStworka(bf_draw, 12, 32);
	
	    	this.pierwszeRysowanieStworka = false;
    	}
    }
    
    /*
     * Metoda rysuje usta stworka
     * ATRYBUTY:
     * -FLOAT predkoscOczu -> odpowiedzialne za predkosc oczu
     * -STRING kierunek -> gora, prawo, dol, lewo
     */
    public void animujOczyStworka(float predkoscOczu,String kierunek){
    	Graphics2D bf_draw = this.plikGraficznyStworka.createGraphics();
    	
    	if(this.pozycjaYoczuStworka >= this.pozycjaYoczuStworkaMin){
	    	if(kierunek == "gora"){
	    		this.pozycjaYoczuStworka -= predkoscOczu;
	    	}
    	}
	    
	    if(this.pozycjaYoczuStworkaMax >= this.pozycjaYoczuStworka){
	    	if(kierunek == "dol"){
	    		this.pozycjaYoczuStworka += predkoscOczu;
	    	}
    	}
    	
    	if(this.pozycjaXoczuStworkaMax >= this.pozycjaXoczuStworka){
	    	if(kierunek == "prawo"){
	    		this.pozycjaXoczuStworka += predkoscOczu;
	    	}
    	}
    	
    	if(this.pozycjaXoczuStworka >= this.pozycjaXoczuStworkaMin){
	    	if(kierunek == "lewo"){
	    		this.pozycjaXoczuStworka -= predkoscOczu;
	    	}
    	}
    	
    	this.rysujOczyStworka(bf_draw,5,28);
    }
    
    /*
     * Metoda rysuje usta stworka
     */
    public void rysujUstaStworka(Graphics2D bf_draw_pobrany,int x_ust,int y_ust){
    	bf_draw_pobrany.setColor(this.kolorUstStworka);
    	
    	bf_draw_pobrany.drawArc(x_ust, y_ust, 25, 9, 0, -180);
    }
    
    /*
     * Metoda rysuje nos stworka
     */
    public void rysujNosStworka(Graphics2D bf_draw_pobrany,int x_nosa,int y_nosa){
    	bf_draw_pobrany.setColor(this.kolorNosaStworka);
    	bf_draw_pobrany.fillRect(x_nosa, y_nosa, 4, 2);
    	bf_draw_pobrany.fillRect(x_nosa+1, y_nosa-1, 2, 1);
    }
    
    public void rysujOczyStworka(Graphics2D bf_draw_pobrany,int xPierwszegoOka,int xDrugiegoOka){
    	this.rysujOkoStworka(bf_draw_pobrany,xPierwszegoOka,9);
    	this.rysujOkoStworka(bf_draw_pobrany,xDrugiegoOka,9);
    }
    
    /*
     * Mrtoda rysuje pojedyncze oko stworka
     */
    public void rysujOkoStworka(Graphics2D bf_draw_pobrany,int x_oka,int y_oka){
    	//oko wypelnienie
    	bf_draw_pobrany.setColor(this.kolorGalkiOcznejStworka);
    	bf_draw_pobrany.fillOval(x_oka, y_oka, 16, 20);
    	
    	//oko teczowka
        Point2D center = new Point2D.Float(x_oka+1+this.pozycjaXoczuStworka, y_oka+3+this.pozycjaYoczuStworka);
        float radius = 14;
        float[] dist = {0.1f, 0.45f};
        Color[] colors = {this.kolorTeczowkiStworka, this.kolorGalkiOcznejStworka};
        RadialGradientPaint p = new RadialGradientPaint(center, radius, dist, colors);
        bf_draw_pobrany.setPaint(p);

        bf_draw_pobrany.fillOval(x_oka, y_oka, 17, 20);
        
    	//oko ramka
    	bf_draw_pobrany.setColor(this.kolorRamkiStworka);
    	bf_draw_pobrany.drawOval(x_oka, y_oka, 16, 20);
    }
    
    /*
     * Metoda rysuje cialo stworka
     */
    public void rysujCialoStworka(Graphics2D bf_draw_pobrany){
    	//cialo ramka
    	bf_draw_pobrany.setColor(this.kolorRamkiStworka);
    	bf_draw_pobrany.drawRect(0, 0, 49, 49);
    	
    	//cialo wypelenieni
    	bf_draw_pobrany.setColor(this.kolorCialaStworka);
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
    
    /*
     * Getter pozycji X
     */
    public double getStworekX(){
    	return this.pozycjaX;
    }
    /*
     * Getter pozycji Y
     */
    public double getStworekY(){
    	return this.pozycjaY;
    }
    /*
     * Getter szerokosci
     */
    public double getStworekSzerokosc(){
    	return this.plikGraficznyStworka.getWidth()*this.skalaXstworka;
    }
    /*
     * Getter wysokosci
     */
    public double getStworekWysokosc(){
    	return this.plikGraficznyStworka.getHeight()*this.skalaYstworka;
    }
}
