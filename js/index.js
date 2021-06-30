window.onload = function () {
  base_preguntas = readText("base-preguntas.json")
  interprete_bp = JSON.parse(base_preguntas)
  escogerPreguntaAleatoria()
}

let pregunta
let posibles_respuestas
btn_correspondiente = [
  select_id("btn1"), select_id("btn2"),
  select_id("btn3"), select_id("btn4")
]
npreguntas = []

let preguntas_hechas = 0
let preguntas_correctas = 0





function escogerPreguntaAleatoria() {
  let n = Math.floor(Math.random() * interprete_bp.length)
  // n = 0

  while (npreguntas.includes(n)) {
    n++
    if (n >= interprete_bp.length) {
      n = 0
    }
    if (npreguntas.length == interprete_bp.length) {
      npreguntas = []
    }
  }
  npreguntas.push(n)
  preguntas_hechas++

  escogerPregunta(n)
}


function escogerPregunta(n) {
  pregunta = interprete_bp[n]
  select_id("categoria").innerHTML = pregunta.categoria
  select_id("pregunta").innerHTML = pregunta.pregunta
  select_id("numero").innerHTML = n

  let pc = preguntas_correctas
  if (preguntas_hechas > 1) {
    select_id("puntaje").innerHTML = pc + "/" + (preguntas_hechas - 1)
  } else {
    select_id("puntaje").innerHTML = ""
  }

  style("imagen").objectFit = pregunta.objectFit;
  desordenarRespuestas(pregunta)
  if (pregunta.imagen) {
    select_id("imagen").setAttribute("src", pregunta.imagen)
    style("imagen").height = "200px"
    style("imagen").width = "100%"
  } else {
    style("imagen").height = "0px"
    style("imagen").width = "0px"
    setTimeout(() => {
      select_id("imagen").setAttribute("src", "")
    }, 500);
  }
}

function desordenarRespuestas(pregunta) {
  posibles_respuestas = [
    pregunta.respuesta,
    pregunta.incorrecta1,
    pregunta.incorrecta2,
    pregunta.incorrecta3
  ]

  posibles_respuestas.sort(() => Math.random() - 0.5)

  select_id("btn1-a").innerHTML = posibles_respuestas[0]
  select_id("btn2-b").innerHTML = posibles_respuestas[1]
  select_id("btn3-c").innerHTML = posibles_respuestas[2]
  select_id("btn4-d").innerHTML = posibles_respuestas[3]
}

let suspender_botones = false

function fiftyFifty() {
  let je;
  document.getElementById("btn50").style.visibility = "hidden";
  for (let p = 0; p < 4; p++) {
    if (posibles_respuestas[p] == pregunta.respuesta) {
      je = p
      btn_correspondiente[p].style.setProperty('--color-secundario', '#0e3ebe')
    } else if (posibles_respuestas[p] !== pregunta.respuesta) {
      btn_correspondiente[p].style.visibility = "hidden";
    }
  }
  if (je >= 3) {
    je = Math.floor(Math.random() * 2);
    btn_correspondiente[je].style.visibility = "";
  } else if (je >= 2) {
    je = Math.floor(Math.random() * 1);
    btn_correspondiente[je].style.visibility = "";
  }else if (je >= 1) {
    je = Math.floor(Math.random() * 0);
    btn_correspondiente[je].style.visibility = "";
  }else {
    je = Math.floor(Math.random() * (3-1+1) +1);
    btn_correspondiente[je].style.visibility = "";
  }
  return;
}

/*function oprimir_btn(i) {
  if (suspender_botones) {
    return
  }
  suspender_botones = true
  if (posibles_respuestas[i] == pregunta.respuesta) {
    preguntas_correctas++
    btn_correspondiente[i].style.background = "lightgreen"
  } else {
    btn_correspondiente[i].style.background = "pink"
  }
  for (let j = 0; j < 4; j++) {
    if (posibles_respuestas[j] == pregunta.respuesta) {
      btn_correspondiente[j].style.background = "lightgreen"
      break
    }
  }*/
  function pintarVerde(){
    btn_correspondiente[i].style.setProperty('--color-secundario', 'lightgreen')
  }
  
  function finjuegoganador(){
    
      alert("Felicitaciones ha ganado Quien quiere ser millonario!!!")
      document.getElementById("siguiente").style.display="none";
    document.getElementById("btn50").style.display="none";
    document.getElementById("btnayuda").style.display="none";
    document.getElementById("btnllamada").style.display="none";
  }
  function finjuegoperdedor(){
    alert("Ha perdido Quien quiere ser millonario!!!, suerte para la proxima..")
    document.getElementById("siguiente").style.display="none";
    document.getElementById("btn50").style.display="none";
    document.getElementById("btnayuda").style.display="none";
    document.getElementById("btnllamada").style.display="none";
  }
function oprimir_btn(i) {
  if (suspender_botones) {
    return
  }
  suspender_botones = true
  if (posibles_respuestas[i] == pregunta.respuesta) {
    preguntas_correctas++
    
    console.log(btn_correspondiente[i])
    let cadenaHtml = 'p'
    cad=cadenaHtml.concat(preguntas_correctas)
    setTimeout(() => {
      document.getElementById(cad).style.display = "block"
    }, 3500);
    
    if(preguntas_correctas==6){
      document.getElementById("siguiente").style.display="none";
      setTimeout(() => {
        finjuegoganador()
      }, 4000);
    }
    
  } else {
    btn_correspondiente[i].style.setProperty('--color-secundario', '#be8f0a')
    setTimeout(() => {
      btn_correspondiente[i].style.setProperty('--color-secundario', 'pink')
    }, 3500);
    
    setTimeout(() => {
      finjuegoperdedor()
    }, 4000);
  }
  for (let j = 0; j < 4; j++) {
    if (posibles_respuestas[j] == pregunta.respuesta) {
      btn_correspondiente[i].style.setProperty('--color-secundario', '#be8f0a')
      setTimeout(() => {
        btn_correspondiente[j].style.setProperty('--color-secundario', 'lightgreen')
      }, 3500);
      break
    }
  }
  
}

function siguiente(){
  setTimeout(() => {
    reiniciar()
    suspender_botones = false
  }, 3000);
  document.getElementById("ventana2").style.display="none";
}

//let p = prompt("numero")

/*function reiniciar() {
  for (const btn of btn_correspondiente) {
    btn.style.background = "white"
  }
  escogerPreguntaAleatoria()
}*/


function reiniciar() {
  for (const btn of btn_correspondiente) {
    btn.style.setProperty('--color-secundario', '#0e3ebe')
    btn.style.visibility = "";
  }
  escogerPreguntaAleatoria()
}

function select_id(id) {
  return document.getElementById(id)
}

function style(id) {
  return select_id(id).style
}

function readText(ruta_local) {
  var texto = null;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", ruta_local, false);
  xmlhttp.send();
  if (xmlhttp.status == 200) {
    texto = xmlhttp.responseText;
  }
  return texto;
}
//TEMPORIZADOR
