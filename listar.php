

<html>
<head>   
    <title>Listados</title>
      <?php include 'php/imports.php' ?>
</head>
<!--    <script type="text/javascript" src="js/controllers/lista2.js"></script> -->
 <?php include 'php/header.php' ?>    
<body class="ng-scope" ng-app="AppRegistroJuguetes" ng-controller="Lista_CTRL">

<section>
    <div class="container ">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h3 class="titulo">LISTAR INSCRITOS</h3>
        </div>
      </div>
<form> 
     <div class="col-sm-4 col-sm-offset-4 ">
            <select required ng-model="listar_model.entidad" 
                                ng-options="item.Id as item.Nombre for item in entidades"
                                class="form-control" 
                                placeholder="Entidad" 
                                id="entidad">
               <option value="">Seleccionar Entidad</option>
        </select>
         
         <br>
         <input class="btn btn-success " ng-click="listar()" value="Mostrar" type="button" id="mostrar_lista">
         <button class="btn btn-link" ng-click="exportToExcel('#tabla_listar')" id="expexc">
        <span ></span> Exportar a Excel
    </button>
    </div>
</form> 
        
 <br>    
      
<div style="padding-top:3%">     
    <table class="table table-striped table-hover table-bordered " id="tabla_listar"> 
         <br><br>     
    <thead class="thead-inverse"> <tr> <th>#</th><th>Nombre</th> <th>Rut</th> <th>Edad</th> <th>Genero</th> <th>Dirección</th></tr> </thead>   
        <tbody>
        <tr ng-repeat='b in lista'>
              <td>{{ $index + 1}}  </td>
              <td>{{ b[0] }}  </td>
              <td>{{ b[1] }}  </td>
              <td>{{ b[2] }}  </td>
              <td>{{ b[3] }}  </td>
              <td>{{ b[4] }}  </td>
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