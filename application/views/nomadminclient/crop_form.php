<!-- Chargement de croppie JS -->
  <script src="<?php echo base_url("assets/admin/js/jquery.js"); ?>"></script>
  <script src="<?php echo base_url("assets/admin/js/croppie.js"); ?>"></script>
  
<div class="container">	
	<div id="upload-demo"></div>	
	<strong>Nom membre :</strong>
	<p><input type="text" id="nom" name="nom"></p>
	<strong>Prénom membre :</strong>
	<p><input type="text" id="prenom" name="prenom"></p>
	<strong>Select Image:</strong>
	<p><input type="file" id="upload" name="nomImage" accept="image/*"></p>
	<p><button class="btn btn-success upload-result">Enregister</button></p>  
</div>   
<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});
     
$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	    
    }
    reader.readAsDataURL(this.files[0]);
});
     
$('.upload-result').on('click', function (ev) {
	if($('#nom').val()!="" && $('#prenonm').val()!="" && $('#upload').val()!=""){
		$uploadCrop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function (resp) { 
			$.ajax({
				url:"<?php echo base_url(); ?>"+"ajaxcontroller/upload_croppie/membre",
				type: "POST",
				data: {"image":resp,"file":$('#upload').val(),"nom":$('#nom').val(),"prenom":$('#prenom').val()},
				success: function (data) {
					alert(data);
					window.location = "<?php echo base_url(); ?>"+"nomadminclient";
				}
			});
		});
	}
	else{
		alert("Champ(s) obligatoire(s) non-rempli(s)!");
	}
});  
</script>
