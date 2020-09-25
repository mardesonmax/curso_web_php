<? 
    session_start();

    $user = $_SESSION['autenticado'];

    if(!isset($user) || $user != 'SIM') {

      header('Location: index.php?login=erro2');
    }  

?>