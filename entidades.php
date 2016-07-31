<html>
<head>
      <title>Crear Entidad</title>
    <?php include 'php/imports.php' ?> 
</head>  
   <?php include 'php/header.php' ?>
<body class="ng-scope" ng-app="AppRegistroJuguetes"    ng-controller="CrearEntidad_Ctrl">	
  <section>
    <div class="container ">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h3 class="titulo">Formulario creación entidades</h3>
        </div>
      </div>

      <div class="row section-padding">
        <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
            
    <form  name="theForm" ng-submit="onSubmitEntidad()">

          <label for="nombreEntidad">Nombre Entidad</label>
                <div class="form-group">
                <input required ng-model="entidad.nombre"
                       ng-model="ent"
                       type="text" 
                       class="form-control "  
                       id="nombreEntidad" >
              </div>
        
           <label for="rut">Rut Entidad</label>
                <div class="form-group">
                <input required ng-model="entidad.rut"
                       type="text" 
                       class="form-control" 
                       placeholder="12345678-9" 
                       id="rut" oninput="checkRut(this)">
              </div>
           <label for="tipoEntidad">Tipo de Entidad</label>
              <div 
                   class="form-group">
                <select required ng-model="entidad.tipo_entidad" 
                        ng-options="item.Id as item.Tipo for item in tipos"
                        class="form-control" 
                        placeholder="Seleccionar Tipo de Entidad" 
                        id="tipoEntidad">
                  <option value="">Seleccionar Tipo</option>
                </select>
                  
              </div>
        
            <label for="direccion">Dirección</label>
                <div class="form-group">
                <input required ng-model="entidad.direccion"
                       type="text" 
                       class="form-control" 
                       placeholder="" 
                       id="direccion" >
              </div>
        
          <label for="nombreResponsable">Nombre Responsable</label>
                <div class="form-group">
                <input required ng-model="entidad.nombre_responsable"
                       type="text" 
                       class="form-control soloLetras"  
                       id="nombreResponsable" >
              </div>
              
                <label for="apellidos">Apellidos</label>
                <div class="row">
                <div class="form-group col-sm-6">
                  <input required ng-model="entidad.apellido1" 
                         type="text" class="form-control soloLetras" 
                         placeholder="Primer Apellido" 
                         id="apellidos">
                </div>
                <div class="form-group col-sm-6">
                  <input required ng-model="entidad.apellido2" 
                         type="text" 
                         class="form-control soloLetras" 
                         placeholder="Segundo Apellido">
                </div>
              </div>
        
             
              
            
             
<!--
               <label for="rut">Rut Responsable</label>
                <div class="form-group">
                <input required ng-model="entidad.rut_resp"
                       type="text" 
                       class="form-control" 
                       placeholder="12345678-9" 
                       id="rut_resp" 
                       oninput="checkRut(this)">
              </div>
-->
                              
              <label for="telefono">Telefono</label>
              <div class="form-group">
                <input required ng-model="entidad.telefono" 
                       type="text" 
                       class="form-control" 
                       placeholder="Telefono" 
                       id="telefono">
              </div>
<!--
        
        <label for="correo">Correo Electronico</label>
              <div class="form-group">
                <input required ng-model="entidad.correo" 
                       type="email" 
                       class="form-control"     placeholder="Correo" 
                       id="correo">
              </div>
-->
                
                
         
              <div class="boton text-center">
                <input value="Crear" 
                       class="btn btn-primary" 
                       type="submit"
                     
                     >
              </div>

          </form>
             <pre ng-model="respuesta_crear_entidad">{{respuesta_crear_entidad}}</pre>
        </div>
      </div>
     
       
        
    </div>
  </section>
   

    <?php include 'php/foot.php' ?>
 



</body>
    
        
    
</html>