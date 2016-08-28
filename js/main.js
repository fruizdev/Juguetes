var app = angular.module('AppRegistroJuguetes',[]);

app.factory('Excel',function($window){
        var uri='data:application/vnd.ms-excel;base64,',
            template='<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><meta charset="UTF-8"><body><table>{table}</table></body></html>',
            base64=function(s){return $window.btoa(unescape(encodeURIComponent(s)));},
            format=function(s,c){return s.replace(/{(\w+)}/g,function(m,p){return c[p];});};
        return {
            tableToExcel:function(tableId,worksheetName){
                var table=$(tableId),
                    ctx={worksheet:worksheetName,table:table.html()},
                    href=uri+base64(format(template,ctx));
                return href;
            }
        };
    }).controller('Main_CTRL',function($scope,$rootScope){
    
    if(localStorage['token']===undefined){
         window.location.href = "login.php";  
    }else{      
           $scope.getUser = localStorage.getItem('user')   ;     }
    
//     $scope.onLogout = function() {
//         
//     }
    
    
    })
    
    .controller('Login_Ctrl',function($scope, $http, $templateCache,$rootScope){
     localStorage.clear();
    
      $scope.respuesta_login = "";    
      $scope.onLogin = function(credentials) {
        
       var FormData =    $.param({"login_params": JSON.stringify(credentials)});
   
      $http({
      method: 'POST',
      url: 'php/POST_Login.php',
      data: FormData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      cache: $templateCache
    }).
    success(function(response) {
        $scope.respuesta_login = response.data;  
          if(response.data==1){     
          $rootScope.user=response.user;
          localStorage.setItem('user',JSON.stringify(response.user));
          localStorage.setItem('token',JSON.stringify(response.token));
        
          window.location.href = "index.php";            
          }else{alert('Login incorrecto');$scope.credentials=''}
    }).     
    error(function(response) {
        $scope.respuesta_login = response || "Request failed";
    });
    return false;
  };
      
}).controller('Insc_Ctrl',function($scope, $http, $templateCache){
        $scope.benef = {user:localStorage.getItem('user') }  ; 
        $scope.entidad = null;
        $scope.entidades = [];  
    $http({method: 'GET',url: 'php/Get_ent_insc.php'    
        }).success(function (result) {
        $scope.entidades = result.data;       
    }); 
      var method = 'POST';
      var url = 'php/POST_Inscribir.php';
      $scope.codeStatus = "";
      $scope.onSubmit = function() {
        var FormData =    $.param({"inscripcion": JSON.stringify($scope.benef)});
    $http({
          method: method,
          url: url,
          data: FormData,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          cache: $templateCache
    }).
    success(function(response) {
          $scope.codeStatus = "Ultimo Inscrito: "+ $scope.benef.nombre1+" " +$scope.benef.apellido1;  
          alert(response.data);
          $scope.benef = '';
          $scope.benef = {user:localStorage.getItem('user') }  ; 
    }).
    error(function(response) {
        $scope.codeStatus = response || "Request failed";
    });
    return false;
  };
    
})
    
    
    .controller('Lista_CTRL',function($scope, $http, $templateCache,Excel,$timeout){
       
      $scope.exportToExcel=function(tableId){ // ex: '#my-table'            
            $scope.exportHref=Excel.tableToExcel(tableId,'Listado de inscritos');
            $timeout(function(){location.href=$scope.exportHref; }, 100); // trigger download
        }
    $scope.entidades = [];    
    $http({method: 'GET',url: 'php/Get_ent.php'}).
    success(function (result) {$scope.entidades = result.data;}); 
      
      $scope.codeStatus = "";  
      $scope.listar = function() {           
     if ( $scope.listar_model){      
        $http({method: 'GET',
          url: 'php/GET_Listar.php',
          params:$scope.listar_model,         
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          cache: $templateCache
        }).success(function(response) {
          if (response.data == 0){
              alert('No existen registros para esta consulta');
          }else{  $scope.lista = response.data;}              
        }). error(function(response) {
            $scope.codeStatus = response || "Request failed";
        });
        return false;
     }else{alert('venia sin parametros');}           
      };
         
}).controller('OrdenarCTRL',function($scope, $http, $templateCache,Excel,$timeout){
       
              $scope.exportToExcel=function(tableId){ // ex: '#my-table'            
                    $scope.exportHref=Excel.tableToExcel(tableId,'Agrupaciones por edades');
                    $timeout(function(){location.href=$scope.exportHref; }, 100); // trigger download
                }
                $scope.entidades = [];
                $http({method: 'GET',url: 'php/Get_ent.php'    
                }).success(function (result) {
                $scope.entidades = result.data;       
            }); 

                $scope.tipos = [];
                $http({method: 'GET',url: 'php/GET_tipo_ent.php'    
                }).success(function (result) {
                $scope.tipos = result.data;       
            });  

          var method = 'GET';
          var url = 'php/GET_OrdenarPorEdad.php';
          $scope.codeStatus = "";

          $scope.ordenar = function() {
            var pasa=false;    
            if($scope.orden){      
            if($scope.orden.genero ){
                  if($scope.orden.entidad){ pasa=true;
                    }else{if ($scope.orden.tipo_entidad)
                      pasa=true;    
                } }else {pasa = false;}
        }else{pasa = false;}

          if(pasa){  
          var FormData = $scope.listar_model;
          var FormParams= $scope.orden;
            $http({
              method: method,
              url: url,
              params:FormParams,         
              headers: {'Content-Type': 'application/x-www-form-urlencoded'},
              cache: $templateCache
            }).
            success(function(response) {
                 if (response.data==0)
                     alert('No existen registros para esta consulta');          
                $scope.lista = response.data;                  
                $scope.orden='';
            }).
            error(function(response) {
                $scope.codeStatus = response || "Request failed";
            });
            return false;
          }else{alert('faltan parametros');}

  };
         
}).controller('CrearEntidad_Ctrl',function($scope, $http, $templateCache){
    $scope.tipo_entidad = null;
    $scope.tipos = [];
    
    $http({method: 'GET',url: 'php/Get_tipo_ent_insc_ent.php'    
        }).success(function (result) {
        $scope.tipos = result.data;
       
    });
    
  var method = 'POST';
  var url = 'php/POST_Entidad.php';
  $scope.respuesta_crear_entidad = "";
  $scope.onSubmitEntidad = function() {     
    var FormData =    $.param({"crear_entidad": JSON.stringify($scope.entidad)});
    $http({
      method: method,
      url: url,
      data: FormData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      cache: $templateCache
    }).
    success(function(response) {      
          $scope.respuesta_crear_entidad = response.data;
          alert(response.data);     
          $scope.entidad = '';  
    }).
    error(function(response) {
        $scope.respuesta_crear_entidad = response || "Request failed";
    });
    return false;
  };
    
}).controller('Duplicados_CTRL',function($scope, $http, $templateCache,Excel,$timeout){
       
      $scope.exportToExcel=function(tableId){ // ex: '#my-table'            
            $scope.exportHref=Excel.tableToExcel(tableId,'Listado de doble inscripción');
            $timeout(function(){location.href=$scope.exportHref; }, 100); // trigger download
        }
 
      
    $scope.codeStatus = "";  
    
    $scope.listar_dup = function() {           
       
        $http({method: 'GET',
          url: 'php/GET_Duplicados.php',
        //  params:$scope.listar_model,         
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          cache: $templateCache
        }).success(function(response) {
          if (response.data == 0){
              alert('No existen registros para esta consulta');
          }else{  $scope.lista = response.data;}              
        }). error(function(response) {
            $scope.codeStatus = response || "Request failed";
        });
        return false;
 
           
      };
         
});