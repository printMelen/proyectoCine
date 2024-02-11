const input = document.querySelector('input[value="Comprar"]');
console.log(input);
let datosPelis=[];
function generarArray(){
    if (typeof datosSesion !== 'undefined') {
        datosSesion.forEach(dato => {
            datosPelis.push(dato);
            console.log(dato);
        }); 
    }
}

input.addEventListener('click', function(event) {
    event.preventDefault();
    generarArray();
    // document.cookie = "butacas="+stringAsientos+"; path=/;";
});

