$('#tabelka_edycji').DataTable({
		"data": <?php echo $pobrana_lista_rzeczy; ?>,
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
			"data": "rzeczy_id",
			"class": "rzeczy_id"
			},
			{ 
			"data": "rzeczy_nazwa" 
			},
			{ 
			"data": "kategorie_nazwa" 
			},
			{ 
			"data": "typy_nazwa" 
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
	window.location = "<?php echo site_url('panel_admina/dodaj_rzecz'); ?>";
});

$(".edytuj").click( function(){
	var rzecz_id = $(this).closest("tr").find("td.rzeczy_id").text();
	window.location = "<?php echo site_url('panel_admina/edytuj_rzecz'); ?>"+"/"+rzecz_id;
});

$(".usun").click( function(){
	var rzecz_id = $(this).closest("tr").find("td.rzeczy_id").text();
    if (confirm("UWAGA! Czy na pewno chcesz usunąć przedmiot o id: "+rzecz_id+" ?") == true) {
        window.location = "<?php echo site_url('panel_admina/usun_rzecz'); ?>"+"/"+rzecz_id;
    } else {

    }
});