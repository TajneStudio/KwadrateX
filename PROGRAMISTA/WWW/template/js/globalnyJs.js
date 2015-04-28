function typoweKlikniecia(){
	var self = this;
	
	this.idPrzyciskowWroc = $("#backButton");
	
	this.uruchom = function(){
		this.obslugaPrzyciskowWroc();
	}
	
	this.obslugaPrzyciskowWroc = function(){
	
		this.idPrzyciskowWroc.click( function(){
			window.history.back();
		});
	
	}
}


$(document).ready( function(){
	var typoweZdarzenia = new typoweKlikniecia();
	typoweZdarzenia.uruchom();
});