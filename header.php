<div class="container">
    <div class="title">
      <h1>Melting Potes</h1>
    </div>
  <?php
  if(isset($_SESSION['id'])){
    ?>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=professeur&action=levelAndProfSelect">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Présentation<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cours
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?controller=cours&action=itdeb">Cours IT debutant</a>
            <a class="dropdown-item" href="index.php?controller=cours&action=itint">Cours IT intermédiaire</a>
            <a class="dropdown-item" href="index.php?controller=cours&action=itava">Cours IT avancé</a>
            <a class="dropdown-item" href="index.php?controller=cours&action=frdeb">Cours FR débutant</a>
            <a class="dropdown-item" href="index.php?controller=cours&action=frint">Cours FR intermédiaire</a>
            <a class="dropdown-item" href="index.php?controller=cours&action=frava">Cours FR avancé</a>
          </div>
        </li>        
      </ul>
      <li class="nav-item">
          <a href="index.php?controller=logout&action=deconnection" id="logout"><i class="fas fa-times"></i></a>
      </li>
      <div class="text_content" id="text">Déconnexion</div>
    </div>
  </nav>
  <?php
  }elseif(isset($_SESSION['id_eleve'])){
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Présentation<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <div class="text_content" id="text">Déconnexion</div>
      <li class="nav-item">
          <a href="index.php?controller=logout&action=deconnection" id="logout"><i class="fas fa-times"></i></a>
      </li>
    </div>
  </nav>
      
    <?php
    }else{
      ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=pages&action=home">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Présentation<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=eleve&action=connexion">
              Activation compte
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cours
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?controller=cours&action=itdeb">Cours IT debutant</a>
              <a class="dropdown-item" href="index.php?controller=cours&action=itint">Cours IT intermédiaire</a>
              <a class="dropdown-item" href="index.php?controller=cours&action=itava">Cours IT avancé</a>
              <a class="dropdown-item" href="index.php?controller=cours&action=frdeb">Cours FR débutant</a>
              <a class="dropdown-item" href="index.php?controller=cours&action=frint">Cours FR intermédiaire</a>
              <a class="dropdown-item" href="index.php?controller=cours&action=frava">Cours FR avancé</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=eleve&action=contact">Contact</a>
          </li>
          
        </ul> 
        
      </div>
          <li class="nav-item active">
            <a class="nav-link" id="Bouton" href="#">Connexion</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" id="Bouton2" href="#">Espace professeur</a>
          </li>
      </nav>
      <div id="form" style="display:none" class="form">
            <form action="index.php?controller=eleve&action=login" method="POST">
                <input class="input" type="text" placeholder="Email" name="email">
                <input class="input" type="password" placeholder="Password" name="password">
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
            <a href="index.php?controller=eleve&action=forget">Mot de passe oublié</a>
        </div>
        <div id="form2" style="display:none" class="form2">
            <form action="index.php?controller=professeur&action=connexionverif" method="POST">
                <input class="input2" type="text" placeholder="Login" name="login">
                <input class="input2" type="password" placeholder="Password" name="password">
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
        <?php
    }
    ?>
    </div>
</div>

<script>
    var js = document.createElement('script');
    js.type = 'text/javascript';
    js.src = 'scripts/connexion.js' ;
    //Ajout de la balise dans la page
    document.body.appendChild(js);
</script> 