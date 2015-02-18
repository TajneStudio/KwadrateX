package timery;

import interfejsy.zmienneGlobalne;

import java.util.TimerTask;

/**
 * Klasa jest odpowiedzialna za zadania do wykonania dla glownego Timera
 * Gry, czyli np. obsluga klawiatury
 * 
 * @author Lukasz Flak
 *
 */
public class glowneZadanieTimera extends TimerTask implements zmienneGlobalne{
	
	public void run(){
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
