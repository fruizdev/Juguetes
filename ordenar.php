<html>
<head>
     <title>Ordenar por edad </title>    
<?php include 'php/imports.php' ?>
   
</head> 
<!--       <script type="text/javascript" src="js/controllers/ordenar.js"></script> -->
    <?php include 'php/header.php' ?>  
<body  class="ng-scope" ng-app="AppRegistroJuguetes" ng-controller="OrdenarCTRL">

 
  <section>
    <div class="container ">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h3 class="titulo">AGRUPAR EDADES</h3>
        </div>
      </div>

      <div class="row ">    
          
<form ng-model-options="{ getterSetter: true }"> 
     <div class="col-sm-4 col-sm-offset-4 ">
<!--          <label for="sel1">Entidad:</label>-->
           <select ng-model-options="{ getterSetter: true }"
                   required ng-model="orden.entidad" 
                          ng-options="item.Id as item.Nombre for item in entidades"
                                class="form-control" 
                                placeholder="Entidad" 
                                id="entidad">
                             <option value="">Seleccionar Entidad</option>      
        </select>
         
              <select ng-model-options="{ getterSetter: true }"
                      required ng-model="orden.tipo_entidad" 
                                ng-options="item.Id as item.Tipo for item in tipos"
                                class="form-control" 
                                placeholder="Tipo entidad" 
                                id="tipo_entidad">
                             <option value="">Seleccionar Tipo entidad</option>       
        </select>
        
<!--           <label>Genero</label>-->
              <div class="row">
                <div class="form-group col-xs-4">
                  <div class="radio">
                    <label>
                      <input ng-model-options="{ getterSetter: true }"
                             ng-model="orden.genero" 
                             type="radio" 
                             name="optionsRadios" 
                             id="radioMasculino" 
                             value="M">
                      Masculino
                    </label>
                  </div>
                </div>
                <div class="form-group col-xs-4">
                  <div class="radio">
                    <label>
                      <input ng-model-options="{ getterSetter: true }" ng-model="orden.genero" 
                             type="radio" 
                             name="optionsRadios" 
                             id="radioFemenino" 
                             value="F">
                      Femenino
                    </label>
                  </div>
                </div>
                        <div class="form-group col-xs-4">
                  <div class="radio">
                    <label>
                      <input ng-model-options="{ getterSetter: true }"
                             ng-model="orden.genero" 
                             type="radio" 
                             name="optionsRadios" 
                             id="radioAmbos" 
                             value="A">
                      Ambos
                    </label>
                  </div>
                </div>
              </div>
         <input class="btn btn-success " ng-click="ordenar()" value="Mostrar" type="button" id="mostrar"> 
           <button class="btn btn-link" ng-click="exportToExcel('#tabla_orden')" id="expexc">
        <span ></span> Exportar a Excel
    </button>
    </div>  
</form> 
       
      </div>
      <div>  
    <table  class="table table-striped table-hover table-bordered" id="tabla_orden"> 
         <br><br>
    <thead class="thead-inverse"> <tr> <th>Entidad</th><th>Tipo</th> <th>Total</th> <th>Genero</th> <th>0 a 2 años</th> <th>3 y 4 años</th> <th>5 y 6 años</th> <th>7 y 8 años</th> <th>9 y 10 años</th><th>Mayor a 10 años</th><th>Total Dis</th><th>Total Emb</th></tr> </thead>
    
    <tbody>
        <tr ng-repeat='b in lista'>
              <td>{{ b[0] }}  </td>
              <td>{{ b[1]}}  </td>
              <td>{{ b[2] }}  </td>
              <td>{{ b[3] }}  </td>
              <td>{{ b[4] }}  </td>
              <td>{{ b[5]}}  </td>
             <td>{{ b[6] }}  </td>
              <td>{{ b[7]}}  </td>
             <td>{{ b[8]}}  </td>
              <td>{{ b[9]}}  </td>
              <td>{{ b[10]}}  </td>
              <td>{{ b[11]}}  </td>
        </tr>    
    </tbody>
      
    </table>     
</div>
    </div>
  </section>
    
     <?php include 'php/foot.php' ?>

</body>
    <script type="text/javascript" >
 $(document).ready(function() {
  $( '#expexc' ).hide();
      document.getElementById("tipo_entidad").disabled = false;
       document.getElementById("entidad").disabled = false;
    $( '#mostrar' ).click(function(){
       document.getElementById("tipo_entidad").disabled = false;
       document.getElementById("entidad").disabled = false;
          $('#tipo_entidad').children().show();
          $('#entidad').children().show();
    });   
     
    $( '#entidad' ).change(function() {
    if ($('#entidad').val() ==0){
        document.getElementById("tipo_entidad").disabled = false;
        $('#tipo_entidad').children().hide();
        $('#tipo_entidad').children('option:nth-child(2)').show() ;
       
      } else{  document.getElementById("tipo_entidad").disabled = true;}        
    });
     
       $( '#tipo_entidad' ).change(function() {    
      if ($('#tipo_entidad').val() == 0){  
            document.getElementById("entidad").disabled = false;
             $('#entidad').children().hide();
             $('#entidad').children('option:nth-child(2)').show();
         
          }  else{ document.getElementById("entidad").disabled = true;}         
    });
     
        $( '#tabla_orden' ).hide();
        $( '#mostrar' ).click(function(){
    
            $( '#tabla_orden' ).fadeIn(2000);
     
          $( '#expexc' ).fadeIn(2000);
    });   
});
</script>
</html>