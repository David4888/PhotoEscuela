// Creamos la función ampliar para mostrar la foto agrandada

var ampliadaActual;
function ampliar(evento) {
    evento.target.nextElementSibling.style.display='flex';  //NextElementSibling para acceder al hermano 
    ampliadaActual = evento.target.nextElementSibling;
}

//Creamos la función para cerrar la ventana de la imagen
function cerrar() { 
  ampliadaActual.style.display='none';
  
}

//Recorremos fotos y activamos el evento click al pulsar
function inicializar() {
    var fotos = document.getElementsByClassName('ampliable');
    
    for (var i = 0; i < fotos.length; i++) {
        fotos[i].addEventListener('click', ampliar);
    }

  //Creamos un span para cerrar la imágen mediante la función onclick
  var spansClose = document.getElementsByClassName('close');

  for (var i = 0; i < spansClose.length; i++) {
    spansClose[i].addEventListener('click', cerrar);
  }
  
}
//Llamamos al evento
window.addEventListener('load', inicializar);



//Slider de imágenes

var carrusel = document.getElementsByTagName('figure');
var diapo = 0;

function carruselFotos(){
  for(let i=0; i<carrusel.length;i++){
    let foto = i;
    if(foto!=diapo){
    carrusel[foto].style.opacity=0;
  
      }
    else{
      carrusel[foto].style.opacity=1;
    }
  }
 
}

var interval;

function siguiente() {
  clearInterval(interval);
  interval = setInterval(siguienteAuto, tiempo);
  if(diapo<carrusel.length-1){
    diapo++;
  }
  else{
    diapo=0;
  }
  carruselFotos();
}

function siguienteAuto() {
  if(diapo<carrusel.length-1){
    diapo++;
  }
  else{
    diapo=0;
  }
  carruselFotos();
}

function anterior() {
  // console.log(diapo);
  if(diapo>0){
    diapo--;
  }
  else{
    diapo=carrusel.length-1;
  }
  carruselFotos();
}


tiempo = 5000;
interval = setInterval(siguienteAuto, tiempo);


