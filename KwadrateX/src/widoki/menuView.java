package widoki;

import java.awt.Graphics2D;
import java.awt.image.BufferedImage;

public class menuView {
	
	private BufferedImage oknoMenu;
	
	public menuView(){
		Graphics2D g2d = (Graphics2D) oknoMenu.getGraphics();
		g2d.drawLine(0, 0, 100, 100);
	}
	
	public BufferedImage pobierzGrafikeMenu(){
		return this.oknoMenu;
	}
	
}
