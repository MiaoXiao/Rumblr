
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
	if(enter == 2 || enter == 3)
	{
		document.getElementById("navi").style.visibility = "visible";
		document.getElementById("postBar").style.visibility = "visible";
		document.getElementById("posting").style.visibility = "visible";
	}
	else
	{
		document.getElementById("navi").style.visibility = "hidden";
		document.getElementById("postBar").style.visibility = "hidden";
		document.getElementById("posting").style.visibility = "hidden";
	}
	if(enter == 3) {
		document.getElementById("profHolder").style.visibility = "visible";
		document.getElementById("profile").style.visibility = "visible";
		document.getElementById("upProf").style.visibility = "hidden";
	}else{
		document.getElementById("profHolder").style.visibility = "hidden";
		document.getElementById("profile").style.visibility = "hidden";
	}
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


function createText(){
	var post = document.createElement("div");
    var desc = document.createElement("P");
    var user = document.createElement("P");
    var td = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    var tu = document.createTextNode("FirstUser: 11/11/11");
    user.appendChild(tu);
    desc.appendChild(td);

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

function createQuote(){
	var post = document.createElement("div");
    var desc = document.createElement("P");
    var user = document.createElement("P");
    var td = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    var tu = document.createTextNode("FirstUser: 11/11/11");
    user.appendChild(tu);
    desc.appendChild(td);

    var Quote = document.createElement("div");
    var tq = document.createTextNode("\"A great man once said ow.\" \n ---some guy");
	Text.appendChild(tq);
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

function check()
{
		hide(2);
}

function createLink(){
	var post = document.createElement("div");
    var desc = document.createElement("P");
    var user = document.createElement("P");
    var td = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    var tu = document.createTextNode("FirstUser: 11/11/11");
    user.appendChild(tu);
    desc.appendChild(td);

    var Link = document.createElement("a");
    Link.href="reddit.com";
    Link.innerHtml="reddit.com";
    
	post.appendChild(Link);
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
    var td = document.createTextNode("Sample post of text goes here. Strangely enough, sample text isnt that hard. You kinda just write things.");
    var tu = document.createTextNode("FirstUser: 11/11/11");
    user.appendChild(tu);
    desc.appendChild(td);

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
		
	if(input == 4)
		document.getElementById("chat").style.visibility = "visible";
	else
		document.getElementById("chat").style.visibility = "hidden";
		
	if(input == 5)
		document.getElementById("audio").style.visibility = "visible";
	else
		document.getElementById("audio").style.visibility = "hidden";
		
	if(input == 6)
		document.getElementById("video").style.visibility = "visible";
	else
		document.getElementById("video").style.visibility = "hidden";
}
