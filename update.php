<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $idusuarioError = null;
        $usuarioError = null;
        $contraseniaError = null;
        $nombreError = null;
        $correoError = null;
         
        // keep track post values
        $idusuario = $_POST['idusuario'];
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
         
        // validate input
        $valid = true;
        if (empty($idusuario)) {
            $idusuarioError = 'Please enter IdUsuario';
            $valid = false;
        }
         
         if (empty($usuario)) {
            $usuarioError = 'Please enter Usuario';
            $valid = false;
        }
        
         if (empty($contrasenia)) {
            $contraseniaError = 'Please enter Contraseña';
            $valid = false;
        } 

        if (empty($correo)) {
            $correoError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($correo,FILTER_VALIDATE_EMAIL) ) {
            $correoError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
         
        if (empty($nombre)) {
            $nombreError = 'Please enter Nombre';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE usuario  set idusuario = ?, usuario = ?, contrasenia =?, nombre = ?, correo =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($idusuario,$usuario,$contrasenia,$nombre,$correo,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuario where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $idusuario = $data['idusario'];
        $usuario = $data['usuario'];
        $contrasenia = $data['contrasenia'];
        $nombre = $data['nombre'];
        $correo = $data['correo'];
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                    
                      <div class="control-group <?php echo !empty($idusuarioError)?'error':'';?>">
                        <label class="control-label">IdUsuario</label>
                        <div class="controls">
                            <input name="idusuario" type="text"  placeholder="IdUsuario" value="<?php echo !empty($idusuario)?$idusuario:'';?>">
                            <?php if (!empty($idusuarioError)): ?>
                                <span class="help-inline"><?php echo $idusuarioError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($usuarioError)?'error':'';?>">
                        <label class="control-label">Usuario</label>
                        <div class="controls">
                            <input name="usuario" type="text" placeholder="Usuario" value="<?php echo !empty($usuario)?$usuario:'';?>">
                            <?php if (!empty($usuarioError)): ?>
                                <span class="help-inline"><?php echo $usuarioError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($contraseniaError)?'error':'';?>">
                        <label class="control-label">Contraseña</label>
                        <div class="controls">
                            <input name="contrasenia" type="password"  placeholder="Contrasenia" value="<?php echo !empty($contrasenia)?$contrasenia:'';?>">
                            <?php if (!empty($contraseniaError)): ?>
                                <span class="help-inline"><?php echo $contraseniaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
                        <label class="control-label">Nombre</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="control-group <?php echo !empty($correoError)?'error':'';?>">
                        <label class="control-label">Correo</label>
                        <div class="controls">
                            <input name="correo" type="text"  placeholder="Correo" value="<?php echo !empty($correo)?$correo:'';?>">
                            <?php if (!empty($correoError)): ?>
                                <span class="help-inline"><?php echo $correoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

