const contenedor = document.querySelector("#butacas");
// let img = document.createElement("img");
for (let i = 0; i < 8; i++) {
    for (let j = 0; j < 18; j++) {
        let img = document.createElement("img");
        img.src = "app/view/images/butacaBlanca.svg"; // Define la ruta de la imagen que deseas mostrar
        contenedor.appendChild(img);
    }
}
