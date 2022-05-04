
//import * as $ from 'jquery';
$(document).ready(function(){

    let valor = $("#table").val();
  //  alert(`El valor es ${valor}`)
    switch (valor) {
        case null:
            break
        case "articulos":
            cargarDatatablesArticulos();
            break;
        case "detalle":
            cargarDatatablesDetalle();
    }

})

function cargarDatatablesArticulos(){
    alert("entrando a cargar articulos")

    let tableColumns = new Array();
    let nombres  = document.getElementsByClassName("camp");

    for (var i = 0; i< nombres.length; i++) {

        (nombres[i].innerHTML == '')
            ?tableColumns.push({mData: 'boton'})
            :tableColumns.push({mData:  nombres[i].id})
    }
     let ruta = route('articulos.lista')
    //
    //alert("soy edwin")
    //alert(`esto es tablecolumns ${JSON.stringify(tableColumns)}`)
    $('#defaultTable2').DataTable( {
        "serverSide": true,
        "processing": true,
        destroy: true,
        //ajax: "{{ route('articulos.lista') }}",
        //"ajax":{
            //url:route('listar_articulos'),
            //url: "{{ route('listarAticulos' )}}",
            //url: "{{ route('articulos.lista') }}"// ó {{url(/admin/empresa)}}
        //    url     : "{{ route('delete-topics') }}",
           // url: {{url(/admin/empresa)}}
            //"url":route('datatablePersonas'),

      //  },
        ajax:{
            url:ruta
            //url: '/articulos/lista',
            //url: route('articulos.lista'),
            //url: '{{ URL::route('articulos.lista') }},
           //url: "{{ route('articulos.lista') }}"
            //data: {"estacion_id":cod , "fecha_inicio":fechainicio}
            //data:valores
        },
        "columns": tableColumns,
        // columns:[
        //     {name:"nombre", data:"nombre"}
        // ],


        "columnDefs": [
            //{ orderable: false, targets: [0] },
            //{ searchable: true, targets: [0,1,2,3,4] }
        ],


        "language":{
            "info":"_TOTAL_ registros",
            "search":"Buscar",
            "paginate":{
                "next":"Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": 'Mostrar <select>'+
                '<option value="5">5</option>'+
                '<option value="10">10</option>'+
                '<option value="30">30</option>'+
                '<option value="-1">Todos</option>'+
                '</select> registros',
            // "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords":"Cargando...",
            "processing":"Procesando...",
            "emptyTable":"No hay datos",
            "zeroRecords":"No hay coincidencias",
            "infoEmpty":"",
            "infoFiltered":"",
        },



        //dom: 'Blfrtip',
        dom:'Bfrtipl',
        buttons: [
            // {extend:'copy', className:'btn btn-info', text:'Copiar <i class="fas fa-copy"></i>'},
            // {extend:'pdfHtml5',className:'btn btn-danger',text: 'PDF <i class="fas fa-file-pdf"></i>'},
            // {extend:'excelHtml5', className: 'btn btn-success', text:'Excel <i class="fas fa-file-excel"></i>'},
            // {extend:'csv', className: 'btn btn-primary', text:'CSV <i class="fas fa-file-csv"></i>'},
            // {extend:'print', className: 'btn btn-dark', text:'Imprimir <i class="fas fa-print"></i>'}
        ]




    });//cierre del datatables
}

function cargarDatatablesDetalle(){
    alert("entrando a cargar detalle")

    $("#defaultTable").DataTable();
}
