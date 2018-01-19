	function validateLogin(){
		var xhr=new XMLHttpRequest();
		var info='userName='+userName.value+'&userPass='+userPass.value;
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				if(xhr.responseText){
					window.location.replace('index.php');
				}else{
					loginTip.style.color='red';
					loginTip.innerHTML='用户名及密码错误';
				}
			}
		}
		xhr.open('post','login.php?',true);
		xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.send(info);
	}
	function validateLogin(){
		var xhr=new XMLHttpRequest();
		var info='userName='+userName.value+'&userPass='+userPass.value;
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				if(xhr.responseText){
					window.location.replace('index.php');
				}else{
					loginTip.style.color='red';
					loginTip.innerHTML='用户名及密码错误';
				}
			}
		}
		xhr.open('post','login.php?',true);
		xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.send(info);
	}
