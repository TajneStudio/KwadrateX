/*START EDYTORY I BAJERY*/
tinymce.init({
    selector: "textarea",
	plugins: "emoticons",
	plugins: "link",
	toolbar: "undo redo | styleselect | bold italic | link image | emoticons"
});

/*END EDYTORY I BAJERY*/
jQuery(function($){
        $.datepicker.regional['pl'] = {
                closeText: 'Zamknij',
                prevText: '&#x3c;Poprzedni',
                nextText: 'Następny&#x3e;',
                currentText: 'Dziś',
                monthNames: ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec',
                'Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'],
                monthNamesShort: ['Sty','Lu','Mar','Kw','Maj','Cze',
                'Lip','Sie','Wrz','Pa','Lis','Gru'],
                dayNames: ['Niedziela','Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota'],
                dayNamesShort: ['Nie','Pn','Wt','Śr','Czw','Pt','So'],
                dayNamesMin: ['N','Pn','Wt','Śr','Cz','Pt','So'],
                weekHeader: 'Tydz',
                dateFormat: 'dd.mm.yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['pl']);
});

$("#news_data").datepicker({
	changeMonth: true,
	changeYear: true,
	dateFormat: "yy-mm-dd"
});
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#zdjecie').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
$("#news_plikGraficzny").change(function(){
	readURL(this);
});
$(".back").click( function(){
	window.location = "<?php echo site_url('panel_admina/newsy'); ?>";
});