
function hide(enter){
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
	if(enter == 2)
		document.getElementById("posts").style.visibility = "visible";
	else
		document.getElementById("posts").style.visibility = "hidden";
	
	if(enter == 2 || enter == 3)
	{
		document.getElementById("navi").style.visibility = "visible";
		document.getElementById("postBar").style.visibility = "visible";
	}
	else
	{
		document.getElementById("navi").style.visibility = "hidden";
		document.getElementById("postBar").style.visibility = "hidden";
	}
	if(enter == 3) {
		document.getElementById("profile").style.visibility = "visible";
	}else{
		document.getElementById("profile").style.visibility = "hidden";
}}

function logout(){
	location.reload();
}

function createPost(){
	var post = document.createElement("div");
    var text = document.createElement("P");
    var t = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    text.appendChild(t);

;

    var pic = document.createElement("img");
    pic.src= "http://treasure.diylol.com/uploads/post/image/834603/resized_lizard-meme-generator-huehuehue-3492ee.jpg";
    pic.style.height = '100px';
    pic.style.width= '100px';
    pic.style.float= '100px';
    pic.style.cssfloat= 'left';
    post.appendChild(pic);
    post.appendChild(text)
    post.style.backgroundColor = 'darkCyan';
	post.style.padding = '10px';
	post.position = 'relative';
    post.width = '40%';
    post.style.cssfloat = 'left';
    post.textalign = 'left';
	post.style.margin = '1%'; 
	post.visibility = 'hidden'; 
    document.getElementById("posts").appendChild(post);
}
