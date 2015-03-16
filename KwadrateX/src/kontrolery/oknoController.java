package kontrolery;

import java.awt.event.WindowEvent;
import java.awt.event.WindowListener;
import java.awt.image.BufferedImage;

import modele.oknoModel;
import widoki.oknoView;

/**
 * 
 * Kontroller koordynuje interackje miedzy widokiem a modelem
 * jak rowniez posiada wszystkie action listenery do widoku
 * 
 * @author Lukasz Flak
 *
 */
public class oknoController {

	private oknoModel model = new oknoModel();
	private oknoView view = new oknoView();
	
	public oknoController(){
		//dodaj sluchacza okna
		
		this.view.dodajMenuWindowListener(new oknoListener());
		
		this.view.uruchomGre();
		
	}
	
	public void rysujWidok(BufferedImage grafikaWidoku){
		view.ustawOknoDoRysowania(grafikaWidoku);
	}
	
	class oknoListener implements WindowListener{

		@Override
		public void windowActivated(WindowEvent arg0) {
			// TODO Auto-generated method stub
			
		}

		@Override
		public void windowClosed(WindowEvent arg0) {
			// TODO Auto-generated method stub
			
		}

		@Override
		public void windowClosing(WindowEvent arg0) {
			// TODO Auto-generated method stub
			System.exit(0);
		}

		@Override
		public void windowDeactivated(WindowEvent arg0) {
			// TODO Auto-generated method stub
			
		}

		@Override
		public void windowDeiconified(WindowEvent arg0) {
			// TODO Auto-generated method stub
			
		}

		@Override
		public void windowIconified(WindowEvent arg0) {
			// TODO Auto-generated method stub
			
		}

		@Override
		public void windowOpened(WindowEvent arg0) {
			// TODO Auto-generated method stub
			
		}
		
	}
	
}
