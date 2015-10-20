function loginButton(){
	document.getElementById("navi").style.visibility = "visible";
	document.getElementById("posts").style.visibility = "visible";
	document.getElementById("postBar").style.visibility = "visible";
	document.getElementById("createAcc").style.visibility = "hidden";
	document.getElementById("login").style.visibility = "hidden";
}

function logout(){
	location.reload();
}

function createAcc(){
	document.getElementById("navi").style.visibility = "hidden";
	document.getElementById("posts").style.visibility = "hidden";
	document.getElementById("createAcc").style.visibility = "visible";
	document.getElementById("login").style.visibility = "hidden";
}

function createPost(){
	var post = document.createElement("div");
    var text = document.createElement("P");
    var t = document.createTextNode("sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    text.appendChild(t);

    post.appendChild(text);

    var pic = document.createElement("img");
    pic.src= "http://treasure.diylol.com/uploads/post/image/834603/resized_lizard-meme-generator-huehuehue-3492ee.jpg";
    pic.style.height = '100px';
    pic.style.width= '100px';
    post.appendChild(pic);
    post.backgroundscolor = 'darkCyan';
	post.padding = '10px';
	post.position = 'relative';
    post.width = '40%';
    post.float = 'left';
    post.textalign = 'left';
	post.margintop = '1%'; 
	post.marginleft = '2%';
	post.visibility = 'hidden'; 
    document.getElementById("posts").appendChild(post);
}
