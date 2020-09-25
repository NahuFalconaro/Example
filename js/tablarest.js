"use strict";
document.getElementById('createThree').addEventListener('click', createTres);
document.getElementById('create').addEventListener('click', guardar);
document.getElementById('edit').addEventListener('click', editar);
document.getElementById('delete').addEventListener('click', elimina);

document.addEventListener('DOMContentLoaded',obtener_mostrar);
let url = "http://web-unicen.herokuapp.com/api/groups/n79/rutinas";
let aux = 0;
let i=0;

let container = document.getElementById("textoinfo");
async function guardar(json){
  container.innerHTML = "Guardando...";
  if (i!=-1) {
  let rutina = {
    "musc" : document.getElementById("muscle").value,
    "ejer" : document.getElementById("ejer").value,
    "ser" : document.getElementById("syr").value,
    "id" : i
  }
  i++;
  let rutinaCargada = {
    "thing": rutina
  }

  try{
    container.innerHTML = "Guardando...";
    let r = await fetch(url,{
      "method" : "POST",
      "mode": 'cors',
      "headers": {'Content-Type': 'application/json'},
      "body": JSON.stringify(rutinaCargada)
    });
    
        if (r.ok){
      let t = await r.json()
      container.innerHTML = JSON.stringify(t);
    }
    else{
      container.innerHTML="failed...";
    }
    container.innerHTML = "Se guardo...";
  }
  catch(r){
    container.innerHTML = "connection error";
  }
}
obtener_mostrar();
}
async function obtener_mostrar(){
  let table = document.getElementById("tablaprueba");
  let resp = await fetch(url,{
    "method" : "GET",
    "headers": {'Content-Type': 'application/json'},
  });
  let json = await resp.json();
  let html = "";
   for (let i = 0; i < json.rutinas.length; i++) {
     let muscc = json.rutinas[i].thing.musc;
     let ejerr = json.rutinas[i].thing.ejer;
     let serr = json.rutinas[i].thing.ser;
     let id = json.rutinas[i]._id;
     html += "<tr>";
     html+= "<td>"+muscc+"</td>";
     html+= "<td>"+ejerr+"</td>";
     html+= "<td>"+serr+"</td>";
     html +="<td><input type=checkbox id='"+i+"' value='"+id+"'></td>";
     html += "</tr>"
 }
   table.innerHTML = html;
 
}

async function elimina (){
  document.getElementById('textoinfo').innerHTML = "Borrando...";
  let resp = await fetch(url,{
    "method" : "GET",
    "mode": 'cors',
    "headers": {'Content-Type': 'application/json'},
  });
  let json = await resp.json();
  for(let i = 0; i< json.rutinas.length; i++){
  if (document.getElementById(i).checked){    
      let urld = url+"/"+document.getElementById(i).value;
      let resp = await fetch(urld,{
        "method" : "DELETE",
        "mode": 'cors',
      });
      let j = await resp.json();
      
    }
    }
    obtener_mostrar();
    document.getElementById('textoinfo').innerHTML = "Completado";
  }
  async function createTres(event){
    document.getElementById('textoinfo').innerHTML = "Creando...";
    event.preventDefault()
    for(let j =0; j < 3; j++){
      let rutina = {
        "musc" : document.getElementById("muscle").value,
        "ejer" : document.getElementById("ejer").value,
        "ser" : document.getElementById("syr").value,
        "id" : i
      }
      i++;
      let rutinaCargada = {
        "thing": rutina
      }
    let resp = await fetch(url,{
      "method" : "POST",
      "mode": 'cors',
      "headers": {'Content-Type': 'application/json'},
      "body": JSON.stringify(rutinaCargada)
    });
    let json = await resp.json();
  }
  obtener_mostrar();
  document.getElementById('textoinfo').innerHTML = "Completado.";
}
async function editar (){
  document.getElementById('textoinfo').innerHTML = "Editando.";
  let resp = await fetch(url,{
    "method" : "GET",
    "mode": 'cors',
    "headers": {'Content-Type': 'application/json'},
  });
  let json = await resp.json();
  for (let i = 0; i < json.rutinas.length; i++) {
    if (document.getElementById(i).checked){
      let urld = url+"/"+document.getElementById(i).value;
      let rutina = {
        "musc" : document.getElementById("muscle").value,
        "ejer" : document.getElementById("ejer").value,
        "ser" : document.getElementById("syr").value,
        "id" : i
      }
      i++;
      let rutinaCargada = {
        "thing": rutina
      }
      let resp = await fetch(urld,{
        "method" : "PUT",
        "mode": 'cors',
        "headers": {'Content-Type': 'application/json'},
        "body": JSON.stringify(rutinaCargada)
      });
      let json = await resp.json();
    }
    obtener_mostrar();
    document.getElementById('textoinfo').innerHTML = "Completado";
  }
}
let busqueda = document.getElementById('buscar');
let table = document.getElementById('tablaprueba');
function busca(){
  let texto = busqueda.value.toLowerCase();//hace que se vuelva minuscula el valor de texto.
  let i=0;
  let row;
  while (row = table.rows[i++]){
    if(row.innerText.toLowerCase().indexOf(texto)!== -1){//indexOf devuelve el índice, dentro del objeto 
      row.style.display = null;
    }
    else{
      row.style.display='none';//no se muestre el elemento
    }
  }
}
busqueda.addEventListener('keyup',busca);//keyup se ejecuta cada vez que busqueda tenga algo