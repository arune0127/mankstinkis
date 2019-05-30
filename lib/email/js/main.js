console.log("lbutaitis");

forma = document.querySelector('form');

forma.addEventListener("submit", tikrintiFormosLaukus) ;


function tikrintiFormosLaukus (event) {
  x.preventDefault(); // uzdraudzia, sustabdo veiksma //
  vardas = document.querySelector('input [name="firstname"]').value;
  klausimas = document.querySelector('input [name="question"]').value;
  elPastas = document.querySelector('input [name="email"]').value;
  console.log("vardas" + vardas);

}


if ( vardas.length > 4 && klausimas.lenght > 10 && elPastas.length > 5) {
window.location.href = /uzduotys%2013/arune/4%20PHP%20-%20email/?firstname=art&question=&email=xcc%40jhgj
} else {
  console.log("kazkuris ir lauku yra neuzpildytas");
pranesimas = document.querySelector ('.error-message');
pranesimas.innerHTML += "<p><prasome uzpildyti visus laukus pilnai" </p>;

}

}
