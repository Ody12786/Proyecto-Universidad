<?php
include("../database/connect_db.php");
session_start();

$sesion = $_SESSION['usuario'];

if ($sesion === null || $sesion === '') {
    header("location:../login.php");
}

$query = "SELECT tipo FROM usuario WHERE nombre = '$sesion'";
$resultado = $conex->query($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="../js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="../css/styleMenu.css" />
    <link rel="stylesheet" href="../css/modulos.css" />
    <link rel="stylesheet" href="../css/styleProductos.css" />
    <link rel="stylesheet" href="../Bootstrap5/css/bootstrap.min.css" />
    <title>Gestión de Proveedores</title>
</head>

<body>
    <div class="contenedor">
        <div class="opciones">
            <div class="contlogo"></div>
            <div class="menu" id="menu">
                <?php while ($row = mysqli_fetch_row($resultado)) { ?>
                    <div class="opcion usu" id="mUsu">
                        <img src="../img/usu.svg" alt="" title="Usuarios" class="usu" />
                        <h4 class="usu">Usuarios</h4>
                    </div>
                    <input type="hidden" id="delegation" value="<?php echo $row[0]; ?>" />
                <?php } ?>
                <div class="opcion pro" id="mPro">
                    <img src="../img/truck.svg" alt="" title="Proveedores" class="pro" />
                    <h4 class="pro">Proveedores</h4>
                </div>
                <div class="opcion mat" id="mMat">
                    <img src="../img/materia.svg" alt="" title="Materia Prima" class="mat" />
                    <h4 class="mat">Materia</h4>
                </div>
                <div class="opcion produ" id="mProd">
                    <img src="../img/carpeta.svg" alt="" title="Productos" class="produ" />
                    <h4 class="produ">Productos</h4>
                </div>
                <div class="opcion cli" id="mCli">
                    <img src="../img/carpeta.svg" alt="" title="Clientes" class="cli" />
                    <h4 class="cli">Clientes</h4>
                </div>
                <div class="opcion ven" id="mVentas">
                    <img src="../img/crecer.svg" alt="" title="Ventas" class="ven" />
                    <h4 class="ven">Ventas</h4>
                </div>
            </div>
        </div>

        <section class="sub-menu">
            <div class="registro">Registrar</div>
            <div class="ver">Ver Proveedores</div>
            <div class="volver">Cerrar sesión</div>
        </section>

        <!-- Formulario Registro Proveedor -->
        <div class="registro_proveedor" id="mostrar">
            <div class="encabezado">
                <h4>Registro Proveedor</h4>
                <hr />
            </div>
            <div class="seccion_persona">
                <form id="proveedorForm" action="../registro/registro_proveedor.php" method="POST">
                    <input type="text" name="rif" id="rif" placeholder="Ingrese el RIF, ej: J-12345678" minlength="8" maxlength="12" autofocus required />
                    <input type="text" name="nombres" id="nombres" placeholder="Nombres" minlength="3" maxlength="50" required />
                    <input type="text" name="empresa" id="empresa" placeholder="Empresa" minlength="3" maxlength="50" required />
                    <input type="text" name="contacto" id="contacto" placeholder="Contacto" minlength="3" maxlength="50" required />
                    <div class="columnn">
                        <input type="submit" name="enviar" id="proveedores" class="btn-avz" value="Registrar" />
                    </div>
                </form>
                <div id="mensajeRegistro" style="margin-top: 10px;"></div>
            </div>
        </div>

        <!-- Tabla de Proveedores -->
        <div class="mostrarTabla" id="ver">
            <div class="tabla_proveedor">
                <div class="encabezado">
                    <h4>Lista de Proveedores</h4>
                    <hr />
                </div>
                <div class="cuadro">
                    <label for="solipro">Búsqueda de Proveedor</label>
                    <input type="search" class="solicitud" id="solipro" placeholder="Buscar..." />
                </div>
                <div>
                    <table width="100%" class="table">
                        <thead>
                            <tr>
                                <th>RIF</th>
                                <th>Nombres</th>
                                <th>Empresa</th>
                                <th>Contacto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <div class="text-right mb-3" style="margin-top: 10px;">
                        <a href="../vistas/imprimir_proveedores.php" class="btn btn-danger" target="_blank" style="display: inline-block;">
                            <img src="../img/fpdf.svg" alt="Reporte PDF" style="width: 24px; height: 24px; cursor: pointer;" />
                        </a>
                        <tbody id="inpor2" class="ver-proveedores">
                            <!-- Filas dinámicas con proveedores -->
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="mensajes"></div>
    </div>

    <!-- Modal Editar Proveedor -->
    <div class="modal fade" id="modalEditarProveedor" tabindex="-1" aria-labelledby="modalEditarProveedorLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditarProveedor">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarProveedorLabel">Editar Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_rif_original" name="rif_original" />
                        <div class="mb-3">
                            <label for="edit_rif" class="form-label">RIF</label>
                            <input type="text" class="form-control" id="edit_rif" name="rif" required minlength="8" maxlength="12" readonly />
                        </div>
                        <div class="mb-3">
                            <label for="edit_nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="edit_nombres" name="nombres" required minlength="3" maxlength="50" />
                        </div>
                        <div class="mb-3">
                            <label for="edit_empresa" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="edit_empresa" name="empresa" required minlength="3" maxlength="50" />
                        </div>
                        <div class="mb-3">
                            <label for="edit_contacto" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="edit_contacto" name="contacto" required minlength="3" maxlength="50" />
                        </div>
                        <div id="mensajeEditar" class="text-danger"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include("inferior.html"); ?>

    <!-- Scripts -->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../Bootstrap5/js/bootstrap.bundle.min.js"></script>
    <script src="../js/eventos.js"></script>
    <script src="../js/efectos.js"></script>
    <script src="../js/registro_proveedor.js"></script>
    <script src="../js/rutas.js"></script>
    <script src="../js/campos.js"></script>
    <script src="../js/tabla_proveedor.js"></script>
</body>

</html>
