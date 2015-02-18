package generatoryEkranow;
import interfejsy.obiektyEkranow;
import interfejsy.obiektyGraficzne;
import interfejsy.zmienneGlobalne;

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JPanel;

import klasyPomocnicze.kwadratexPrzycisk;

/**
 * Klasa tworzaca ekran menu Glownego
 * 
 * @author Lukasz Flak
 *
 */
public class oknoEkranuGlownego extends JPanel implements zmienneGlobalne, ActionListener, obiektyGraficzne, obiektyEkranow{
	
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
	 * Metoda dodaje komponenty do Ekranu Glownego
	 */
	public void dodajKomponentyEkranuGlownego(){
		this.dodajPrzyciskiEkranuGlownego();
		
		this.dodajGrafikeWTleEkranuGlownego();
	}
	
	/*
	 * Metoda dodaje grafike w tle dla Ekranu GÅ‚Ã³wnego
	 */
	public void dodajGrafikeWTleEkranuGlownego(){
		this.add(prawyGornyRog);
		this.add(prawyDolnyRog);
		this.add(lewyDolnyRog);
		this.add(logoGry);
		this.add(obszarNaPrzyciski);
		this.add(zajawkaEkranGlowny);
	}
	/*
	 * Metoda dodaje przycsiki dla ekranu g³ównego
	 */
	public void dodajPrzyciskiEkranuGlownego(){
		this.add(this.przyciskNowaGra);
		this.add(this.przyciskKontynuuj);
		this.add(this.przyciskWyjdz);
		
		this.przyciskNowaGra.addActionListener(this);
		this.przyciskWyjdz.addActionListener(this);
	}
	
	/*
	 * Metoda tworzy Ekran Glowny
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
			ekranPomieszczen.setVisible(true);
		}
		
	}
}
