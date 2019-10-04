$(document).ready(function(){


	$(document).on("click",".enlace_repor",function(){

		var html="";


		if(this.dataset.nombre=="proveedor"){
			html+="<div id='tipopo'>balance cuentas por pagar</div>";
			html+="<form id='filtro'>";
			html+="<label>RIF</label>";
			html+="<input id='pro_rif'>";
			
			html+='<div class="cont_btn">';
			html+='<button class="btn btn-success" id="generar_pdf_proveedor" type="button" >generar</button>';
			
			html+='<div>';
					
			html+="</form>";

			$("#contenido").html(html);

				$(document).on("click","#generar_pdf_proveedor",function(){

				location.href=base_url+"pdf/generar_pdf_proveedor?rif="+$("#pro_rif").val();
			})



		}
		if(this.dataset.nombre=="transacciones"){

			html+="<div id='tipopo'>reportes transacciones</div>";
			html+="<form id='filtro'>";
			html+="<label>RIF</label>";
			html+="<input id='pro_rif'>";
			
			html+='<div class="cont_btn">';
			html+='<button class="btn btn-success" id="generar_pdf_transaccion" type="button" >generar</button>';
			
			html+='<div>';
					
			html+="</form>";

			$("#contenido").html(html);

				$(document).on("click","#generar_pdf_transaccion",function(){

				location.href=base_url+"pdf/reporte_transancciones?rif="+$("#pro_rif").val();
			})



		}
		if(this.dataset.nombre=="cheque"){
			html+="<div id='tipopo'>cheque</div>";
			
			html+="<form id='filtro'>";
			html+="<label>estado de cheque</label>";
			html+="<select name='' id='estado_cheque'>";
			html+="<option value=''>--Seleccione--</option>";
			html+="<option value='todos'>todos</option>";	
			html+="<option value='cancelado'>Cancelado</option>";	
			html+="<option value='activo'>Activo</option>";	
			html+="<option value='posfechado'>Posfechado</option>";	
			html+="</select>";				


			
			

			html+="<div id='mensjj'></div>";


			html+="<label>codigo orden de pago</label>";
			html+="<input id='codigo_orden'>";
			
			html+='<div class="cont_btn">';
			html+='<button  class="btn btn-success" disabled="disabled" id="generar_cheque" type="button" >generar</button>';
			
			html+='<div>';
					
			html+="</form>";

			

			$("#contenido").html(html);

				$(document).on("click","#generar_cheque",function(){

				location.href=base_url+"pdf/generar_cheque?id_orden="+$("#codigo_orden").val();
			})
				$(document).on("change","#estado_cheque",function(){

				location.href=base_url+"pdf/lista_cheque_filtrado?filtro="+$("#estado_cheque").val();
			})



		}

		if(this.dataset.nombre=="retencion"){
			html+="<div id='tipopo'>comprobante de retencion</div>";
			html+="<form id='filtro'>";
			html+="<div id='mensjj'></div>";
			html+="<label>codigo factura</label>";
			html+="<input id='id_factura'>";
			
			html+='<div class="cont_btn">';
			html+='<button  class="btn btn-success" disabled="" id="generar_retencion" type="button" >generar</button>';
			
			html+='<div>';
					
			html+="</form>";

			$("#contenido").html(html);

				$(document).on("click","#generar_retencion",function(){

				location.href=base_url+"pdf/generar_comprobante_de_retencion?id_factura="+$("#id_factura").val();
			})



		}
		if(this.dataset.nombre=="or_pa"){
			html+="<div id='tipopo'>ordenes de pago</div>";
			html+="<form id='filtro'>";
			html+="<div id='mensjj'></div>";
			html+="<label>nro orden de pago</label>";
			html+="<input id='id_orden'>";
			
			html+='<div class="cont_btn">';
			html+='<button  class="btn btn-success" disabled="" id="generar_orden" type="button" >generar</button>';
			html+='<button  class="btn btn-success" id="generar_orden_all" type="button" >listar todas</button>';
			
			html+='<div>';
					
			html+="</form>";

			$("#contenido").html(html);

				$(document).on("click","#generar_orden",function(){

				location.href=base_url+"pdf/completar_orden/"+$("#id_orden").val();
			})

				$(document).on("click","#generar_orden_all",function(){

				location.href=base_url+"pdf/completar_orden/";
			})



		}
		if(this.dataset.nombre=="banco_repor"){
			


			html+="<div id='tipopo'>banco</div>";
			
			html+="<form id='filtro'>";
			html+="<label>bancos</label>";
			html+="<select name='' id='bancoss'>";
		
			html+="</select>";				


			
			

			html+="<div id='mensjj'></div>";


			
					
			html+="</form>";

			

			$("#contenido").html(html);

			cargar_select();

			$(document).on("change","#bancoss",function(){

				location.href=base_url+"pdf/reporte_bancos?id_banco="+$("#bancoss").val();
			})


		}












		

	})


	$(document).on("keyup","#id_factura",function(){


		$.get(base_url+"/orden_de_pago/verificar_factura",{'id':$("#id_factura").val()},function(datos){


			if(datos=='2'){
				$("#mensjj").html('<span class="glyphicon glyphicon-refresh" arial-hedden="true"></span>');
				$("#generar_retencion")[0].disabled=true;

			}else{
				$("#mensjj").html('<span class="glyphicon glyphicon-ok" arial-hedden="true"></span>');
				$("#generar_retencion")[0].disabled=false;
			}



		},'json');


	});

	function cargar_select(){
		

		$.get(base_url+"/banco/traer_datos",{},function(datos){


			var html='<option value="">--Seleccione--</option>';
			html+='<option value="">todos</option>';
			for (var i = datos.length - 1; i >= 0; i--) {
				html+='<option value="'+datos[i].id_banco+'">'+datos[i].nombre+','+datos[i].tipo_cta+',('+datos[i].saldo+datos[i].moneda+')</option>';
			}
			

			$('#bancoss').html(html);

			

		},'json');



	}

	$(document).on("keyup","#codigo_orden",function(){


		$.get(base_url+"/orden_de_pago/verificar_orden_cheque",{'id':$("#codigo_orden").val()},function(datos){


			if(datos==1){

				$("#generar_cheque").attr('disabled',false);
				$("#mensjj").html('<span class="glyphicon glyphicon-ok" arial-hedden="true"></span>');
			}
			else if (datos==2) {
				$("#mensjj").html('');
				$("#generar_cheque").attr('disabled',true);
			}
			else{
				

				$("#mensjj").html('esta orden de pago fue pagada con una transferencia con el numero de referencia:'+datos._nro_referancia+" por la cantidad de : "+datos._cantidad);
				$("#generar_cheque").attr('disabled',true);
			}

		},'json');


	});



	$(document).on("keyup","#id_orden",function(){


		$.get(base_url+"/orden_de_pago/verificar_orden_cheque",{'id':$("#id_orden").val()},function(datos){


			if(datos==1){

				$("#generar_orden").attr('disabled',false);
				$("#mensjj").html('<span class="glyphicon glyphicon-ok" arial-hedden="true"></span>');
			}
			else if (datos==2) {
				
				$("#mensjj").html('<span class="glyphicon glyphicon-refresh" arial-hedden="true"></span>');
				$("#generar_orden").attr('disabled',true);
			}
			else{
				

				$("#mensjj").html('<span class="glyphicon glyphicon-ok" arial-hedden="true"></span>');
				$("#generar_orden").attr('disabled',false);
			}

		},'json');


	});



	










	





});