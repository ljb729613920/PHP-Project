	function verbName(obj){
		var xhr=new XMLHttpRequest();
		var info='userName='+obj.value;
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				switch(xhr.responseText){
					case '0':
						regTip.style.color='red';
						regTip.innerHTML='用户名包含非法字符';
						regSub.type='button';
						break;
					case '1':
						regTip.style.color='green';
						regTip.innerHTML='用户名未被注册';
						regSub.type='submit';
						break;
					case '2':
						regTip.style.color='red';
						regTip.innerHTML='用户名不符合要求';
						regSub.type='button';
						break;
					case '3':
						regTip.style.color='red';
						regTip.innerHTML='用户名已存在';
						regSub.type='button';
						break;
				}
			}
		}
		xhr.open('post','registerName.php?',true);
		xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.send(info);
	}
	function verbPass(obj){
		var info='userPass='+obj.value;
		var xhr=new XMLHttpRequest();
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				switch(xhr.responseText){
					case '0':
						regTip.style.color='red';
						regTip.innerHTML='密码含有非法字符';
						regSub.type='button';
						passTb1.style.backgroundColor='red';
						passTb2.style.backgroundColor='white';
						passTb3.style.backgroundColor='white';
						break;
					case '1':
						regTip.style.color='red';
						regTip.innerHTML='密码长度小于6';
						regSub.type='button';
						passTb1.style.backgroundColor='red';
						passTb2.style.backgroundColor='white';
						passTb3.style.backgroundColor='white';
						break;
					case '2':
						regTip.style.color='red';
						regTip.innerHTML='密码长度大于10';
						regSub.type='button';
						passTb1.style.backgroundColor='red';
						passTb2.style.backgroundColor='white';
						passTb3.style.backgroundColor='white';
						break;
					case '3':
						regTip.style.color='red';
						regTip.innerHTML='密码强度弱';
						regSub.type='submit';
						userPass1.value=obj.value;
						passTb1.style.backgroundColor='red';
						passTb2.style.backgroundColor='white';
						passTb3.style.backgroundColor='white';
						break;
					case '4':
						regTip.style.color='orange';
						regTip.innerHTML='密码强度中';
						regSub.type='submit';
						userPass1.value=obj.value;
						passTb1.style.backgroundColor='orange';
						passTb2.style.backgroundColor='orange';
						passTb3.style.backgroundColor='white';
						break;
					case '5':
						regTip.style.color='green';
						regTip.innerHTML='密码强度强';
						regSub.type='submit';
						userPass1.value=obj.value;
						passTb1.style.backgroundColor='green';
						passTb2.style.backgroundColor='green';
						passTb3.style.backgroundColor='green';
						break;
				}
			}
		}
		xhr.open('post','registerPass.php?');
		xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.send(info);
	}
	function verbEmail(obj){
		var xhr=new XMLHttpRequest();
		var info='email='+obj.value;
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				switch(xhr.responseText){
					case '0':
						regTip.style.color='red';
						regTip.innerHTML='邮箱包含非法字符';
						regSub.type='button';
						break;
					case '1':
						regTip.style.color='green';
						regTip.innerHTML='邮箱未被注册';
						regSub.type='submit';
						break;
					case '2':
						regTip.style.color='red';
						regTip.innerHTML='邮箱不符合要求';
						regSub.type='button';
						break;
					case '3':
						regTip.style.color='red';
						regTip.innerHTML='邮箱已存在';
						regSub.type='button';
						break;
				}
			}
		}
		xhr.open('post','registerEmail.php?',true);
		xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.send(info);
	}
	function verbRepeat(obj){
		if(obj.value==userPass1.value){
			repeatTip.style.color='green';
			repeatTip.innerHTML='密码正确';
			regSub.type='submit';
		}else{
			repeatTip.style.color='red';
			repeatTip.innerHTML='两次输入密码不一致';
			regSub.type='button';
		}
	}
