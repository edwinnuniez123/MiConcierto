    


    <?php
       require_once('auth.php');
    ?>

     
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Home</title>
        <style type="text/css">
      <!--
        .style1 {
        font-size: 36px;
        font-weight: bold;
        }
       -->
        </style>
      </head>
     
    <body>
       <?php
      
      session_set_cookie_params(0,"/");
    
      //Start session
      session_start();
      echo $_SESSION['SESS_FIRST_NAME'];

      ?>
      <p align="center" class="style1">Sesion Iniciada </p>
      <p align="center">Esta es la pagina principal</p>
      <p align="center"><a href="login.php">logout</a></p>
    </body>
   </html>
