$(document).ready(function(){

	$(document).on("click","#x",function(){
	
		var id_foto=$(this).data('id');
		var seccion=$(this).data('seccion');

		$.post(base_url+'Galeria/eliminar', 
			{id: id_foto }
			, function(data, textStatus, xhr) {
			window.location=base_url+"galeria/index/"+seccion;
		});

	});

});