

    <?php

      
       session_set_cookie_params(0,"/");
      //Start session
      session_start();
     // Inicializar la sesión.
// Si está usando session_name("algo"), ¡no lo olvide ahora!


// Destruir todas las variables de sesión.


// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
//if (ini_get("session.use_cookies")) {
  //  $params = session_get_cookie_params();
    //setcookie(session_name(), '', time() - 300,
      //  $params["path"], $params["domain"],
        //$params["secure"], $params["httponly"]
   // );
//}

// Finalmente, destruir la sesión.
//session_destroy();
       //Check whether the session variable SESS_MEMBER_ID is present or not
       if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
         
         header("location: login.php");
         exit();
       }
      
    ?>
