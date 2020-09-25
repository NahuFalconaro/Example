{include file="header.tpl"}
<div class="container">
    <h1>Registrate</h1>
    <div class="row form">
        <form class="col-12" action="registrar" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Usuario</label>
                    <input type="text" class="form-control" name="user" placeholder="Usuario">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Contraseña</label>
                    <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" id="btn4" value="Registrarse">
                </div>
            </div>
        </form>
    </div>
</div>
 {include file="footer.tpl"}  