package timery;

import interfejsy.zmienneGlobalne;

import java.util.TimerTask;

public class glowneZadanieTimera extends TimerTask implements zmienneGlobalne{
	
	public void run(){
		//klawisz w prawo
		if(klawiaturaListener.getKlawiszPrawo() == true){
			stworekUsera.idzWprawo();
		}
		
		if(klawiaturaListener.getKlawiszGora() == true){
			stworekUsera.idzWGore();
		}
		
		if(klawiaturaListener.getKlawiszDol() == true){
			stworekUsera.idzWdol();
		}
		
		if(klawiaturaListener.getKlawiszLewo() == true){
			stworekUsera.idzWlewo();
		}
	}
}
