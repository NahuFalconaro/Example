{include file="header.tpl"}

<article class="container tabla">
    <section class="row">
    <form action="insertar" method="post">
        <input type="text" class="col-2" name="musculo" placeholder="musculo" value="">
        <input type="text" class="col-2" name="ejercicio" placeholder="ejercicio">
        <input type="text" class="col-2" name="serie" placeholder="serie">
        <input type="text" class="col-2" name="repeticion" placeholder="repeticion">
        <select>
          {foreach from=$dificultad item=dificult}
            <option value="{$dificult->id_dificultad}">{$dificult->dificultad}</option>
          {/foreach}
        </select>
        <input type="submit" value="insertar">
    </form>
    </section>
    <section>
      <table class="table table-striped table-dark tabla table-responsive-md margentabla">
      <thead>
        <tr>
          <th scope="col">Musculo</th>
          <th scope="col">Ejercicio</th>
          <th scope="col">Series</th>
          <th scope="col">Repeticiones</th>
          <th scope="col">Dificultad</th>
        </tr>
      </thead>