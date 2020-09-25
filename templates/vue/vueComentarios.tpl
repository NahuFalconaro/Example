{literal}
<section>
    <table class="table table-dark" >
  <thead>
    <tr>
      <th scope="col-lg-4">Numero comentario</th>
      <th scope="col-lg-4">Comentario</th>
      <th scope="col-lg-4">Puntaje</th>
    </tr>
  </thead>
  <tbody id="vue-template-comentarios" >
    <tr v-for="comentario in comentarios" id="comentarios">
      <td class="td" scope="col-lg-4">{{ comentario.id_comentario }}</td>
      <td class="td" scope="col-lg-4">{{ comentario.comentario }}</td>
      <td class="td" scope="col-lg-4">{{ comentario.puntaje}}</td>

      
      <td v-if="loged === 'admin'" scope="col-lg-4"><input type="submit" id="btn-eliminarComentario" class="btn btn-danger" value="eliminar"></a></td>
    

    </tr>
  </tbody>
</table>
</section>
{/literal}
