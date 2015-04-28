$('#tabelka_edycji').DataTable({
		"data": <?php echo $pobrana_lista_newsy; ?>,
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
			"data": "news_id",
			"class": "news_id"
			},
			{ 
			"data": "news_tytul" 
			},
			{ 
			"data": "news_data" 
			},
			{ 
			"data": "news_stworzonyPrzez" 
			},
			{ 
			"data": "news_edytowanyPrzez" 
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
	window.location = "<?php echo site_url('panel_admina/dodaj_newsy'); ?>";
});

$(".edytuj").click( function(){
	var news_id = $(this).closest("tr").find("td.news_id").text();
	window.location = "<?php echo site_url('panel_admina/edytuj_newsy'); ?>"+"/"+news_id;
});

$(".usun").click( function(){
	var news_id = $(this).closest("tr").find("td.news_id").text();
    if (confirm("UWAGA! Czy na pewno chcesz usunąć news o id: "+news_id+" ?") == true) {
        window.location = "<?php echo site_url('panel_admina/usun_newsy'); ?>"+"/"+news_id;
    } else {

    }
});