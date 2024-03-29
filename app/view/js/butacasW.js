const tabla = document.querySelector("table");


let cont = 0;
let inputs = document.querySelectorAll("table input");
let asientos = new Array(8);

let butacasReservadas=[];

if (typeof butacasOcupadas !== 'undefined') {
    butacasOcupadas.forEach(butaca => {
        butacasReservadas.push(butaca.asiento);
        console.log(butaca.asiento);
    }); 
}


document.querySelector('form').addEventListener('submit', function(event) {
    // Verificar si se han seleccionado asientos
    let asientosSeleccionados = document.querySelectorAll('input[type="checkbox"]:checked');
    if (asientosSeleccionados.length === 0) {
        event.preventDefault(); // Evitar el envío del formulario si no se han seleccionado asientos
        alert('Por favor, selecciona al menos un asiento.');
    } else {
        // Los asientos han sido seleccionados, puedes continuar con el envío del formulario
        console.log('Formulario enviado');
        let stringAsientos="";
        cont = 0;
        asientosSeleccionados.forEach(asiento => {
            let arr = asiento.id.split(/(\d+)/);
            if (cont==0) {
                stringAsientos += arr[1];
            }else{
                stringAsientos += "," + arr[1];
            }
            cont++;
        });
        document.cookie = "butacas="+stringAsientos+"; path=/;";
    }
});
// document.querySelector('form').addEventListener('submit', function(event) {
//     event.preventDefault();
// });

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
      if (cellData==1) {
        cont++;
        cell.className = "px-2";
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
    span.className = "flex justify-center relative top-6  cursor-pointer";
    img.className = "cursor-pointer";
    input.className = "flex justify-center relative top-11 left-4 z-[-1]";
    div.className = "mt-[-20px]";
    let contString = String(cont);
    if (butacasReservadas.length != 0) {
        let butacasReservadasStrings = butacasReservadas.map(String);
        if (butacasReservadasStrings.includes(contString)) {
            img.src = "app/view/images/butacaGris.svg";
            input.setAttribute("disabled", "");
        } else {
            img.src = "app/view/images/butacaBlanca.svg";
        }
    }else{
        img.src = "app/view/images/butacaBlanca.svg";
    }
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
