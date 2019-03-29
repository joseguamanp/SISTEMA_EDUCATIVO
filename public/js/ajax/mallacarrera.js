function carrera(par) {
    var op = $('option:selected',par).attr('data');
    if (op != 0){
        completar("#tabla",op,"/admin/MallasMaterias/filtro");
    }
}

function completar(tabla, dato, url) {
	var token=$('#token').val();
	var da="";
	cadena="selectcarrera="+dato;
	$.ajax({
        url: ruta_global+url,
        headers:{'X-CSRF-TOKEN':token},
          type:"POST",
          dataType:'json',
        data:cadena,
        success: function (data) {
        	$(tabla).empty();
            $.each(data, function (i,item){
            	if (item.deleted_at==null) {
		            var clase="btn-danger";
		            var clase1="btn-default";
		            var nombre="desactivar";
		            //var click="eliminar(this);";
		            var restaurar="";
		            var desabilitar="";
		          }else{
		          	var restaurar="/restaurar";
		            var clase="btn-info";
		            var nombre="restaurar";
		            //var click="restaurar(this);";
		            var desabilitar="disabled='yes'";
		          }
            	da+="<tr>";
            	da+="<td>"+item.nombre_malla+"</td>";
                da+="<td>"+item.nombreCarrera+"</td>";
            	da+="<td>"+item.nombre_materia+"</td>";
            	da+="<td>"+item.etiqueta+"</td>";
            	da+="<td>"+item.optativa_sn+"</td>";
            	da+="<td>"+item.num_horas_semanas+"</td>";
            	da+="<td>"+item.num_horas_totales+"</td>";
            	da+="<td><a class='btn btn-warning btn-block' href='"+ruta_global+"/admin/MallasMaterias/"+item.id+"/edit' "+desabilitar+">Editar</a></td>";
            	da+="<td><a class='btn "+clase+" btn-block' href='"+ruta_global+"/admin/MallasMaterias/"+item.id+""+restaurar+"'>"+nombre+"</a></td>";
            	da+="</tr>";
            	$(tabla).html(da);

            });
        }
    });
}