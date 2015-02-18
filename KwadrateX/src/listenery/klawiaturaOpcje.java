package listenery;

import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

/**
 * Listener klawiatury, tutaj jest obsluga wszystkich klawiszy w grze
 * 
 * UWAGA! nalezy pamietac ze kazdy klawisz zmienia wartosc boolowska czy jest
 * klikniety czy nie!
 * 
 * @author Lukasz Flak
 *
 */
public class klawiaturaOpcje implements KeyListener {

	private boolean klawiszGora = false;
	private boolean klawiszPrawo = false;
	private boolean klawiszDol = false;
	private boolean klawiszLewo = false;
	
	/*
	 * Getter klawisza D
	 */
	public boolean getKlawiszPrawo(){
		return this.klawiszPrawo;
	}
	
	/*
	 * Getter klawisza W
	 */
	public boolean getKlawiszGora(){
		return this.klawiszGora;
	}
	
	/*
	 * Getter klawisza A
	 */
	public boolean getKlawiszLewo(){
		return this.klawiszLewo;
	}
	
	/*
	 * Getter klawisza S
	 */
	public boolean getKlawiszDol(){
		return this.klawiszDol;
	}
	
	@Override
	public void keyPressed(KeyEvent e) {
		// TODO Auto-generated method stub
		
		//klawisz W
		if(e.getKeyCode() == 87){
			this.klawiszGora = true;
		}
		
		//klawisz D
		if(e.getKeyCode() == 68){
			this.klawiszPrawo = true;
		}
		
		//klawisz S
		if(e.getKeyCode() == 83){
			this.klawiszDol = true;
		}
		
		//klawisz A
		if(e.getKeyCode() == 65){
			this.klawiszLewo = true;
		}
	}

	@Override
	public void keyReleased(KeyEvent e) {
		// TODO Auto-generated method stub
		
		//klawisz W
		if(e.getKeyCode() == 87){
			this.klawiszGora = false;
		}
		
		//klawisz D
		if(e.getKeyCode() == 68){
			this.klawiszPrawo = false;
		}
		
		//klawisz S
		if(e.getKeyCode() == 83){
			this.klawiszDol = false;
		}
		
		//klawisz A
		if(e.getKeyCode() == 65){
			this.klawiszLewo = false;
		}
	}

	@Override
	public void keyTyped(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

}
