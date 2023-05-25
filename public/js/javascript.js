// Creamos la función ampliar para mostrar la foto agrandada

function ampliar(evento) {
    evento.target.nextElementSibling.style.display='flex';  //NextElementSibling para acceder al hermano 
    
}


//Recorremos fotos y activamos el evento click al pulsar
function inicializar() {
    var fotos = document.getElementsByClassName('ampliable');
    
    for (var i = 0; i < fotos.length; i++) {
        fotos[i].addEventListener('click', ampliar);
    }
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
    var fotos = document.getElementsByClassName('imggrande');
        fotos.style.display = "none";
      }

window.addEventListener('load', inicializar);



//Slider 

//CARGA DE ARCHIVOS

//tiempo en milisegundos
let tiempo=2000;

//imágenes a utilziar en el pase
let galeria=[
  "https://picsum.photos/id/137/200/300",
  "https://picsum.photos/id/237/200/300",
  "https://picsum.photos/id/337/200/300",
  "https://picsum.photos/id/537/200/300",
  "https://picsum.photos/seed/picsum/200/300"  
];


//COSNTRUCCIÓN DE LA ESTRUCTURA DE DIAPOSITIVAS
let ruta = document.getElementById('pasefotos');
let miHTML="";

for(let i=0; i<galeria.length;i++){
  miHTML+='<li><img src="'+galeria[i]+'"></li>';  
}

ruta.innerHTML=miHTML;


// INTERACTIVIDAD / TEMPORIZACIÓN 

//diapo mostrada
let diapo=0;



function siguienteFoto(){
  for(let i=0; i<galeria.length;i++){
    let foto = i;
    if(foto!=diapo){
    ruta.getElementsByTagName('li')[foto].style.opacity="0";
  
      }
    else{
      ruta.getElementsByTagName('li')[foto].style.opacity="1";
    }
  }
  if(diapo<galeria.length-1){
    diapo++;
  }
  else{
    diapo=0;
  }
}



// llamamos a la función
setInterval(siguienteFoto, tiempo);