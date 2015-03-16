package widoki;

import java.awt.Dimension;
import java.awt.Frame;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.event.WindowListener;
import java.awt.image.BufferedImage;

import javax.swing.JFrame;

/**
 * 
 * Jest to widok gry, tutaj sa wykonywane obilczenia zwiazane z generacja tego co widzi
 * gracz
 * 
 * @author Lukasz Flak
 *
 */
public class oknoView extends JFrame {
	
	private Dimension rozmiarGry = new Dimension(480,640);
	private BufferedImage oknoDoRysowania;
	
	public oknoView(){
		this.setPreferredSize(rozmiarGry);
		this.setSize(rozmiarGry);
		this.setLocationRelativeTo(null);
		this.setVisible(true);
	}
	
	public void dodajMenuWindowListener(WindowListener oknoListener_pobrany){
		this.addWindowListener(oknoListener_pobrany);
	}
	
	public void ustawOknoDoRysowania(BufferedImage oknoDoRysowania_pobrane){
		this.oknoDoRysowania = oknoDoRysowania_pobrane;
	}
	
	public void uruchomGre(){
		while(true){
			
			this.repaint();
			
			try {
				Thread.sleep(8);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
	
	public void paint(Graphics g){
		Graphics2D g2d = (Graphics2D) g;
		
		this.rysujOkno(g2d);
	}
	
	public void rysujOkno(Graphics2D g2d_pobrany){
		g2d_pobrany.drawImage(oknoDoRysowania,0,0,this);
	}
}
