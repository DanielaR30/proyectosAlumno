<?php
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12 ">
                  <div class="box">
                    <div class="box-header with-border">

                    <div class="col-lg-6">
                    <h1 class="box-title">Alumno   
                    <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                    <button class="btn btn-danger"  id="btnborrar" onclick="borrar('.$reg->idalumno.')" ><i class="fas fa-times-circle"></i>BORRAR</button>
                  </h1>
                    </div>

                          <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                             <th>opcion</th>
                            <th>nombre</th>
                            <th>apellido</th>
                            <th>Distrito</th>
                            <th>Provincia</th>
                            <th>Departamento</th>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="post">

                           <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Departamento(*):</label>
                            <select name="cbx_departamento" id="cbx_departamento" class="form-control selectpicker" data-live-search="true" required>
                            </select>
                          </div>

                          <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Provincia(*):</label>
                            <select name="cbx_provincia" id="cbx_provincia" class="form-control" required>
                              </select>
                          </div>


                          <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Distrito(*):</label>
                            <select name="iddistrito" id="iddistrito" class="form-control" required>
                              </select>
                          </div>

                          <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required="">
                          </div>
                          <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Apellido:</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" required="">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->


  <!-- Fin modal -->
<?php
require 'footer.php';
?>
<script src="js/alumno.js"></script>
