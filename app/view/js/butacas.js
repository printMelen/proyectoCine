const contenedores = document.querySelectorAll(".butacas");
const fila = document.querySelector("#fila");
let cont=0;
contenedores.forEach((contenedor,key) => {
    if (key==2) {
        for (let i = 0; i < 7; i++) {
            for (let j = 0; j < 4; j++) {
                cont++;
                let img = document.createElement("img");
                let div = document.createElement("div");
                let span = document.createElement("span");
                span.textContent=cont;
                span.className="flex justify-center relative top-6";
                div.className="ml-2";
                img.src = "app/view/images/butacaBlanca.svg"; // Define la ruta de la imagen que deseas mostrar
                contenedor.appendChild(div);
                div.appendChild(span);
                div.appendChild(img);
            }
        }
    }else{
        for (let i = 0; i < 7; i++) {
            for (let j = 0; j < 5; j++) {
                cont++;
                let img = document.createElement("img");
                let div = document.createElement("div");
                let span = document.createElement("span");
                span.textContent=cont;
                span.className="flex justify-center relative top-6";
                div.className="mr-2";
                img.src = "app/view/images/butacaBlanca.svg"; // Define la ruta de la imagen que deseas mostrar
                contenedor.appendChild(div);
                div.appendChild(span);
                div.appendChild(img);
            }
        }
    }
});
for (let j = 0; j < 18; j++) {
    cont++;
                let img = document.createElement("img");
                let div = document.createElement("div");
                let span = document.createElement("span");
                span.textContent=cont;
                // div.className="flex justify-center relative top-6";
                span.className="flex justify-center relative top-6";
                img.src = "app/view/images/butacaBlanca.svg"; // Define la ruta de la imagen que deseas mostrar
                fila.appendChild(div);
                div.appendChild(span);
                div.appendChild(img);
}
