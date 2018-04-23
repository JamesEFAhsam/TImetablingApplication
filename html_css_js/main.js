//to login like user - user name and pass user/user
//to login like manager - user name and pass manager/manager
function login(){
	if(location.href.indexOf('login.html') !== -1){
	document.getElementById('loginA').addEventListener('click', function(){
		var name= document.getElementById('username').value;
		var pass= document.getElementById('password').value;
		if((name === 'user')&& (pass==='user')){
			alert('Logged Successfully');
			location.href = 'home.html';
		}
		else if((name === 'manager')&& (pass==='manager')){
			alert('Logged Successfully');
			location.href = 'managerhome.html';
		}
		
	});
 }
}

function addComment(){
		if(location.href.indexOf('managerhome.html') !== -1){
			document.getElementById('comment').onclick = function(e){
				e.target.value='';
			}
		document.getElementById('comment').onkeypress= function(e){
   			 if (e.keyCode === 13) {
   			 	e.preventDefault();
   			 	var comments = localStorage.getItem('comments')? 
   			 	JSON.parse(localStorage.getItem('comments')):[];
        var comment = document.getElementById("comment").value;
        comments.push(comment);
        localStorage.setItem('comments', JSON.stringify(comments));
        alert('Comment added');
        e.target.value="Insert comment here"
    	}
		}
		}
}
function showComments(){
	if(location.href.indexOf('/home.html') !== -1){
		document.getElementById('comments').value+='Sales have been up this week!\r';
		var comments = localStorage.getItem('comments')?JSON.parse(localStorage.getItem('comments')):[];
		comments.forEach(function(elem){
			document.getElementById('comments').value += elem+'\n';
		});
		
	}
}

function submitRating(){
	if(location.href.indexOf('ratings.html') !== -1){
	
		
		document.getElementById('submitRatings').onclick= function(e){
			e.preventDefault();
			alert('Your vote Submitted');
			location.reload();
		}
	}
}
function submitPref(){
	if(location.href.indexOf('pref.html') !== -1){
			function check(){

			}
		document.getElementById('submitPref').onclick= function(e){
			e.preventDefault();
			alert('Your preferences Submitted');
			location.reload();
		}
	}
}
function submitHReq(){
	if(location.href.indexOf('requests.html') !== -1){
			function check(){
				var inps =[];
				inps.push(document.querySelectorAll('input')[0]);
				inps.push(document.querySelectorAll('input')[1]);
				inps.forEach(function(el){
					if(!el.value){
						flag = false;
					}
					else{
						flag=true;
					}
				})
			return flag;

			}

		document.getElementById('submitHReq').onclick= function(e){
			e.preventDefault();
			if(check()===false){
				alert('Fill all fields, pls');
			}else{
			alert('You request Submitted');
			location.reload();
		}
	}
}
}
function submitReq(){
	if(location.href.indexOf('requests.html') !== -1){
			function check(){

				var inps =[];
				inps.push(document.querySelectorAll('input')[2]);
				inps.forEach(function(el){
					if(!el.value){
						flag = false;
					}
					else{
						flag=true;
					}
				});
				if(document.querySelector('select').selectedIndex === 0){
					flag=false;
				}else{flag=true;}
			return flag;

			
			}
		document.getElementById('submitReq').onclick= function(e){
			e.preventDefault();
			if(check()===false){
				alert('Fill all fields, pls');
			}else{
			alert('You request Submitted');
			location.reload();
		}
		}
	}
}

function signUp(){
	if(location.href.indexOf('/signup.html') !== -1){
		var inputs = document.querySelector('input');
		function check(){
			var flag = false;
			var inps = document.querySelectorAll('input');
				inps.forEach(function(el){
					if(!el.value){
						flag = false;
					}
					else{
						flag=true;
					}
				})
			return flag;
		}
		document.getElementById('signUp').onclick= function(e){
			if(check()===false){
				alert('Fill all fields, pls');
			}else{
			alert('Welcome yo our ROTA');
			location.href='home.html';
		}
	}
	}
	else 
	if(location.href.indexOf('/managersignup.html') !== -1){
			
		document.getElementById('signUpM').onclick= function(e){
			alert('Welcome yo our ROTA');
			location.href='managerhome.html';
		}
	}
}
window.onload = function () {
	login();
	addComment();
	showComments();
	submitRating();
	submitPref();
	submitReq();
	signUp();
	submitHReq();
}

