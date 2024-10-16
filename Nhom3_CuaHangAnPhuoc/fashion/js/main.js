function getValue(id){
  return document.getElementById(id).value.trim();
}
function showError(key, mess){
  document.getElementById(key + '__err').innerHTML = mess;
}
function validate(){
  var flag = true;

  var email = getValue('email');
  if(email.length<=0){
    flag = false;
    showError('email', 'Email không bỏ trống'); 
  }else showError('email', '');

  var pass = getValue('pass');
  if(pass.length<8){
    flag = false;
    showError('pass', 'Mật khẩu từ 8 kí tự trở lên'); 
  }else showError('pass', '');
  var repass = getValue('repass');
  if(pass!=repass){
    flag = false;
    showError('repass', 'Mật khẩu không trùng khớp'); 
  }else showError('repass', '');

  var name = getValue('name');
  if(name.length<8){
    flag = false;
    showError('name', 'Tên từ 8 kí tự trở lên'); 
  }else showError('name', '');


  var phone = getValue('phone');
  if(phone.length<=0){
    flag = false;
    showError('phone', 'Điện thoại không bỏ trống'); 
  }else showError('phone', '');
    
  return flag;
}

function validate_loginadmin(){
  var flag = true;
  
  var username = getValue('username');
  if(username.length<=0){
    flag = false;
    showError('username', 'Username không bỏ trống'); 
  }else showError('username', '');

  var password = getValue('password');
  if(password.length<3){
    flag = false;
    showError('password', 'Mật khẩu từ 3 kí tự trở lên'); 
  }else showError('password', '');
    
  return flag;
}
var toastTrigger = document.getElementById('liveToastBtn')
var toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', function () {
    var toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
  })
}
