$(document).ready(function () {
  becaDocente();
  publicacionRev();
  getFecha();
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });

  $('#datepicker1').datepicker({
    format: 'yyyy/mm/dd',
    defaultViewDate: { year: 1990, month: 0, day: 0 },
  });
});


function obtenerEdad(){
  var fe = $("#datepicker1").val();
  var fecha = new Date();
  var anioAct = fecha.getFullYear();
  var edad = calculateAge(fe) ;
  $("#edad").val(edad);
}


function calculateAge(birthday) {
  var birthday_arr = birthday.split("/");
  var birthday_date = new Date(birthday_arr[0], birthday_arr[1], birthday_arr[2]);
  var ageDifMs = Date.now() - birthday_date.getTime();
  var ageDate = new Date(ageDifMs);
  return Math.abs(ageDate.getUTCFullYear()-1970);
}



//Retorna la edad mediante la fecha de nacimiento
function getFecha() {
    var fe = $("#datepicker1").val();
    var fecha = new Date();
    var anioAct = fecha.getFullYear();
    if(fe.length > 0){
        var anioNac = fe.split("/");
        var cadena = anioNac[2] + anioNac[1] + anioNac[0];
        //console.log(cadena);
        var edad = calcularEdad(cadena);
        //console.log(edad)
        $("#edad").val(edad);
    }
}

function calcularEdad(dob) {
    var year = Number(dob.substr(0, 4));
    var month = Number(dob.substr(4, 2)) - 1;
    var day = Number(dob.substr(6, 2));
    var today = new Date();
    var age = today.getFullYear() - year;
    if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
        age--;
    }
    return age;
}


function becaDocente() {
    var op = $("#poseeBeca").val();
    //console.info(op);
    if(op === 'SELECCIONE' || op === 'NO')
        $("#beca").hide();
    else
        $("#beca").show();
}

function publicacionRev() {
    var op = $("#pubRev").val();
    if(op == 0 || op == 2)
        $("#nroPubRev").hide();
    else
        $("#nroPubRev").show();
}
//___________________________________________



//______________________________________________________

//ComboBox de Pais Residencia
function paisRes() {
    var op1 = $("#paisResi").val();
    console.log(op1);
    if (op1 != 0){
        llenarCbx("#provResi",op1,'/docentes/provincias');
    }
}

function cantonResi() {
    var op2 = $("#provResi").val();
    console.log(op2);
    if (op2 != 0){
        llenarCbx("#cantResi",op2,'/docentes/cantones');
    }
}

//___________________________________________________________-



function cargar() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: ruta_global+'/docentes/infAcademica',
        dataType: 'json',
        success: function (data) {
            console.info(data);
            $("#relLab").empty();
            $.each(data, function (i, item) {
                $("#relLab").append("<option values='"+item.etiqueta+"' data='"+item.id+"'>"+item.etiqueta+"</option>");
            })
        }
    });
}
