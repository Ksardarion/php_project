window.addEventListener('load', windowLoaded, false);

function windowLoaded () {
	var i = document.getElementById("date");
	var phones = document.getElementsByClassName("maskPhone");
	var char = '-';


	function mask(e) {
	  if ((e.keyCode >= 48 || e.keyCode <= 57 || e.keyCode >= 96 || e.keyCode <= 105) || e.keyCode == 8){
	  	if ((/^\d{4}$/.test(i.value) || /^\d{4}-\d{2}$/.test(i.value)) && e.keyCode !== 8) {
	  	  i.value += char;
	  	}
	  } else {
	  	return false;
	  }
	}
	i.onkeyup = mask;
	i.onkeydown = mask;


	function maskPhone(e) {
		console.log(e.keyCode);
	  if ((e.keyCode >= 48 || e.keyCode <= 57 || e.keyCode >= 96 || e.keyCode <= 105) || e.keyCode == 8){
	  	if ((/^\d{3}$/.test(this.value) || /^\d{3}-\d{3}$/.test(this.value)) && e.keyCode !== 8) {
	  	  this.value += char;
	  	}
	  } else {
	  	return false;
	  }
	}
	for (var j = 0; j < phones.length; j++) {

	  phones[j].addEventListener("keyup", maskPhone, false);
	  phones[j].addEventListener("keydown", maskPhone, false);
	}
}