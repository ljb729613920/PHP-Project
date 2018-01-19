	function validateLogin(){
		var xhr=new XMLHttpRequest();
		var info='userName='+userName.value+'&userPass='+userPass.value;
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				// alert(xhr.responseText);
				if(xhr.responseText){
					loginClose.click();
					location.reload();
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
	// function areaChange(i){
	// 	var xhr=new XMLHttpRequest();
	// 	var info='area='+i;
	// 	xhr.onreadystatechange=function(){
	// 		if(xhr.readyState==4 && xhr.status==200){
	// 			areaBlock.innerHTML=xhr.responseText;
	// 		}
	// 	}
	// 	xhr.open('post','areaChange.php?',true);
	// 	xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	// 	xhr.send(info);
	// }

