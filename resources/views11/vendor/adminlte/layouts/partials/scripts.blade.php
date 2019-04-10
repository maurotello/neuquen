<!-- REQUIRED JS SCRIPTS -->
<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

<!--
<script src="{{ asset('/js/jquery-3.3.1.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery-ui.js') }}" type="text/javascript"></script>
-->
<script src="{{ asset('/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<!--
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
-->
<script src="{{ asset('/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/buttons.html5.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/buttons.flash.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/buttons.colVis.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/buttons.print.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/dataTables.material.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/pikaday.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/popper.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/bower-components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!--
<script src="{{ asset('js/admin.js') }}"></script>
-->

 @yield('scripts')

<script>
  function updateMonto(value) {
      var str = document.getElementById("monto");
      if (value < 150000)
          alert('Está seguro que el monto del Proyecto es: ' + value);

      if (value > 2000000 && value < 2500000)
          alert('Recuerde que si el monto es superior a $2.000.000 el Proyecto no puede ser nuevo');
      if (value > 2500000)
          alert('El monto NO puede ser superior a $2.500.000');


      str.focus();
}

  $('.formcolorpicker').each(function () {
      $(this).colorpicker();
  });

    $(function () {
      // Basic instantiation:
      $('#color').colorpicker();
      
      // Example using an event, to change the color of the .jumbotron background:
      $('#color').on('colorpickerChange', function(event) {
        alert("Entre");
        $('.jumbotron').css('background-color', event.color.toString());
      });
    });
  </script> 
<script>
    

    $('#table-titulares').DataTable(
            {
                dom: 'Bfrtip',
                columnDefs: [
                    {
                       // targets:-1,
                      //  "orderable": false
                    },
                    {
                      //  targets: 1,
                      //  "bVisible": true
                    },
                    {
                      //  targets: [2,6],
                      //  "bVisible": false
                    },
                ],
                buttons: [
                      {
                            extend: 'excel',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Exportar las Columnas Visibles a Excel',
                            text: 'Excel',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'pdf',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Exportar las Columnas Visibles a PDF',
                            text: 'PDF',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'colvis',
                            className: 'btn btn-info',
                            columns: ':not(.noVis)',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Ver u Ocultar Columnas de la Grilla',
                            text: 'Ver/Ocultar Columnas',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'print',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Imprimir la Grilla',
                            text: 'Imprimir',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      }
                ],
                //"sDom": '<"top"l>rt<"bottom"ip><"clear">',
                processing: true,
                language: {
                    "url": '{{ asset('js/Spanish.json') }}'
                },
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        input.setAttribute("class", "col-md-12");
                        $(input).appendTo($(column.header()))
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                    })
                }
            });

</script>

<script>

function submitSujeto()
{
    var token = "{{ csrf_token() }}";
    var id = $('#idSujetoAjax').val();
    var fecha_envio_banco = $('#fechaEnvioSujetoAjax').val();
    var fecha_respuesta_banco = $('#fechaRespuestaSujetoAjax').val();
    var sucursal_id = $('#sucursal_id').val();
    var sujeto_credito = $('#sujetoCreditoAjax').val();
    var descripcion1 = $('#descripcion1Ajax').val();


        var param = {
            'id': id,
            'fecha_envio_banco': fecha_envio_banco,
            'fecha_respuesta_banco': fecha_respuesta_banco,
            'sujeto_credito': sujeto_credito,
            'descripcion1': descripcion1,
            'sucursal': sucursal_id,
            '_token'   : token
        };
        $.ajax({
            type: "POST",
            url: "{{route('sujetoCredito.updateAjax')}}",
            //cache:false,
            data: param,
            success: function(response){
                console.log(response);
                $("#editSujeto").modal('hide');
                location.reload();
            },
            error: function(){
                alert("Error");
            }
        });
}


function submitDesembolso()
{
    var token = "{{ csrf_token() }}";
    var id = $('#idAjax').val();
    var fecha = $('#fechaAjax').val();
    var nro = $('#nroAjax').val();
    var monto = $('#montoAjax').val();
    var descripcion = $('#descripcionAjax').val();


        var param = {
            'id': id,
            'fecha': fecha,
            'nro': nro,
            'monto': monto,
            'descripcion': descripcion,
            '_token'   : token
        };
        $.ajax({
            type: "POST",
            url: "{{route('desembolso.updateAjax')}}",
            //cache:false,
            data: param,
            success: function(response){
                //$("#contact").html(response)
                $("#editDesembolso1").modal('hide');
                location.reload();
            },
            error: function(){
                alert("Error");
            }
        });
}

$('#editDesembolso').on('click',function(){
  $('#editDesembolso1').modal('show');

})


$('#editDesembolso1').on('show.bs.modal', function (event)
{
      var token = "{{ csrf_token() }}";
      var button = $(event.relatedTarget) // Button that triggered the modal
      var t_id = button.data('whatever') // Extract info from data-* attributes

      var param = {
          'id': t_id,
          '_token'   : token
          //'_token'   : '{{Session::token()}}'
      };

      $.ajax({
          url     :  "{{route('desembolso.search')}}",
          type    :  'post',
          dataType:  'json',
          data    :   param,
          beforeSend: function () {
                  //$("#respuesta").html("Procesando, espere por favor...");
          },
          success:function(result){
              console.log(result);
              $.each(result,function(name,value){
                  if (name == 'fecha')
                  {
                      fecha1 = value;
                      console.log("Fecha: " + fecha1);
                  }

                  if (name == 'id')
                  {
                      id1 = value;
                      console.log("ID: " + id1);
                  }

                  if (name == 'nro')
                  {
                      nro1 = value;
                      console.log("Nro: " + nro1);
                  }

                  if (name == 'monto')
                  {
                      monto1 = value;
                      console.log("Monto: " + monto1);
                  }

                  if (name == 'pago')
                  {
                      pago1 = value;
                      console.log("Pago: " + pago1);
                  }

                  if (name == 'descripcion')
                  {
                      descripcion1 = value;
                      console.log("Descripcion: " + descripcion1);
                  }
              })
              $('#idAjax').val(id1);
              $('#fechaAjax').val(fecha1);
              $('#nroAjax').val(nro1);
              $('#montoAjax').val(monto1);
              $('#descripcionAjax').html(descripcion1);
          },
          error:function(errors){
             console.log("numero"+errors);
          }
      });
})


function borrar_titular(id) {
   
    var param = {
      'id': id
    };
    $.ajax({
      url:"{{route('titular.removedata')}}",
      mehtod:"get",
      data:{id:id},
      success:function(result){
        console.log(result);
        location.reload(true);
      },
      error:function(errors){
        console.log("numero"+errors);
        location.reload(true);
      }
    });
}


function borrar_sujeto(id) {
   
   var param = {
     'id': id
   };
   $.ajax({
     url:"{{route('sujetoCredito.removedata')}}",
     mehtod:"get",
     data:{id:id},
     success:function(result){
       console.log(result);
       location.reload(true);
     },
     error:function(errors){
       console.log("numero"+errors);
       location.reload(true);
     }
   });
}

function borrar_desembolso(id) {
   
   var param = {
     'id': id
   };
   $.ajax({
     url:"{{route('desembolso.removedata')}}",
     mehtod:"get",
     data:{id:id},
     success:function(result){
       console.log(result);
       location.reload(true);
     },
     error:function(errors){
       console.log("numero"+errors);
       location.reload(true);
     }
   });
}


function borrar_movimiento(id) {
   
    var param = {
      'id': id
    };
    $.ajax({
      url:"{{route('movimiento.removedata')}}",
      mehtod:"get",
      data:{id:id},
      success:function(result){
        console.log(result);
        location.reload(true);
      },
      error:function(errors){
        console.log("numero"+errors);
        location.reload(true);
      }
    });
}

$('#delete_movimiento').on('click', function (event)
{
      var token = "{{ csrf_token() }}";
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('whatever') // Extract info from data-* attributes

      var param = {
          'id': id,
          //'_token'   : token
      };

      $.ajax({
         url:"{{route('movimiento.deleteAjax')}}",
          mehtod:"get",
          data:{id:id},
          success:function(result){
              console.log(result);
              
          },
          error:function(errors){
             console.log("numero"+errors);
          }
      });
})






/*************
Es el botón que está en la linea 146 del archivo _fechas.blade.php cuando presiono el botónote
de editar un sujeto de crèdito viene a ejecutarse esto
*******************/
$('#editSujeto').on('show.bs.modal', function (event)
{
      var token = "{{ csrf_token() }}";
      var button = $(event.relatedTarget) // Button that triggered the modal
      var t_id = button.data('whatever') // Extract info from data-* attributes

      var param = {
          'id': t_id,
          '_token'   : token
      };

      $.ajax({
          url     :  "{{route('sujetoCredito.search')}}",
          type    :  'post',
          dataType:  'json',
          data    :   param,
          beforeSend: function () {
                  //$("#respuesta").html("Procesando, espere por favor...");
          },
          success:function(result){
              console.log(result);
              $.each(result,function(name,value){
                  if (name == 'fecha_envio_banco')
                  {
                      fecha_envio_banco = value;
                      console.log("Fecha Envio Banco: " + fecha_envio_banco);
                  }
                  if (name == 'fecha_respuesta_banco')
                  {
                      fecha_respuesta_banco = value;
                      console.log("Fecha Respuesta Banco: " + fecha_respuesta_banco);
                  }

                  if (name == 'id')
                  {
                      id1 = value;
                      console.log("ID: " + id1);
                  }

                  if (name == 'sujeto_credito')
                  {
                      sujeto_credito = value;
                      console.log("Sujeto Credito?: " + sujeto_credito);
                  }

                  if (name == 'descripcion')
                  {
                      descripcion1 = value;
                      console.log("descripcion: " + descripcion1);
                  }

                  if (name == 'proyecto_id')
                  {
                      proyecto_id = value;
                      console.log("proyecto_id: " + proyecto_id);
                  }

                  if (name == 'sucursal_id')
                  {
                      sucursal_id = value;
                      console.log("sucursal_id: " + sucursal_id);
                  }
              })
              $('#idSujetoAjax').val(id1);
              $('#fechaEnvioSujetoAjax').val(fecha_envio_banco);
              $('#fechaRespuestaSujetoAjax').val(fecha_respuesta_banco);
              $('#sujetoCreditoAjax').val(sujeto_credito);
              $('#SucursalSujetoAjax').val(sucursal_id);
              $('#descripcion1Ajax').html(descripcion1);
          },
          error:function(errors){
             console.log("numero"+errors);
          }
      });
})
function readURL(input) {
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
/**********************/
      $(document).ready(function()
      {
        jQuery('.datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('proyecto.getdata') }}',
          columns: [
              {data: 'id', name: 'id'},
              {data: 'fechaIngreso', name: 'fechaIngreso'},
              {data: 'nombre', name: 'nombre'},
              {data: 'localidad.nombre', name: 'localidad.nombre'},
              {data: 'estado.nombre', name: 'estado.nombre'},
          ]
        });




          jQuery("#profile-img").change(function(){
              readURL(this);
          });

           $('#table-permisos').DataTable
            (
            {
                dom: 'Bfrtip',
                columnDefs: [
                    /*{
                        targets: [3],
                        "bVisible": false
                    },*/
                ],
                
                buttons: [
                      {
                            extend: 'excel',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Exportar las Columnas Visibles a Excel',
                            text: 'Excel',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'pdf',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Exportar las Columnas Visibles a PDF',
                            text: 'PDF',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'colvis',
                            className: 'btn btn-info',
                            columns: ':not(.noVis)',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Ver u Ocultar Columnas de la Grilla',
                            text: 'Ver/Ocultar Columnas',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'print',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Imprimir la Grilla',
                            text: 'Imprimir',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      }
                ],
                //"sDom": '<"top"l>rt<"bottom"ip><"clear">',
                processing: true,
                language: {
                    "url": '{{ asset('js/Spanish.json') }}'
                },
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        input.setAttribute("class", "col-md-12");
                        $(input).appendTo($(column.header()))
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                    })
                }
            });


            $('#table-proyectos1').DataTable
            (
            {
                dom: 'Bfrtip',
                columnDefs: [
                    {
                        targets:-1,
                        "orderable": false
                    },
                    {
                        targets: 1,
                        "bVisible": true
                    },
                    {
                        targets: [2,6],
                        "bVisible": false
                    },
                ],
                buttons: [
                      {
                            extend: 'excel',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Exportar las Columnas Visibles a Excel',
                            text: 'Excel',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'pdf',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Exportar las Columnas Visibles a PDF',
                            text: 'PDF',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'colvis',
                            className: 'btn btn-info',
                            columns: ':not(.noVis)',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Ver u Ocultar Columnas de la Grilla',
                            text: 'Ver/Ocultar Columnas',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      },
                      {
                            extend: 'print',
                            className: 'btn btn-info',
                            exportOptions: {columns: ':visible'},
                            titleAttr: 'Imprimir la Grilla',
                            text: 'Imprimir',
                            init: function(api, node, config) {
                                  $(node).removeClass('dt-button')
                            }
                      }
                ],
                //"sDom": '<"top"l>rt<"bottom"ip><"clear">',
                processing: true,
                language: {
                    "url": '{{ asset('js/Spanish.json') }}'
                },
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        input.setAttribute("class", "col-md-12");
                        $(input).appendTo($(column.header()))
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                    })
                }
            });

            var fechaIngreso = new Pikaday(
            {
             field: document.getElementById('fechaIngreso'),
            })


            var fechaRefinanciacion = new Pikaday(
            {
                  field: document.getElementById('fecha_refinanciacion'),
                  format: 'DD/MM/YYYY',
                  yearRange: [2015, 2400]
            })            

            var fechaIngreso = new Pikaday(
            {
                  field: document.getElementById('fecha_nuevo_movimiento'),
                 // format: 'DD-MM-YYYY'
            })

            var fechaCaducoBanco = new Pikaday(
            {
                  field: document.getElementById('fechaCaducoBanco'),
            })

            var fechaAprobadoUep = new Pikaday(
            {
             field: document.getElementById('fechaAprobadoUep'),
            })
            var fechaEnviadoCfi = new Pikaday(
            {
             field: document.getElementById('fechaEnviadoCfi'),
            })
            var fechaAprobadoCfi = new Pikaday(
            {
             field: document.getElementById('fechaAprobadoCfi'),
            })
            var fechaTramdispo = new Pikaday(
            {
             field: document.getElementById('fechaTramdispo'),
            })

            var fechaComunicaTran = new Pikaday(
            {
            field: document.getElementById('fechaComunicaTran'),
            })

            var fechaDesembolso = new Pikaday(
            {
            field: document.getElementById('fechaDesembolso'),
            })

            var fechaEfectivizacion = new Pikaday(
            {
            field: document.getElementById('fechaEfectivizacion'),
            })

            var fechaDesistido = new Pikaday(
            {
            field: document.getElementById('fechaDesistido'),
            })

            var fechaJudicial = new Pikaday(
            {
            field: document.getElementById('fechaJudicial'),
            })

            var fechaCancelado = new Pikaday(
            {
            field: document.getElementById('fechaCancelado'),
            })
            var fechaArchivado = new Pikaday(
            {
            field: document.getElementById('fechaCancelado'),
            })

            var fechaUltimoMovimiento = new Pikaday(
            {
            field: document.getElementById('fechaUltimoMovimiento'),
            })

            var fechaArchivado = new Pikaday(
            {
            field: document.getElementById('fechaArchivado'),
            })

            var fecha_nacimiento = new Pikaday(
            {
                field: document.getElementById('fecha_nacimiento_titular'),
                yearRange: [1900, 2400]
            })

            var fecha_nacimiento_conyuge = new Pikaday(
            {
                field: document.getElementById('fecha_nacimiento_conyuge'),
                format: 'DD/MM/YYYY',
                yearRange: [1900, 2400]
            })

            window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
            ]) !!};

            $('#edit').on('show.bs.modal', function (event)
            {
                  var button = $(event.relatedTarget)
                  var nombre = button.data('nombre')
                  var id = button.data('id')
                  var modal = $(this)
                  console.log("nombre: " + nombre);
                  console.log("id: " + id);
                  modal.find('.modal-body #nombre').val(nombre);
                  modal.find('.modal-body #id').val(id);
            })

            $('#delete').on('show.bs.modal', function (event)
            {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
            })


          $('#addMovimiento').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')
            var modal = $(this)
            modal.find('#proyecto_id').val(recipient)
          })

          $('#addDesembolso').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')
            var modal = $(this)
            modal.find('#proyecto_id').val(recipient)
          })

          $('#addSujeto').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever')
            var modal = $(this)
            modal.find('#proyecto_id').val(recipient)
          })
            
                /************* PROVINCIAS ***************/


            $(document).on('click','#edit_provincia',function(event){
                  $('#edit_provincia').modal('show')
            });

            $('#edit_provincia').on('show.bs.modal', function (event)
            {
                  var button = $(event.relatedTarget)
                  var nombre = button.data('nombre')
                  var codigo = button.data('codigo')
                  var id = button.data('id')
                  var modal = $(this)
                  modal.find('.modal-body #nombre').val(nombre);
                  modal.find('.modal-body #codigo').val(codigo);
                  modal.find('.modal-body #id').val(id);
            })

            $('#delete_provincia').on('show.bs.modal', function (event)
            {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #id').val(id);
            })

          $('#fechaCaducoBanco').on('blur', function()
          {

                if ($("#fechaEnvioBanco").val().length <= 0)
                {
                    enviobco = 0;
                }else{
                    enviobco = 1;
                }
                if ($("#fechaCaducoBanco").val().length > 0 )
                {
                    fechaCaducoBanco = $('#fechaCaducoBanco').val();
                    if (enviobco == 0)
                    {
                        var element = document.getElementById("fechaCaducoBanco");
                        element.setCustomValidity('');
                        element.setCustomValidity("Dude is not a valid email. Enter something nice!!");
                        //alert("No puede caducar en el Banco si no tiene fecha de envio al banco");
                    }else{
                        fechaEnvioBanco = $('#fechaEnvioBanco').val();
                        alert(fechaEnvioBanco);
                        if (fechaCaducoBanco < fechaEnvioBanco){
                            alert("Fecha Caduco Banco menor a Envio al Banco");
                        }

                    }

                }
          });

      });
</script>
