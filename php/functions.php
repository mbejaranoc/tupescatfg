<?php

/*Cambios POVUV */
function pintar($var, $label = ''){
    $styleRules = 'margin:50px 10px 10px 10px; padding:10px; white-space:pre; width:100%;';
    if($label != ''){$label = '<h3>'.$label.'</h3>'; }
    if(is_array($var) || is_object($var)){
        echo '<pre style="'.$styleRules.'">'.$label; print_r($var); echo '</pre>';
    }else{
        echo '<pre style="'.$styleRules.'">'.$label.$var.'</pre>';
    }
}
function mostrarMensaje(){
    if(!empty($_SESSION['mensaje'])){
        echo '<div class="mensaje">'.$_SESSION['mensaje'].'</div>';
        $_SESSION['mensaje'] = '';
    }
}
function getUser($session){
    $user = array();
    if(isset($session['user'])){
        $user['id']           = $session['user']['id'];
        $user['user']         = $session['user']['user'];
        $user['user_type']    = $session['user']['user_type'];
        $user['access_level'] = getAccessLevel($session['user']['user_type']);
    }else{
        $user['id']           = 0;
        $user['user']         = 'public';
        $user['user_type']    = 'public';
        $user['access_level'] = 0;
    }
    return $user;
}
function getAccessLevel($userType = ''){
    switch($userType){
        case 'administrador':
            $accessLevel = 3;
            break;
        case 'comercial':
            $accessLevel = 2;
            break;
        case 'invitado':
            $accessLevel = 1;
            break;
        default:
            $accessLevel = 0;
            break;
    }
    return $accessLevel;
}
/*FIN Cambios POVUV */

/**
 * Used to store different static data.
 *
 * @var array
 */
$config = [
    'name' => 'Tu Pesca Día a Día',
];

/**
 * Displays site name. Uses $config global.
 */
function siteName()
{
    global $config;
    echo $config['name'];
}

/**
 * Displays page title. It takes the data from 
 * URL, it replaces the hyphens with spaces and 
 * it capitalizes the words.
 */
function pageTitle()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';

    echo ucwords(str_replace('-', ' ', $page));
}

/**
 * Displays page content. It takes the data from 
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function pageContent($acceso)
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    $path = getcwd().'/pages/'.$page.'.php';

    if (file_exists($path)) {
        if ($acceso > 0){
            include $path;
        }else{
            include 'pages/404.php';
        }
    } else {
        include 'pages/404.php';
    }
}
?>