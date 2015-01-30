package generatoryEkranow;
import interfejsy.zmienneGlobalne;

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;

import javax.swing.JPanel;

import klasyPomocnicze.kwadratexPrzycisk;
import klasyPomocnicze.obrazek;

/**
 * Klasa tworzaca ekran menu Glownego
 * 
 * @author Lukasz
 *
 */
public class oknoEkranuGlownego extends JPanel implements zmienneGlobalne, ActionListener{
	
	private int szerokoscOkna = szerokoscAplikacji;
	private int wysokoscOkna = wysokoscAplikacji;
	private Color kolorTla;
	
	//Przyciski w obrebie ekranu
	private kwadratexPrzycisk przyciskNowaGra = new kwadratexPrzycisk(165,250,150,46,"Nowa gra");
	private kwadratexPrzycisk przyciskKontynuuj = new kwadratexPrzycisk(160,300,160,46,"Kontynuuj");
	private kwadratexPrzycisk przyciskWyjdz = new kwadratexPrzycisk(185,350,110,46,"Wyjdz");
	
	/*
	 * Konstruktor ustawia layout i rozmiar danego ekranu (nie zmieniamy tego!)
	 */
	public oknoEkranuGlownego(){
		this.setLayout(null);
		this.setSize(this.szerokoscOkna,this.wysokoscOkna);
	}
	
	/*
	 * Metoda dodaje komponenty do Ekranu Głównego
	 */
	public void dodajKomponentyEkranuGlownego(){
		this.dodajPrzyciskiEkranuGlownego();
		
		this.dodajGrafikeWTleEkranuGlownego();
	}
	
	/*
	 * Metoda dodaje grafike w tle dla Ekranu Głównego
	 */
	public void dodajGrafikeWTleEkranuGlownego(){
		obrazek prawyGornyRog = new obrazek(409,0,"src/obrazki/ekranGlowny/prawyGornyRog.png");
		obrazek prawyDolnyRog = new obrazek(288,514,"src/obrazki/ekranGlowny/prawyDolnyRog.png");
		obrazek lewyDolnyRog = new obrazek(0,568,"src/obrazki/ekranGlowny/lewyDolnyRog.png");
		obrazek logoGry = new obrazek(97,24,"src/obrazki/ekranGlowny/logoGry.png");
		obrazek obszarNaPrzyciski = new obrazek(104,218,"src/obrazki/ekranGlowny/obszarNaPrzyciski.png");
		obrazek zajawkaEkranGlowny = new obrazek(63,429,"src/obrazki/ekranGlowny/zajawkaEkranGlowny.png");
		
		this.add(prawyGornyRog);
		this.add(prawyDolnyRog);
		this.add(lewyDolnyRog);
		this.add(logoGry);
		this.add(obszarNaPrzyciski);
		this.add(zajawkaEkranGlowny);
	}
	/*
	 * Metoda dodaje przycsiki dla ekranu g��wnego
	 */
	public void dodajPrzyciskiEkranuGlownego(){
		this.add(this.przyciskNowaGra);
		this.add(this.przyciskKontynuuj);
		this.add(this.przyciskWyjdz);
		
		this.przyciskNowaGra.addActionListener(this);
		this.przyciskWyjdz.addActionListener(this);
	}
	
	/*
	 * Metoda tworzy Ekran Głowny
	 */
	public void stworzEkranGlowny(){
		this.dodajKomponentyEkranuGlownego();
		
		this.kolorTla = new Color(36,144,213);
		
		this.setBackground(this.kolorTla);
		this.setVisible(true);
	}
	
	/*
	 * Tutaj sa akcje dla przyciskow ekranu glownego
	 * (non-Javadoc)
	 * @see java.awt.event.ActionListener#actionPerformed(java.awt.event.ActionEvent)
	 */
	@Override
	public void actionPerformed(ActionEvent e) {
		Object source = e.getSource();
		
		//akcja dla przycisku wyjdz
		if(source == this.przyciskWyjdz){
			System.exit(0);
		}
		
		//akcja dla przycisku nowa gra
		if(source == this.przyciskNowaGra){
			//ukrywamy ekran glownego menu
			this.setVisible(false);
		}
		
	}
}
