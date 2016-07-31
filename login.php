<html  ng-app="AppRegistroJuguetes">
<head>
        <title>Login</title>
    <?php include 'php/imports.php' ?>
<!--    <script type="text/javascript" src="js/controllers/login.js"></script>-->
</head> 
<body class="ng-scope"    ng-controller="Login_Ctrl">
    
  <section>
    <div class="container ">
      <div class="row invert">
        <div class="col-xs-12 text-center">
          <h3 class="titulo">Login</h3>
        </div>
      </div>
      

      <div class="row section-padding">
        <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
            
    <form  name="FormLogin" ng-submit="onLogin(credentials)">   
                <label for="user">Usuario</label>
                <div class="form-group">
                <input required 
                       ng-model="credentials.user"
                       type="text" 
                       class="form-control" 
                       placeholder="" 
                       id="user"   >
              </div>
        
            <label for="pass">Contraseña</label>
                <div class="form-group">
                <input required 
                       ng-model="credentials.pass"
                       type="password" 
                       class="form-control" 
                       placeholder="" 
                       id="pass" >
              </div>
           
              <div class="boton text-center">
                <input value="Entrar" 
                       class="btn btn-primary" 
                       type="submit">
              </div>
          </form>
        </div>
      </div>  
    </div>
  </section>   

  
    
    </body>
   
    
    
    
    
   <?php include 'php/foot.php' ?> 
</html>