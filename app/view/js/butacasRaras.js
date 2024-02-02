const contenedores = document.querySelectorAll(".butacas");
const fila = document.querySelector("#fila");
let cont = 0;
let inputs = document.querySelectorAll(".todo input");
// let imagen=document.querySelectorAll(".butacas>img");
function cinco(contenedor) {
    for (let i = 0; i < 7; i++) {
        for (let j = 0; j < 5; j++) {
          cont++;
          generar(contenedor);
        }
    }
}
contenedores.forEach((contenedor, key) => {
    switch (key) {
        case 0:
            cinco(contenedor);
            break;
        case 1:
            
            break;
        case 2:
            
            break;
        case 3:
            
            break;
    
        default:
            break;
    }
  if (key == 2) {
    for (let i = 0; i < 7; i++) {
      for (let j = 0; j < 4; j++) {
        cont++;
        generar(contenedor); 
      }
    }
  } else {
    
  }
});
for (let j = 0; j < 18; j++) {
  cont++;
  generar(null,fila);
}

// inputs.forEach((input) => {
//   input.addEventListener("change", cambiarColor);
// });
function generar(contenedor,fila=null){
    let img = document.createElement("img");
    let input = document.createElement("input");
    input.type = "checkbox";
    input.id = "asiento" + cont;
    img.id = "imagen" + cont;
    input.value = "asiento" + cont;
    let label = document.createElement("label");
    label.setAttribute("for", "asiento" + cont);
    let div = document.createElement("div");
    let span = document.createElement("span");
    input.addEventListener("change",()=>{
        cambiarColor(input,img.id);
    });
    span.textContent = cont;
    span.className = "flex justify-center relative top-6";
    input.className = "flex justify-center relative top-11 left-4 z-[-1]";
    div.className = "ml-2";
    img.src = "app/view/images/butacaBlanca.svg"; // Define la ruta de la imagen que deseas mostrar
    div.appendChild(input);
    div.appendChild(label);
    if (contenedor==null) {
        fila.appendChild(div); 
    }else{
        contenedor.appendChild(div);
    }
    label.appendChild(span);
    label.appendChild(img);
}
function cambiarColor(input,id) {
  let imagen = document.getElementById(id);
    if (input.checked) {
        imagen.src = "app/view/images/butacaMorada.svg";
    }else{
        imagen.src = "app/view/images/butacaBlanca.svg";
    }
}
