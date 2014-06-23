
<?php
     


      session_set_cookie_params(0,"/");
      //Start session
        session_start();	
      //Unset the variables stored in session
         unset($_SESSION['SESS_MEMBER_ID']);
         unset($_SESSION['SESS_FIRST_NAME']);
         unset($_SESSION['SESS_LAST_NAME']);
         unset($_SESSION['NOMBRE']);
         unset($_SESSION['IdeventoPorUser']);
   
  
      
    ?>

<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilo.css" type="text/css" media="screen" />    
    <script>
      window.addEventListener('load',selcampo,false);
      function selcampo() {
      document.getElementById("us").select();
      }
    </script>        

    

  </head>

  <body>
    
    <div align='center' id='est'>
    <form name="loginform" action="login_exec.php" method="post">
    <table width="309" border="0" align="center" cellpadding="2" cellspacing="5">
    <tr>
    <td colspan="2">
    <!--the code bellow is used to display the message of the input validation-->
    <?php
    if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
    echo '<ul class="err">';
    foreach($_SESSION['ERRMSG_ARR'] as $msg) {
    echo '<li>',$msg,'</li>';
    }
    echo '</ul>';
    unset($_SESSION['ERRMSG_ARR']);
    }
    ?>
    </td>
    </tr>
    <tr>
    <td width="116"><div align="right">Usuario</div></td>
    <td width="177"><input name="usuario" type="text" id="us" /></td>
    </tr>
    <tr>
    <td><div align="right">Password</div></td>
    <td><input name="password" type="password" /></td>
    </tr>
    <tr>
    <td><div align="right"></div></td>
    <td><input name="" type="submit" value="login" /></td>
    </tr>
    <tr>
    <td><div align="right"></div></td>
     <td><p><a href="registro.php">Registrar</a></p></td>
    </tr>
 
    </table>
    </form>
    </div>
  </body>
</html>
