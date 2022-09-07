let pesquisar = document.querySelector('#pesquisar')

pesquisar.addEventListener("keydown",function(evento){
	if (evento.key === "Enter" ) {
		buscar()
	}
})

function buscar(){

	window.location = 'home.php?pesquisar='+pesquisar.value
}