function SprawdzDate() {
	
	
	
	
	
	
	var dataOd = document.getElementById("txtOd").value;
	var dataDo = document.getElementById("txtDo").value;
	//alert("Data od\n\n"+dataOd);
	//alert("Data do\n\n"+dataDo);
	
	if(dataOd==dataDo ) {
			document.getElementById("txtOd").style.background = "red";
			document.getElementById("txtDo").style.background = "red";
			window.alert("Daty nie moga byc identyczne");
			return false;
	}
	else if(dataOd>=dataDo ){
	document.getElementById("txtOd").style.background = "red";
	window.alert("B³edna data");
	return false;
	}
	else{
	document.getElementById("txtOd").style.background = "lightgreen";
	document.getElementById("txtDo").style.background = "lightgreen";
	return true;
	}
	
	
	}
	
function cofanie() {
    location.replace("index.php")
}







