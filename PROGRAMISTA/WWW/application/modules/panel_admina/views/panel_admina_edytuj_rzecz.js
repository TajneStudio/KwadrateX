/*START EDYTORY I BAJERY*/
tinymce.init({
    selector: "textarea",
	plugins: "emoticons",
	plugins: "link",
	toolbar: "undo redo | styleselect | bold italic | link image | emoticons"
});

/*END EDYTORY I BAJERY*/
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#zdjecie').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}
$("#rzeczy_plikGraficzny").change(function(){
	readURL(this);
});

$(".back").click( function(){
	window.location = "<?php echo site_url('panel_admina/rzeczy'); ?>";
});