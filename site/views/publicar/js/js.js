"use strict";

Dropzone.autoDiscover = false;

	$("#carga-img").Dropzone({ 
		url: base_url+'flores/publicar/upfile',
		autoProcessQueue:false,
		parallelUploads: 7,
		uploadMultiple: true
	});

$('#btn_enviar').click(function() {
	
    var myDropzone = Dropzone.forElement(".dropzone");


    myDropzone.on('sending', function(file, xhr, formData){


 
    	formData.append('titulo',$('#titulo').val());
    	formData.append('descrip',$('#descrip').val());
    	formData.append('categ',$('#categ').val());

	});
	 
    myDropzone.processQueue();
    myDropzone.on('success', function(){
     // $(".loader").fadeIn("slow");
   // window.location.href=base_url+'listar/index/'+$("#email-usuario").val();
    });
});