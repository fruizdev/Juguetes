  <header ng-controller="Main_CTRL" class="ng-scope">
       
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-navegacion" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Acuérdate de Mí</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu-navegacion">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="entidades.php">Crear Entidades</a></li>
            <li><a href="inscribir.php">Inscripción</a></li> 
<!--            <li><a href="buscar.php">Busqueda por rut</a></li>-->
            <li><a href="listar.php">Listar Inscritos</a></li>
            <li><a href="ordenar.php">Ordenar por edades</a></li>
                <li><a href="duplicados.php">Ver dobles inscripciones</a></li>
              <li><a >{{getUser}}</a></li>
               <li><a href="login.php" ng-click="Logout()">Salir</a></li>
          </ul>
      
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
  </header>