function mascaraTel(){

	let tel = document.querySelector('#tel')

	if (tel.value.length == 4) {
		tel.value += " "
	}
	else if(tel.value.length == 10){
		tel.value += "-"
	}
	else if(tel.value.length == 3){
		tel.value += ")"
	}
	else if(tel.value.length < 1){
		tel.value += "("
	}
}