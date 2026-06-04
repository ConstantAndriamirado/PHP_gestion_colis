

document.getElementById("toastbtn").onclick = function() {
  var toastElList = [].slice.call(document.querySelectorAll('.toast'))
  var toastList = toastElList.map(function(toastEl) {
    return new bootstrap.Toast(toastEl)
  })
  toastList.forEach(toast => toast.show())
}


document.getElementById("btn_ajouter").addEventListener("click", function(){
  alert("La longueur des valeurs du champ Code Itineraire doit être inférieur à 10 !"); 
});

// var typed = new Typed(".multiple-text", {
//   strings: ["B","I","E","N","v","E","N","u","E"]?
//   typeSpeed: 100,
//   backSpeed: 100,
//   backDelay: 1000,
//   loop: true
// })