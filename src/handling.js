
function hide(enter){
	document.getElementById("upProf").style.visibility = "hidden";
	if(enter == 0){
		document.getElementById("login").style.visibility = "visible";
	}else{
		document.getElementById("login").style.visibility = "hidden";
	}
	if(enter == 1){
		document.getElementById("createAcc").style.visibility = "visible";
	}else{
		document.getElementById("createAcc").style.visibility = "hidden";
	}
	if(enter == 2){
		document.getElementById("posts").style.visibility = "visible";
		post(0);
	}else{
		document.getElementById("posts").style.visibility = "hidden";
	}
	if(enter == 2 || enter == 3 || enter == 4 || enter == 5)
	{
		document.getElementById("navi").style.visibility = "visible";
		document.getElementById("posting").style.visibility = "visible";
	}
	else
	{
		document.getElementById("navi").style.visibility = "hidden";
		document.getElementById("posting").style.visibility = "hidden";
	}
	if(enter == 3 || enter == 5) {
		document.getElementById("profHolder").style.visibility = "visible";
		document.getElementById("profile").style.visibility = "visible";
		document.getElementById("upProf").style.visibility = "hidden"
	}else{
		document.getElementById("profile").style.visibility = "hidden";
	}
	
	if (enter == 4) {
		document.getElementById("messageHolder").style.visibility = "visible";
		document.getElementById("displayMsg").style.visibility = "visible";
		document.getElementById("createMsg").style.visibility = "hidden";
	}else{
		document.getElementById("messageHolder").style.visibility = "hidden";
		document.getElementById("displayMsg").style.visibility = "hidden";
		document.getElementById("createMsg").style.visibility = "hidden";
	}	
	
	if(enter == 5) {
		document.getElementById("showUpdateButton").style.visibility = "hidden";
	}
	else if (enter == 3)
		document.getElementById("showUpdateButton").style.visibility = "visible";
	
	if(enter != 3 && enter != 5)
			document.getElementById("profHolder").style.visibility = "hidden";
}

function logout(){
	location.reload();
}

function showUpdate(enter)
{
	if(enter == 0) {
		document.getElementById("upProf").style.visibility = "visible";
		document.getElementById("profile").style.visibility = "hidden";
	}else{
		document.getElementById("upProf").style.visibility = "hidden";
		document.getElementById("profile").style.visibility = "visible";
	}
	
}

function showCreateMsg(enter)
{
	if(enter == 0) {
		document.getElementById("createMsg").style.visibility = "visible";
		document.getElementById("displayMsg").style.visibility = "hidden";
	}else{
		document.getElementById("createMsg").style.visibility = "hidden";
		document.getElementById("displayMsg").style.visibility = "visible";
	}

}

function check()
{
		hide(2);
}

function post(input) {
	if(input == 0)
		document.getElementById("text").style.visibility = "visible";
	else
		document.getElementById("text").style.visibility = "hidden";
		
	if(input == 1)
		document.getElementById("photo").style.visibility = "visible";
	else
		document.getElementById("photo").style.visibility = "hidden";	
	
	if(input == 2)
		document.getElementById("quote").style.visibility = "visible";
	else
		document.getElementById("quote").style.visibility = "hidden";
		
	if(input == 3)
		document.getElementById("link").style.visibility = "visible";
	else
		document.getElementById("link").style.visibility = "hidden";
		
	if(input == 5)
		document.getElementById("audio").style.visibility = "visible";
	else
		document.getElementById("audio").style.visibility = "hidden";
		
	if(input == 6)
		document.getElementById("video").style.visibility = "visible";
	else
		document.getElementById("video").style.visibility = "hidden";
}
