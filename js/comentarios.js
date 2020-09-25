"use strict"

let app = new Vue({
    el: "#vue-template-comentarios",
    data: {
        title: "comentarios",
        comentarios: [], // es como el $this->smarty->assign("tareas", $tareas);
        loged: "loged"
    }
});


// btn refresh document.querySelector("#vue-comentarios").addEventListener('click', getComentarios);
if (document.querySelector(".loged").id !== 'anonimo'){
    document.querySelector("#btn-comentario").addEventListener('click', AgregarComentario);
}
document.addEventListener('DOMContentLoaded',getComentarios);
let btnElimina = document.querySelector("#btn-eliminarComentario");
btnElimina.addEventListener('click', elimina);

function getComentarios() {
    let table = document.getElementById("vue-template-comentarios");
    let loged = document.querySelector(".loged").id;
    // inicia la carga
    let id = document.querySelector(".ids").id;
    fetch("api/comentarios")
    
    .then(response => response.json())
    
    .then(comentarios => {
        let html = "";

        for (let x=0 ; x < comentarios.length; x++){
            if(comentarios[x].id_producto_fk == id){
                app.comentarios.push(comentarios[x]);
            }
        }
        //for(table.childNodes in child){
        //   child.lastChild.addEventListener('click', deletComentario);
        //}
        app.loged = loged;
        table.innerHTML = html;
    })
    
    .catch(error => console.log(error));
}

function AgregarComentario() {

    let comentarios = {
    comentario:  document.querySelector("#comentario").value,
       puntaje:  document.querySelector("#puntaje").value,
       id_producto:  document.querySelector(".ids").id,

   }
   fetch('api/comentarios', {
       method: 'POST',
       headers: {'Content-Type': 'application/json'},       
       body: JSON.stringify(comentarios) 
    })
    .then(response => {
        getComentarios();
    })
    .catch(error => console.log(error));
}




async function elimina (){

    let resp = await fetch(url,{
        "method" : "GET",
        "mode": 'cors',
        "headers": {'Content-Type': 'application/json'},
      });
      try{
      let r = await fetch('api/comentarios'+"/"+id,{
        "method": "DELETE"
    });
    let json = await r.json();
    console.log(json);
    console.log(id);
    }catch(e){
        console.log(e);
    }
    getComentarios(); 
  }
  