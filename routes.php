<?php
function call($controller, $action) {
// require the file that matches the controller name
require_once('controllers/' . $controller . '_controller.php');
// create a new instance of the needed controller
switch($controller) {
case 'pages':
    $controller = new PagesController();
    break;
case 'professeur':
    require_once('models/date.php');
    require_once('models/niveau.php');
    require_once('models/cours.php');
    require_once('models/telechargement.php');
    require_once('models/professeurs.php');
    $controller = new ProfesseurController();
    break;
case 'eleve':
    require_once('models/telechargement.php');
    require_once('models/cours.php');
    require_once('models/niveau.php');
    require_once('models/eleve.php');
    $controller = new EleveController();
    break;
case 'cours':
    require_once('models/date.php');
    require_once('models/professeurs.php');
    require_once('models/cours.php');
    require_once('models/niveau.php');
    $controller = new CoursController();
    break;
case 'admin':
    require_once('models/date.php');
    require_once('models/admin.php');
    require_once('models/niveau.php');
    require_once('models/cours.php');
    require_once('models/eleve.php');
    $controller = new AdminController();
    break;
case 'telechargement':
    require_once('models/date.php');
    require_once('models/professeurs.php');
    require_once('models/cours.php');
    require_once('models/niveau.php');
    require_once('models/telechargement.php');
    $controller = new TelechargementController();
    break;
case 'logout':
    $controller = new DeconnectionController;
    break; 
}
// call the action
$controller->{ $action }();
}
// just a list of the controllers we have and their actions
// we consider those "allowed" values

$controllers = array('pages' => ['home', 'error'],
                     'eleve' => ['eleve', 'login', 'eleveinscription', 'contact', 'connexion', 'inscriptiondef', 'update_niveau', 'show_student_level', 'get_niveau_eleve_1'],
                     'professeur' => ['professeur', 'levelAndProfSelect', 'connexion', 'connexionverif', 'erreur'],
                     'cours' => ['addcours', 'coursselect', 'listeNiveau', 'modifier', 'modifierresult', 'supprimer', 'ajouter', 'ajouterresult', 'frava', 'frdeb', 'frint', 'itava', 'itdeb', 'itint'],
                     'admin' => ['showAdmin', 'adminverif', 'connected'],
                     'telechargement' => ['ajout_telechargement','supprimer', 'modifier', 'modifierresult'],
                     'logout' => ['deconnection']
                    );
// check that the requested controller and action are both allowed
// if someone tries to access something else he will be redirected to the error action of the pages controller
if (array_key_exists($controller, $controllers)) {
if (in_array($action, $controllers[$controller])) {
call($controller, $action);
} else {
echo 'erreur d\'action';
}
} else {
echo 'erreur de controller';
}