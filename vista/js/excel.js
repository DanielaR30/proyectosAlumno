    var tabla;

    function init(){
        mostrarform(false);
        listar();
        
        $("#formulario").on("submit",function(e)
        {
            guardar(e);
        });

        
        // $.post("../controlador/alumno.php?op=selectDepartamento",function(r){
        //     $("#cbx_departamento").html(r);
        //     $('#cbx_departamento').selectpicker("refresh");
        // });

        // listar provincia
        // $(document).ready(function(){
        //     $("#cbx_departamento").change(function(){
            
        //         $('#iddistrito').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        //         $("#cbx_departamento option:selected").each(function(){
        //             iddepartamento= $(this).val();
        //             $.post("../controlador/alumno.php?op=selectProvincia", { iddepartamento:iddepartamento},function(data){
        //                 $("#cbx_provincia").html(data);
        //             });
        //         });
        //     });
        // });

        // listar distrito
    //     $(document).ready(function(){
    //         $("#cbx_provincia").change(function(){
    //             $("#cbx_provincia option:selected").each(function(){
    //                 idprovincia= $(this).val();
    //                 $.post("../controlador/alumno.php?op=selectDistrito", { idprovincia:idprovincia},function(data){
    //                     $("#iddistrito").html(data);
    //                 });
    //             });
    //         });
    //     });
    
     }


    function limpiar()
    {
    $("#archivo").val("");
    // $("#apellido").val("");
    // $('#iddistrito').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
    // $('#cbx_provincia').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
    }

    function mostrarform(flag){
        limpiar();
        if(flag){

    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled",false);
    $("#btnagregar").hide();
    $("#nuevo").show();
    $("#mlista").hide();
        }
        else
        {
            $("#listadoregistros").show();
            $("#formularioregistros").hide();
            $("#btnagregar").show();
        $("#nuevo").hide();
        $("#mlista").show();
        }

    }

    function cancelarform(){
            mostrarform(false);
        limpiar();
    }


    function listar()
    {
        tabla=$('#tbllistado').dataTable(
            {
                "aProcessing":true,// activando los procedimientos de datatables
                "aServerSide": true,// paginacion y filtracion
                dom: 'Bfrtip', // definimos los elementos de la tabla
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],

                "ajax":
                {
                    url:'../controlador/excel.php?op=listar',
                    type:"get",
                    dataType: "json",
                    error: function(e){
                        console.log(e.responseText);
                    }
                },
                "bDestroy":true,
                "iDisplayLength":10,// indicamos el numero de paginacion
                "order":[[0,"desc"]] // ordernar (columna,orden) 
            }).DataTable();
    }

    function guardar(e){
    e.preventDefault(); //No se activará la acción predeterminada del evento
        $("#btnGuardar").prop("disabled",true);
        var formData = new FormData($("#formulario")[0]);
                    $.ajax({
                        url: "../controlador/excel.php?op=guardar",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,

                            success: function(datos)
                            {
                            swal({
                                title: 'Excel',
                                type: 'success',
                                text:datos
                            });
                                        mostrarform(false);
                                        tabla.ajax.reload();
                            }
                    });
    limpiar();
    }

    function eliminar(idexcel){

        swal({
            title: "¿Eliminar?",
            text: "¿Está Seguro de eliminar el Excel?",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "No",
            cancelButtonColor: '#FF0000',
            confirmButtonColor: '#008df9',
            confirmButtonText: "Si",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
            },function(isConfirm){
            if (isConfirm){
                $.post("../controlador/excel.php?op=eliminar", {idexcel : idexcel}, function(e){
                    swal('!!! Eliminado !!!',e,'success');
                        tabla.ajax.reload();
                });
            }else {
            swal("! Cancelado ¡", "Se Cancelo la Eliminacion del Excel", "error");
        }
        });
    }
    


    init();