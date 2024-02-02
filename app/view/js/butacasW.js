const tabla = document.querySelector("table");
let cont = 0;
let inputs = document.querySelectorAll("table input");
let asientos = new Array(8);

function generarArray() {
    for (let i = 0; i < 8; i++) {
        asientos[i] = new Array(18);
        }        
    for (let i = 0; i < 8; i++) {
        for (let j = 0; j < 18; j++) {
            asientos[i][j] = 0;
        }
    }
    //de la columna 0 a la 4 estan llenas
    for (let i = 0; i < 7; i++) {
        for (let j = 0; j < 5; j++) {
            asientos[i][j] = 1;
        }
    }
    //la ultima fila esta a 1
    for (let i = 0; i < 18; i++) {
        asientos[7][i] = 1;
    }
    //desde la columna 6 a la 12 estan a 1
    for (let i = 0; i < 8; i++) {
        for (let j = 7; j < 12; j++) {
            asientos[i][j] = 1;
        }
    }
    //las 4 ultimas columnas a 1
    for (let i = 0; i < 8; i++) {
        for (let j = 14; j < 18; j++) {
            asientos[i][j] = 1;
        }
    }
}
generarArray();
asientos.forEach(function(rowData) {
    let row = document.createElement('tr');
  
    rowData.forEach(function(cellData) {
      let cell = document.createElement('td');
      cell.id = "celda" + cont;
      cell.className = "px-2";
      if (cellData==1) {
        cont++;
        generar(cell);
      }
      row.appendChild(cell);
    });
  
    tabla.appendChild(row);
});

function generar(celda){
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
    div.className = "mt-[-20px]";
    img.src = "app/view/images/butacaBlanca.svg"; // Define la ruta de la imagen que deseas mostrar
    div.appendChild(input);
    div.appendChild(label);
    celda.appendChild(div);
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