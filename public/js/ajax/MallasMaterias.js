function Mostrar(btn){
	var rutas=ruta_global+"/admin/MallasMaterias/"+btn.value+"/buscar";
	var token=$('#token').val();
	var dato="";
   $.get(rutas,function(res){
   		$(res).each(function(key,value){
		    $("#id").val(value.id);
		    dato+="<input type='checkbox' name='materia[]' id='materia'>"+value.nombre_materia+"<br>";
		    $("#chebox").html(dato);
		});
  });

}
