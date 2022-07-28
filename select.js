var auto_interes = document.querySelector('#auto_interes');
var modelo_interes = document.querySelector('#modelo_interes');
auto_interes.onchange = auto_interes;

function autosFetch(respuesta) {

  limpiar(); 
  
  var lines = respuesta.split('\n');
  for (var line = 0; line < lines.length; line++) {
    var opt = document.createElement('option');
    opt.innerHTML = lines[line];
    opt.value = lines[line];
    auto_interes.appendChild(opt);
  }

}

function mandoauto_interes() {
  var ajax = new XMLHttpRequest();
  ajax.open('GET', auto_interes.value);
  ajax.onreadystatechange = function() {
    console.log(ajax.status, ajax.readyState, ajax.responseText);
    if (ajax.status === 200 && ajax.readyState === 4) {
      autosFetch(ajax.responseText);
    }
    else
      limpiar();
  }
  ajax.send();
}

function limpiar(){
while(auto_interes.options.length > 0){                
    auto_interes.remove(0);
  } 
}