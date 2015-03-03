package timery;

import interfejsy.obiektyEkranow;
import interfejsy.obiektyPlanszy;
import interfejsy.zmienneGlobalne;

import java.util.TimerTask;

/**
 * Klasa jest odpowiedzialna za zadania do wykonania dla glownego Timera
 * Gry, czyli np. obsluga klawiatury
 * 
 * @author Lukasz Flak
 *
 */
public class glowneZadanieTimera extends TimerTask implements zmienneGlobalne, obiektyEkranow, obiektyPlanszy{
	
	public void run(){
		while(true){
			this.uruchomFunkcjeKlawiatury();
			ekranStworka.repaint();
			
			//zatrzymywanie zegara
			try {
				Thread.sleep(klatkiNaSekunde);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}	
	}
	
	/*
	 * Metoda sluzy do obslugi akcji wywolanych przez klawiature
	 */
	public void uruchomFunkcjeKlawiatury(){
		//klawisz w prawo jest wcisniety
		if(klawiaturaListener.getKlawiszPrawo() == true){
			stworekUsera.idzWprawo();
		}
		
		//klawisz w gore jest wcisniety
		if(klawiaturaListener.getKlawiszGora() == true){
			stworekUsera.idzWGore();
		}
		
		//klawisz w dol jest wcisniety
		if(klawiaturaListener.getKlawiszDol() == true){
			stworekUsera.idzWdol();
		}
		
		//klawisz w lewo jest wcisniety
		if(klawiaturaListener.getKlawiszLewo() == true){
			stworekUsera.idzWlewo();
		}
	}
	
}
