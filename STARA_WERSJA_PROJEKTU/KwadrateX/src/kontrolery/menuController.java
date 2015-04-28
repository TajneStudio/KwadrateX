package kontrolery;

import modele.menuModel;
import widoki.menuView;

public class menuController extends oknoController {
	private menuModel model = new menuModel();
	private menuView view = new menuView();
	
	public menuController(){
		this.rysujWidok(view.pobierzGrafikeMenu());
		
	}
}
