function loginButton(){
	document.getElementById("navi").style.visibility = "visible";
	document.getElementById("post").style.visibility = "visible";
	document.getElementById("postBar").style.visibility = "visible";
	document.getElementById("createAcc").style.visibility = "hidden";
	document.getElementById("login").style.visibility = "hidden";
};

function logout(){
	location.reload();
};


function createAcc(){
	document.getElementById("navi").style.visibility = "hidden";
	document.getElementById("post").style.visibility = "hidden";
	document.getElementById("createAcc").style.visibility = "visible";
	document.getElementById("login").style.visibility = "hidden";
}

function verifyAcc(){
}
