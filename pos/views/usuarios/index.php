<?php include_once "views/templates/header.php"; ?>

<div class="card">
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-usuarios-tab" data-bs-toggle="tab" data-bs-target="#nav-usuarios" type="button" role="tab" aria-controls="nav-usuarios" aria-selected="true">Usuarios</button>
                <button class="nav-link" id="nav-nuevo-tab" data-bs-toggle="tab" data-bs-target="#nav-nuevo" type="button" role="tab" aria-controls="nav-nuevo" aria-selected="false">Nuevo</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-4" id="nav-usuarios" role="tabpanel" aria-labelledby="nav-usuarios-tab" tabindex="0">

                <h5 class="card-title"><i class="fas fa-user"></i> Lista de usuarios</h5>
                <hr>
                <table class="table table-bordered table-striped table-hove" style="width:100%;" id="tblUsuario">
                    <thead>
                        <tr>
                            <th>#DNI</th>
                            <th>Usuario</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Rol</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-nuevo" role="tabpanel" aria-labelledby="nav-nuevo-tab" tabindex="0">
                <form method="POST" class="p-5" id="formRegistrar" autocomplete="off">
                    <div class="row mt-4">
                        <div class="col-lg-4 col-sm-6">
                            <label for="nombre">Nombre</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-circle-user"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Nombre completo" name="nombre" id="nombre">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <label for="apellido">Apellido</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-circle-user"></i></span>
                                <input type="text" class="form-control" placeholder="Apellido completo" name="apellido" id="apellido">
                            </div>
                        </div>
                        <div class=" col-lg-4 col-sm-6">
                            <label for="dni">Documento de identidad</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-circle-user"></i></span>
                                <input type="text" class="form-control" placeholder="Documento de identidad " name="dni" id="dni">
                            </div>
                        </div>
                        <div class=" col-lg-8 col-sm-6">
                            <label for="mail">Correo electrónico</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-regular fa-paper-plane"></i></span>
                                <input type="email" class="form-control" placeholder="Correo electrónico " name="mail" id="mail">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <label for="Usuario">Usuario</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Usuario" name="user" id="user">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <label for="clave">Contraseña</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="Password" class="form-control" placeholder="Contraseña" name="clave" id="clave">
                            </div>
                        </div>
                      
                        <div class="col-lg-4 col-sm-6">
                            <label for="rol">Rol</label>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="rol"><i class="fa-solid fa-paperclip"></i></label>
                                <select class="form-select" id="rol" name="rol">
                                    <option value="">Seleccionar</option>
                                    <option value="1">Super-Administrador</option>
                                    <option value="2">Vendedor</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary r-0" type="submit" id="btnAction">Registrar</button>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <span class=" alert text-danger mt-3" role="alerta" id="alerta"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include_once "views/templates/footer.php"; ?>