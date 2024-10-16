<div class="container">

    <div class="formmain">
        <form action="" method="post">
            <h1 class="text-center">ĐĂNG NHẬP</h1>
            <div class="formmain__item">
              <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
                <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="<?php if(isset($_GET['name'])) echo $_GET['name']; ?>"  required>
              </div>
              <div id="email__err" class="text-danger"></div>
            </div>
            <div class="formmain__item">
              <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
                <input id="pass" name="password" type="password"  class="form-control" placeholder="Password" >
              </div>
                <div id="pass__err" class="text-danger"></div>
            </div>
            <div class="formmain__item form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Lưu mật khẩu
                </label>
            </div>
            <div class="formmain__item formmain__item-btn col-auto">
                <input type="submit" onclick="return validate();" class="btn btn-dark" name='login' value="ĐĂNG NHẬP">
            </div>
            <p class="text-danger"><?php echo isset($ket_qua_dang_nhap)?$ket_qua_dang_nhap:"";  ?></p>
            <div class="formmain__item col-auto text-center">
              <a href="/register" class="text-primary darkyellow" >Đăng kí tài khoản ngay</a>
          </div>
        </form>
    </div>
  
  </div>