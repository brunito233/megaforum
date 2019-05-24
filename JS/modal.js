// Get the modal
var modal_edit = document.getElementById("modal_editar");

// Get the button that opens the modal
var btn_edit = document.getElementById("btn_edit");

// Get the <span> element that closes the modal
var span_modal_edit = document.getElementsByClassName("close-edit")[0];

// When the user clicks the button, open the modal

function abrir() {
  modal_edit.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
function fechar() {
  modal_edit.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal_edit) {
  modal_edit.style.display = "none";
}
}
