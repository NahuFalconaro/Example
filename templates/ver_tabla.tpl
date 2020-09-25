{include file="header.tpl"}
{if $loged == "easteregg"}
  <script src="./js/easter-egg.js"></script>
{/if}
<div class="row">
  <div class="col-8">
    <article class="container tabla">
        <section class="row">
        <div class="col-12">
        {if $loged == "admin" || $loged == "easteregg"}
        <form action="insertarEjer" method="post" class="easteregg">
            <input type="text" class="col-2 easteregg" name="musculo" placeholder="musculo" value="">
            <input type="text" class="col-2 easteregg" name="ejercicio" placeholder="ejercicio">
            <input type="text" class="col-2 easteregg" name="serie" placeholder="serie">
            <input type="text" class="col-2 easteregg" name="repeticion" placeholder="repeticion">
            <select name="id_dificultad">
              {foreach from=$dificultad item=dificult}
                <option name="id_dificultad" value="{$dificult->id_dificultad}">{$dificult->dificultad}</option>
              {/foreach}
            </select>
            <input type="submit" value="insertar" class="easteregg">
        </form>
        {/if}
        </div>
        </section>
        <section class="easteregg">
          <table class="table table-striped table-dark tabla table-responsive-md margentabla">
          <thead >
            <tr>
              <th scope="col">Musculo</th>
              <th scope="col">Ejercicio</th>
              <th scope="col">Series</th>
              <th scope="col">Repeticiones</th>
              <th scope="col">Dificultad</th>
            </tr>
            
          </thead>
              <tbody id="tablaprueba">
              {foreach from=$ejercicios item=ejercicio}
                <tr>
                  <td>{$ejercicio->musculo}</td>
                  <td>{$ejercicio->ejercicio}</td>
                  <td>{$ejercicio->serie}</td>
                  <td>{$ejercicio->repeticion}</td>
                  <td>{$ejercicio->dificultad}</td>
                  {if $loged == "admin" || $loged == "easteregg"}
                  <div class="modal fade" id="exampleModal{$ejercicio->id_ejercicio}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel{$ejercicio->id_ejercicio}">Modificar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <section class="row">
                            <form action="Guardar/{$ejercicio->id_ejercicio}" method="post">
                              <input type="text"  name="muscle" value="{$ejercicio->musculo}">
                              <input type="text"  name="ejer" value="{$ejercicio->ejercicio}">
                              <input type="text"  name="ser" value="{$ejercicio->serie}">
                              <input type="text"  name="rep" value="{$ejercicio->repeticion}">
                              <select name="id_dificultad">
                                {foreach from=$dificultad item=dificult}
                                  <option name="id_dificultad" value="{$dificult->id_dificultad}">{$dificult->dificultad}</option>
                                {/foreach}
                              </select>
                              <input type="submit" value="Guardar">
                            </form>
                          </section>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                  </div>
                </div>
                {/if}
                {if $loged == "admin"}
                  <td><a href="borrar/{$ejercicio->id_ejercicio}">Borrar</a></td>
                  <td><button type="button" data-toggle="modal" data-target="#exampleModal{$ejercicio->id_ejercicio}">Modificar</button></td>
                {/if}
                </tr>
                {/foreach}
            </tbody>
          </table>
        </section>
      </article>
    </div>




    <div class="col-4">
      <article class="container tabla">
        <section class="row">
        {if $loged == "admin" || $loged == "easteregg"}
        <div class="col-12 easteregg">
          <form action="insertarDif" method="post">
            <input type="text" class="col-6" name="dificult" placeholder="Dificultad" value="">
            <input type="submit" value="insertar" class="easteregg">
          </form>
          </div>
          {/if}
        </section>
        <section>
          <table class="table table-striped table-dark tabla table-responsive-md margentabla easteregg ">
          <thead>
            <tr>
              <th scope="col">Dificultad</th>
            </tr>
          </thead>
          <tbody id="tablaprueba">
              {foreach from=$dificultad item=dificult}
                <tr>
                  <td>{$dificult->dificultad}</td>
                  {if $loged == "admin" || $loged == "easteregg"}
                  <div class="modal fade" id="exampleModal{$dificult->id_dificultad}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel{$dificult->id_dificultad}">Modificar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <section class="row">
                            <form action="GuardarDif/{$dificult->id_dificultad}" method="post">
                              <input type="text"  name="dificult" value="{$dificult->dificultad}">
                              <input type="submit" value="Guardar">
                            </form>
                          </section>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                  </div>
                </div>
                <td><a href="borrarDif/{$dificult->id_dificultad}">Borrar</a></td>
                <td><button type="button" data-toggle="modal" data-target="#exampleModal{$dificult->id_dificultad}">Modificar</button></td>
                {/if}
                </tr>
              {/foreach}
            </tbody>
          </table>
        </section>
      </article>
    </div>
  </div>


{include file="footer.tpl"}                    