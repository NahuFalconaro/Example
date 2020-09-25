{include file="header.tpl"}

<article class="container">
   <div> 
    <div class="card my-5 mx-4" style="width: 18rem;">
        <img src="{$producto->imagen}" class="card-img-top" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{$producto->producto}</h5>
            <p class="card-text">{$producto->descripcion}</p>
        </div>
    </div>
    {if $loged == "admin" || $loged == "user"}
    <h3>Comentarios, deja el tuyo aqui!</h3>
    <div class="col-12">
    <input type="hidden" name="idproducto" value="{$producto->id_producto}">
    <input type="text" class="col-2 form-control" id="comentario"name="comentario" placeholder="Comentario">
    <input type="text" class="col-2 form-control" id="puntaje" name="puntaje" placeholder="1,2,3,4,5..">
    <input type="submit" id="btn-comentario" class="btn btn-primary" value="insertar">
    </div>
    {/if}
    <label class="loged" id="{$loged}"></label>
    <label class="ids" id="{$producto->id_producto}"></label>
    <section id="vue-comentarios">
        {include file="vue/vueComentarios.tpl"}
    </section>
    </div>
</article>
<script src="./js/comentarios.js"></script>
{include file="footer.tpl"}                 