package generatoryEkranow;

import interfejsy.obiektyGraficzne;
import interfejsy.zmienneGlobalne;

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JPanel;

public class oknoEkranuPomieszczen extends JPanel implements zmienneGlobalne, ActionListener, obiektyGraficzne{
	
	private int szerokoscOkna = szerokoscAplikacji;
	private int wysokoscOkna = wysokoscAplikacji;
	private Color kolorTla;
	
	/*
	 * Konstruktor ustawia layout i rozmiar danego ekranu (nie zmieniamy tego!)
	 */
	public oknoEkranuPomieszczen(){
		this.setLayout(null);
		this.setSize(this.szerokoscOkna,this.wysokoscOkna);
	}
	
	/*
	 * Metoda dodaje komponenty do Ekranu Pomieszczen
	 */
	public void dodajKomponentyEkranuGlownego(){
		this.dodajPrzyciskiEkranuPomieszczen();
		this.dodajGrafikeWTleEkranuPomieszczen();
	}
	
	/*
	 * Metoda dodaje grafike w tle dla Ekranu Pomieszczen
	 */
	public void dodajGrafikeWTleEkranuPomieszczen(){
		this.add(prawyGornyRog);
		this.add(lewyDolnyRog);
		this.add(lewyGornyRog);
		this.add(prawyDolnyRog_Rama);
		
		this.add(sliderLokalizacji);
	}
	/*
	 * Metoda dodaje przycsiki dla ekranu Pomieszczen
	 */
	public void dodajPrzyciskiEkranuPomieszczen(){

	}
	
	/*
	 * Metoda tworzy Ekran Pomieszczen
	 */
	public void stworzEkranPomieszczen(){
		this.dodajKomponentyEkranuGlownego();
		
		this.kolorTla = new Color(36,144,213);
		
		this.setBackground(this.kolorTla);
		this.setVisible(false);
	}
	
	/*
	 * Tutaj sa akcje dla przyciskow ekranu pomieszczen
	 * (non-Javadoc)
	 * @see java.awt.event.ActionListener#actionPerformed(java.awt.event.ActionEvent)
	 */
	@Override
	public void actionPerformed(ActionEvent arg0) {
		
	}

}
