<!DOCTYPE html>
<html lang="en">

<head>
<title>Usuario</title>
<?php 
    include 'complemento/header.php';
    include "complemento/sidebar.php";
?>
</head>
<body class="bg-gradient-primary">
<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php include 'complemento/nav.php'; ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="container">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/web.jpg" alt="Imagen de login" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><b>Registrar usuario</b></h1>
                                            </div>
                                            <form class="user" action="?pagina=usuario" method="post">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control " id="nombre" name="nombre"
                                                            placeholder="Ingrese el nombre" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control " id="apellido" name="apellido"
                                                            placeholder="Ingrese el apellido" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control " id="correo" name="correo"
                                                        placeholder="Correo electrónico" required>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="test" class="form-control " id="user" name="user"
                                                        placeholder="Nombre de usuario" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control " id="perfil" name="perfil" required>    
                                                        <option value="" selected disabled>Seleccione un rol</option>
                                                        <?php foreach($perfil as $p): ?>
                                                                <option value="<?php echo $p['cod_perfil']; ?>">
                                                                    <?php echo $p['nombre']; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                                                </div>
                                                <button name="registrar" class="btn btn-primary btn-block">
                                                    Registrar
                                                </button>
                                                <hr>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php include 'complemento/footer.php'; ?>