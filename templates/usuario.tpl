{include file="header.tpl"}
    <div class="col-4">
      <article class="container tabla">
        <section>
          <table class="table table-striped table-dark tabla table-responsive-md margentabla easteregg ">
          <tbody id="tablaprueba">
              {foreach from=$users item=usuario}
                <tr>
                  <td>{$usuario->user}</td>
                  <td>{$usuario->permiso}</td>
                  <div class="modal fade" id="exampleModal{$usuario->id_user}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel{$usuario->id_user}">Modificar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <section class="row">
                            <form action="GuardarUsuario/{$usuario->id_user}" method="post">
                              <input type="text"  name="user" value="{$usuario->user}">
                              <select name="permiso">
                                <option name="permiso" value="usuario">usuario</option>
                                <option name="permiso" value="admin">admin</option>
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
                <td><a href="borrarUser/{$usuario->id_user}">Borrar</a></td>
                <td><button type="button" data-toggle="modal" data-target="#exampleModal{$usuario->id_user}">Modificar</button></td>
                </tr>
              {/foreach}
            </tbody>
          </table>
        </section>
      </article>
    </div>
  </div>

{include file="footer.tpl"}  