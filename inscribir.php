<html>
<head>  <?php include 'php/imports.php' ?>
</head>     <?php include 'php/header.php' ?>
<title>Inscripciones</title>
<body class="ng-scope" ng-app="AppRegistroJuguetes"    ng-controller="Insc_Ctrl">
	


  <section>
    <div class="container ">
      <div class="row invert">
        <div class="col-xs-12 text-center">
          <h3 class="titulo">Formulario inscripción beneficiarios</h3>
        </div>
      </div>
        <label ng-model="codeStatus">{{codeStatus}}  </label> 

      <div class="row section-padding">
        <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
            
    <form  name="FormInsc" ng-submit="onSubmit()">
       <input style="visibility:hidden" ng-model="benef.user" >
        
                      <div class="form-group">
                        <select required ng-model="benef.entidad" 
                                ng-options="item.Id as item.Nombre for item in entidades"
                                 
                                class="form-control" 
                                placeholder="Entidad" 
                                id="entidad">
                             <option value="">Seleccionar Entidad</option>
                        </select>
                      </div>

              <div class="form-group">
                <select required ng-model="benef.estado" 
                        class="form-control" 
                        placeholder="Estado" 
                        id="estado">
                 <option value="">Seleccionar Tipo de Inscripción</option>
                  <option value="1">Normal</option>
                  <option value="2">Especial D</option>
                  <option value="3">Especial E</option>
                </select>
              </div>
         <label for="rut">Ingresar Rut sin puntos, sin guión</label>
                <div class="form-group">
                <input required ng-model="benef.rut"
                       type="text" 
                       class="form-control" 
                       placeholder="12345678-9" 
                       id="rut" 
                      oninput="checkRut(this)">
              </div>
        
        
              <label for="nombres">Nombre</label>
              <div class="row">
                <div class="form-group col-sm-6">
                  <input required ng-model="benef.nombre1"  
                         type="text" 
                        
                         class="form-control soloLetras " 
                         placeholder="Primer Nombre" 
                         id="nombre1" >
                </div>
                

                  <div style="display:none" class="form-group col-sm-6">
                  <input ng-model="benef.nombre2"
                          
                         type="text" 
                         class="form-control soloLetras" 
                         placeholder="Segundo Nombre"
                        >
                </div>

              </div>
              
                <label for="apellidos">Apellidos</label>
                <div class="row">
                <div class="form-group col-sm-6">
                  <input required ng-model="benef.apellido1"
                                           
                         type="text" class="form-control soloLetras" 
                         placeholder="Primer Apellido" 
                         id="apellidos">
                </div>
                <div class="form-group col-sm-6">
                  <input  ng-model="benef.apellido2" 
                         type="text" 
                         class="form-control soloLetras" 
                         placeholder="Segundo Apellido">
                </div>
              </div>
             
               
              
              <label for="fecha_nac">Fecha de Nacimiento</label>
                 <div class="form-group">
                <input required ng-model="benef.fecha_nac" 
                       type="text" 
                       class="form-control" 
                       placeholder="dia-mes-año" 
                       id="fecha">
              </div>    
        
            
        
              <label for="dire">Dirección</label>
              <div  class="form-group">
                <input required ng-model="benef.direccion" 
                       type="text" 
                       class="form-control" 
                       placeholder="Dirección" 
                       id="dire">
              </div>
                
            
                
              <label>Genero</label>
              <div class="row">
                <div class="form-group col-xs-6">
                  <div class="radio">
                    <label>
                      <input required ng-model="benef.genero" 
                             type="radio" 
                             name="optionsRadios" 
                             id="radioMasculino" 
                             value="M">
                      Masculino
                    </label>
                  </div>
                </div>
                <div class="form-group col-xs-6">
                  <div class="radio">
                    <label>
                      <input required ng-model="benef.genero" 
                             type="radio" 
                             name="optionsRadios" 
                             id="radioFemenino" 
                             value="F">
                      Femenino
                    </label>
                  </div>
                </div>
              </div>
            
           
              <div class="boton text-center">
                <input value="Registrar" 
                       class="btn btn-primary" 
                       type="submit"
                     
                     >
              </div>

          </form>
        </div>
      </div>
    
       
        
    </div>
  </section>
   


    <?php include 'php/foot.php' ?>

</body>
    
        
    
</html>