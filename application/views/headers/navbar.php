<nav  class="navbar navbar-expand-lg navbar-dark " style="background-color: #145A32;">
  <a class="navbar-brand"  href="<?=base_url()?>index.php/Main">PRODEAMA</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <span class="nav-item">
                <a class="nav-link active" href="#">Bienvenid@: <?=$this->session->userdata('user')?> </a>
        </span>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url()?>index.php/Main">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?=base_url()?>index.php/Usuarios">Crear usuario</a>          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=base_url()?>index.php/Usuarios/tipos_usuarios">Crear tipo</a>
        </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>index.php/Recepcion/Vconsulta_adultos">Busqueda<span class="sr-only">(current)</span></a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>index.php/Recepcion/presencial">Presencial<span class="sr-only">(current)</span></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>index.php/Recepcion/telefonico">Telefónica<span class="sr-only">(current)</span></a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>index.php/Trab_social">TS <span class="sr-only">(current)</span></a>
      </li>    
    </ul>
    <span class="nav-item">                
        <a class="nav-link active" href="<?=base_url()?>index.php/main/logout">Cerrar Sesion <span class="sr-only">(current)</span></a>
      </span>
  </div>
</nav>