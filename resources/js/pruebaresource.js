function iniciar(){

    $("form")
console.log("form")
        .on("click", ".botonprueba", function () {
console.log("click")
           saludando();
        })


}

function saludando(){
    console.log("ja")
    alert("saludando con laravel mix")
}

export{
    iniciar,
    saludando,

}
