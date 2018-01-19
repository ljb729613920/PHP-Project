	function verbPass(obj){
		var xhr=new XMLHttpRequest();
		var info='userPass='+obj.value;
		xhr.onreadystatechange=function(){
			if(xhr.readyState==4 && xhr.status==200){
				switch(xhr.responseText){
					case '0':
						pwd1Tip.style.color='red';
						pwd1Tip.innerHTML='密码含有非法字符';
						sub.type='button';
						passTb1.style.backgroundColor='red';
						passTb2.style.backgroundColor='white';
						passTb3.style.backgroundColor='white';
						break;
					case '1':
						pwd1Tip.style.color='red';
						pwd1Tip.innerHTML='密码长度小于6';
						sub.type='button';
						passTb1.style.backgroundColor='red';
						passTb2.style.backgroundColor='white';
						passTb3.style.backgroundColor='white';
						break;
					case '2':
						pwd1Tip.style.color='red';
						pwd1Tip.innerHTML='密码长度大于10';
						sub.type='button';
						passTb1.style.backgroundColor='red';
						passTb2.style.backgroundColor='white';
						passTb3.style.backgroundColor='white';
						break;
					case '3':
						pwd1Tip.style.color='red';
						pwd1Tip.innerHTML='密码强度弱';
						sub.type='submit';
						pwd1.value=obj.value;
						passTb1.style.backgroundColor='red';
						passTb2.style.backgroundColor='white';
						passTb3.style.backgroundColor='white';
						break;
					case '4':
						pwd1Tip.style.color='orange';
						pwd1Tip.innerHTML='密码强度中';
						sub.type='submit';
						pwd1.value=obj.value;
						passTb1.style.backgroundColor='orange';
						passTb2.style.backgroundColor='orange';
						passTb3.style.backgroundColor='white';
						break;
					case '5':
						pwd1Tip.style.color='green';
						pwd1Tip.innerHTML='密码强度强';
						sub.type='submit';
						pwd1.value=obj.value;
						passTb1.style.backgroundColor='green';
						passTb2.style.backgroundColor='green';
						passTb3.style.backgroundColor='green';
						break;
				}
			}
		}
		xhr.open('post','registerPass.php?',true);
		xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xhr.send(info);
	}
