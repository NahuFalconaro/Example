{include file="header.tpl"}
<article class="container">
    <div class="row">
        {if $loged == "admin"}
            <div class="col-12">
                <form action="insertarProducto" method="post"  enctype="multipart/form-data">
                    <input type="text" class="col-2 form-control" name="producto" placeholder="producto">
                    <input type="text" class="col-2 form-control" name="descripcion" placeholder="descripcion">
                    <input type="submit" class="btn btn-primary" value="insertar">
                    <div class="form-group">
                        <input type="file" name="input_name" id="imageToUpload">
                    </div>
                </form>
            </div>
        {/if}
        {foreach from=$productos item=producto}
        <label class="ids" id={$producto->id_producto}></label>
        <div class="card my-5 mx-4" style="width: 18rem;">
            <img src="{$producto->imagen}" class="card-img-top" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{$producto->producto}</h5>
                <p class="card-text">{$producto->descripcion}</p>
            </div>
            <a href="tienda" class="btn btn-primary">Comprar</a>
            <form action="verComentarios" method="post">
                <input type="hidden" name="idproducto" value="{$producto->id_producto}">
                <input type="submit" class="btn btn-success col-lg-12" value="Ver Comentarios">
            </form>

            {if $loged == "admin"}
                <a href="deletProducto/{$producto->id_producto}" class="btn btn-danger">Eliminar</a>
            {/if}
        </div>
        {/foreach}
</article>
<script src="js/comentarios.js"></script>

{include file="footer.tpl"}