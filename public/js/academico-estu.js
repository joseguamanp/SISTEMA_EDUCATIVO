  
//CALENDARIO PARA ESTUDIANTE INFORMACION PERSONAL
  $('#calendario').datepicker({
    format: "dd/mm/yyyy",
    language: "es",
    autoclose: true,
    defaultViewDate: { year: 1990, month: 0, day: 0 }
  });

//FUNCION PARA OCULTAR O PRESENTAR EL BLOQUE DE DISCAPACIDAD
  function setDis(){

    var val = $("#tieneDis").val();

    if(val == "SI"){

      $("#seccion_dis").show(400);
      $('#porcentaje_dis').attr("required", "yes");
      $('#carnet_conadis').attr("required", "yes");
      $('#tipo_dis').attr("required", "yes");
      
    } else {

      $("#seccion_dis").hide(400);
      $("#porcentaje_dis").val("");
      $("#carnet_conadis").val("");
      $("#tipo_dis").val("");

      $('#porcentaje_dis').removeAttr("required");
      $('#carnet_conadis').removeAttr("required");
      $('#tipo_dis').removeAttr("required");
    }

  }

//FUNCION PARA OCULTAR O PRESENTAR EL CAMPO DE NOMBRE DE IDIOMA ANCESTRAL
  function setIdiomaAn(){

    var valor = $("#habla_idioma_an").val();

    if(valor == "SI"){
        $("#contenedor_idioma").show(400);
        $('#idiomaAnces').attr('required', 'yes');
    } else {
        $("#contenedor_idioma").hide(400);
        $('#idiomaAnces').removeAttr('required');
        $('#idiomaAnces').val("");
    }
  }

  //FUNCION PARA OCULTAR O PRESENTAR LA SECCION DE CATEGORIA MIGRATORIA
  function setCatMigratoria(){

    var val = $("#categoriaMigratoria").val();

    if(val == "NO APLICA" || val == ""){

      $("#seccionCatMigratoria").hide(400);
      $("#paisResidencia").val("");
      $("#provinciaResidencia").val("");
      $("#cantonResidencia").val("");

      $('#paisResidencia').removeAttr("required");
      $('#provinciaResidencia').removeAttr("required");
      $('#cantonResidencia').removeAttr("required");
      
    } else {

      $("#seccionCatMigratoria").show(400);
      $('#paisResidencia').attr("required", "yes");
      $('#provinciaResidencia').attr("required", "yes");
      $('#cantonResidencia').attr("required", "yes");
    }

  }

    //ORDENAR EL FORMATO DE FECHA

  function cambiarFormato(){

    var fecha = $('#calendario').val();

    var partes = fecha.split("/",3);

    var fecha_nac = partes[2]+"-"+partes[1]+"-"+partes[0];

    $('#fecha_nac').val(fecha_nac);

  }
