"use strict";
document.getElementById("btn4").addEventListener("click", validar);
document.getElementById("btn4").addEventListener("click", diferentePass);
document.getElementById("btn4").addEventListener("click", validarCaptcha);
document.getElementById("btn3").addEventListener("click", randomCaptcha);
//poner retry
let variableletra = new Array ('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
let cajacombinada;

randomCaptcha();

function validar(e) {

    e.preventDefault();
    console.log("1")
    let nombre, apellido, telefono, email, nacimiento, password;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    telefono = document.getElementById("telefono").value;
    email = document.getElementById("email").value;
    nacimiento = document.getElementById("nacimiento").value;
    password = document.getElementById("pass").value;
    console.log("2")
    if (nombre == "" || apellido == "" || telefono == "" || email == "" || nacimiento == "" || password == "") {
        alert("Es obligatorio llenar todo el formulario");
        console.log("4");
        return false;  
    }       
}
function diferentePass() {
    let password2, password;
    password = document.getElementById("pass").value;
    password2 = document.getElementById("pass2").value;
    if (password !== password2){
        alert("no coincide pass");
        return false;
    }

}
function randomCaptcha(){
    let cajacombinada = document.getElementById("campo1");
    cajacombinada.value = "";
    for(let i=0; i< 6; i++){
        let vletras = variableletra[Math.floor(Math.random()*variableletra.length)];
        cajacombinada.value += vletras;
    }
}
function validarCaptcha(){
    if (document.getElementById("campo2").value == document.getElementById("campo1").value) {
        alert("validado captcha");  
    }
    else{
        alert("no valido");   
    }
}

