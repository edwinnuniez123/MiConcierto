<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuario ";
        $q = $pdo->prepare($sql);
        
        $data = $q->fetch(PDO::FETCH_ASSOC);
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
                        <h3>Read a Customer</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                    
                      <div class="control-group">
                        <label class="control-label">IdUsuario</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['idusuario'];?>
                            </label>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Usuario</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['usuario'];?>
                            </label>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">contrasenia</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['contrasenia'];?>
                            </label>
                        </div>
                      </div>
                      
                       <div class="control-group">
                        <label class="control-label">nombre</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nombre'];?>
                            </label>
                        </div>
                      </div>
                      
                       <div class="control-group">
                        <label class="control-label">correo</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['correo'];?>
                            </label>
                        </div>
                      </div>
                      
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

