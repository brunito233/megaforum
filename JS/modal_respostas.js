// Get the modal
var modal_respostas = document.getElementById("modal_respostas<?php echo $id_resposta;?>");

// Get the button that opens the modal
var btn_respostas = document.getElementById("btn_modal_respostas<?php echo $id_resposta;?>");

// Get the <span> element that closes the modal
var span_respostas = document.getElementsByClassName("close-respostas")[0];

// When the user clicks the button, open the modal
btn_respostas.onclick = function() {
  modal_respostas.style.display = "block";
}

function fechar() {
  modal_respostas.style.display = "none";
}
