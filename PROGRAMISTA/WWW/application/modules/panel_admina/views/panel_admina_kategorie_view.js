$('#tabelka_edycji').DataTable({
		"data": <?php echo $pobrana_lista_kategorii; ?>,
        "language": {
            "lengthMenu": "Wyświetl _MENU_ rekordów na stronę",
            "zeroRecords": "Baza danych jest pusta",
            "info": "Oglądasz stronę _PAGE_ z _PAGES_",
			"search": "Szukaj:",
            "infoEmpty": "Brak danych",
            "infoFiltered": "(filtrowane z _MAX_ total rekordów)"
        },
		"columns": [
			{ 
			"data": "kategorie_id",
			"class": "kategorie_id"
			},
			{ 
			"data": "kategorie_nazwa" 
			},
			{ 
			"data": "kategorie_ilosc_przedmioty",
			"class": "kategorie_ilosc_przedmioty"
			},
			{
			"data": function(data){
						var button_edytuj = '<button type="button" class="btn btn-info btn-md edytuj">Edytuj</button>';
						var button_usun = '<button type="button" class="btn btn-danger btn-md usun">Usuń</button>';
						return button_edytuj+" "+button_usun;
					},
			"orderable": false,
			"class": "text-center",
			"searchable": false,
			},
		]
});

$(".dodaj").click( function(){
	window.location = "<?php echo site_url('panel_admina/dodaj_kategorie'); ?>";
});

$(".edytuj").click( function(){
	var kategoria_id = $(this).closest("tr").find("td.kategorie_id").text();
	window.location = "<?php echo site_url('panel_admina/edytuj_kategorie'); ?>"+"/"+kategoria_id;
});

$(".usun").click( function(){
	var ilosc_przedmiotow_w_kategorii = parseInt($(this).closest("tr").find("td.kategorie_ilosc_przedmioty").text());
	var kategoria_id = $(this).closest("tr").find("td.kategorie_id").text();
	
	if(ilosc_przedmiotow_w_kategorii  > 0){
		alert("UWAGA! Kategoria o id: "+kategoria_id+" posiada przypisane do niej przedmioty!");
	} else {
		
		if (confirm("UWAGA! Czy na pewno chcesz usunąć kategorie o id: "+kategoria_id+" ?") == true) {
			window.location = "<?php echo site_url('panel_admina/usun_kategorie'); ?>"+"/"+kategoria_id;
		} else {

		}
	}
});