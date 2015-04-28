package interfejsy;

import java.util.Timer;

import obiektyPlanszy.stworek;
import listenery.klawiaturaOpcje;
import timery.glowneZadanieTimera;

/**
 * Interfjes zawierajacy zmienne Globalne gry
 * 
 * UWAGA! Tutaj wrzucamy zmienne statyczne, ktore nigdy nie zmienia swojej
 * wartosci, a przydadza sie w weikszej ilosci klas
 * 
 * @author Lukasz Flak
 *
 */
public interface zmienneGlobalne {
	String tytulGry = "KwadrateX";
	int szerokoscAplikacji = 480;
	int wysokoscAplikacji = 640;
	
	int wysokoscEkranuStworka = 501;
	
	//120fps zatrzymanie 1000/120 ok. 8
	long klatkiNaSekunde = 8;
	
	//obsluga zdarzen klawiatury
	klawiaturaOpcje klawiaturaListener = new klawiaturaOpcje();
	
	//timer
	Timer zegarGry = new Timer();
	//zadania timera
	glowneZadanieTimera glowneZadania = new glowneZadanieTimera();
}
