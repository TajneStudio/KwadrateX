package listenery;

import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

public class klawiaturaOpcje implements KeyListener {

	private boolean klawiszGora = false;
	private boolean klawiszPrawo = false;
	private boolean klawiszDol = false;
	private boolean klawiszLewo = false;
	
	public boolean getKlawiszPrawo(){
		return this.klawiszPrawo;
	}
	public boolean getKlawiszGora(){
		return this.klawiszGora;
	}
	public boolean getKlawiszLewo(){
		return this.klawiszLewo;
	}
	public boolean getKlawiszDol(){
		return this.klawiszDol;
	}
	
	@Override
	public void keyPressed(KeyEvent e) {
		// TODO Auto-generated method stub
		if(e.getKeyCode() == 87){
			this.klawiszGora = true;
		}
		
		if(e.getKeyCode() == 68){
			this.klawiszPrawo = true;
		}
		
		if(e.getKeyCode() == 83){
			this.klawiszDol = true;
		}
		
		if(e.getKeyCode() == 65){
			this.klawiszLewo = true;
		}
	}

	@Override
	public void keyReleased(KeyEvent e) {
		// TODO Auto-generated method stub
		if(e.getKeyCode() == 87){
			this.klawiszGora = false;
		}
		
		if(e.getKeyCode() == 68){
			this.klawiszPrawo = false;
		}
		
		if(e.getKeyCode() == 83){
			this.klawiszDol = false;
		}
		
		if(e.getKeyCode() == 65){
			this.klawiszLewo = false;
		}
	}

	@Override
	public void keyTyped(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

}
