window.addEventListener('load', windowLoaded, false);

function windowLoaded () {
	var i = document.getElementById("date");
	console.log(i);
	var char = '.';


	i.onkeyup = function(e) {
	  if ((e.which < 48 || e.which > 57) && e.which !== 8)
	    return false;
	  if ((/^\d{4}$/.test(i.value) || /^\d{4}\.\d{2}$/.test(i.value)) && e.which !== 8) {
	    i.value += char;
	  }
	  return false;
	}

	i.onkeydown = function(e) {
	  if ((e.which < 48 || e.which > 57) && e.which !== 8)
	    return false;
	  if ((/^\d{4}$/.test(i.value) || /^\d{4}\.\d{2}$/.test(i.value)) && e.which !== 8) {
	    i.value += char;
	  } 
	}
}