
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


function createText(){
	var post = document.createElement("div");
    var desc = document.createElement("P");
    var user = document.createElement("P");
    var t = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    var ta = document.createTextNode("FirstUser: 11/11/11");
    user.appendChild(ta);
    desc.appendChild(t);

    var Text = document.createElement("div");
    var tt = document.createTextNode("HUEHUEHUEHUEHUEHUEUHUEHUHEUHEHU EHUEHUEHUEHUEHUEHUEHUEHUEHUEUHEU HEHUEHUEHUEHUEHUEUHEHUEHU EHUHUEHUEHUEHUEHUE.");
	Text.appendChild(tt);
	post.appendChild(Text);
    post.appendChild(user);
    post.appendChild(desc);
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

function createPic(){
	var post = document.createElement("div");
    var desc = document.createElement("P");
    var user = document.createElement("P");
    var t = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    var ta = document.createTextNode("FirstUser: 11/11/11");
    user.appendChild(ta);
    desc.appendChild(t);

    var pic = document.createElement("img");
    pic.src= "http://treasure.diylol.com/uploads/post/image/834603/resized_lizard-meme-generator-huehuehue-3492ee.jpg";
    pic.style.height = '100px';
    pic.style.width= '100px';
    pic.style.float= '100px';
    pic.style.cssfloat= 'left';
    post.appendChild(pic);
    post.appendChild(user);
    post.appendChild(desc);
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

function createText(){
	var post = document.createElement("div");
    var desc = document.createElement("P");
    var user = document.createElement("P");
    var t = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    var ta = document.createTextNode("FirstUser: 11/11/11");
    user.appendChild(ta);
    desc.appendChild(t);

    var Text = document.createElement("div");
    var tt = document.createTextNode("HUEHUEHUEHUEHUEHUEUHUEHUHEUHEHU EHUEHUEHUEHUEHUEHUEHUEHUEHUEUHEU HEHUEHUEHUEHUEHUEUHEHUEHU EHUHUEHUEHUEHUEHUE.");
	Text.appendChild(tt);
	post.appendChild(Text);
    post.appendChild(user);
    post.appendChild(desc);
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

function createVid(){
	var post = document.createElement("div");
    var desc = document.createElement("P");
    var user = document.createElement("P");
    var t = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    var ta = document.createTextNode("FirstUser: 11/11/11");
    user.appendChild(ta);
    desc.appendChild(t);

    var vid = document.createElement("iframe");
    vid.style.width= "100%";
    vid.style.height= "300px";
    vid.src="http://www.youtube.com/embed/ZZ5LpwO-An4"
    post.appendChild(vid);
    post.appendChild(user);
    post.appendChild(desc);
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
