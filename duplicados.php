<!DOCTYPE html>

<html>
<head>   
    <title>Duplicados</title>
  <meta charset="utf-8">
    <?php include 'php/imports.php' ?>
   
 
</head>
    <?php include 'php/header.php' ?>
<body class="ng-scope" ng-app="AppRegistroJuguetes" ng-controller="Duplicados_CTRL">

<section>
    <div class="container ">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h3 class="titulo">REGISTRO DE DOBLES INSCRITOS</h3>
                 <h4 class="titulo">La primera inscripcion es la que se toma en cuenta para la entrega de juguetes, la segunda es un registro para controlar beneficiarios anotados en mas de una sede.</h4>
        </div>
      </div>
<form> 
     <div class="col-sm-4 col-sm-offset-4 ">
         
         
         <br>
         <input class="btn btn-success " ng-click="listar_dup()" value="Mostrar" type="button" id="mostrar_lista">
         <button class="btn btn-link" ng-click="exportToExcel('#tabla_dup')" id="expexc">
        <span ></span> Exportar a Excel
    </button>
    </div>
</form> 
        
 <br>    
      
<div style="padding-top:3%">     
    <table class="table table-striped table-hover table-bordered " id="tabla_dup"> 
         <br><br>     
    <thead class="thead-inverse"> <tr> <th>#</th> <th>Rut</th> <th>Nombre</th><th>Inscrito en</th> <th>Fecha</th> <th>Inscrito por</th><th>2do intento en</th><th>Nombre2</th><th>Fecha</th><th>Por</th></tr> </thead>   
        <tbody>
        <tr ng-repeat='b in lista'>
              <td>{{ $index + 1}}  </td>
              <td>{{ b[0] }}  </td>
              <td>{{ b[1] }}  </td>
              <td>{{ b[2] }}  </td>
              <td>{{ b[3] }}  </td>
              <td>{{ b[4] }}  </td>
             <td>{{ b[5] }}  </td>
             <td>{{ b[6] }}  </td>
             <td>{{ b[7] }}  </td>
             <td>{{ b[8] }}  </td>
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
//    $( '#entidad' ).change(function() {
//      var ent=  $('#entidad :selected').text();
//           $( '#entidad' ).append(ent+"ff");
//    });
     
     
    $( '#expexc' ).hide();
    // $('#tabla_listar').DataTable();
    $( '#tabla_listar' ).hide();
    $( '#mostrar_lista' ).click(function(){
      //   $( '#tabla_listar' ).hide();

            $( '#tabla_listar' ).fadeIn(2000);
             /// $('#tabla_listar').DataTable();
              $( '#expexc' ).fadeIn(2000);
       
    });   
     
   
});
</script> 
    
</html>