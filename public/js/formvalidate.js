function formvalidate()
{
	var yearelected = document.getElementById("yearelected").value;
	var dateofdeath = document.getElementById("death").value;
	var itIsNumber = /^\d{4}$/.test(yearelected);

	if(!(itIsNumber)){ 
		alert("Year elected should be four digits");
		return false;
	}
	if($("#type_d").is(":checked")){

		if(dateofdeath == ""){
			alert("Please enter date of death");
			return false;
		}
	}	
	else if($("#type_d").is(":not(:checked)")){

		if(dateofdeath != "")
		{
			alert("Please select deceased");
			return false;
		}
	}
}

function associateformvalidate()
{
	var period = document.getElementById("period").value;
	var patt = /^\d{4}-\d{4}$/;

	if(!(patt.test(period)))
	{
		alert("period is invalid");
		return false;
	}

}