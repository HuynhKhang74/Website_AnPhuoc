<div class="container">

    <div class="formmain">
        <form action="" method="post" accept-charset="utf-8">
            <h1 class="text-center">ĐĂNG KÝ</h1>
            <div class="formmain__item mb-3">
                <label for="exampleFormControlInput1" class="form-label">Họ Tên</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : "" ?>" required>
                <div id="name__err" class="text-danger"></div>
            </div>
            <div class="formmain__item mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>" required>
                <div id="email__err" class="text-danger"></div>
            </div>
            <div class="formmain__item mb-3">
                <label for="exampleFormControlInput1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="pass" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : "" ?>" required>
                <div id="pass__err" class="text-danger"></div>
            </div>
            <div class="formmain__item mb-3">
                <label for="exampleFormControlInput1" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="repass" name='repass' value="<?= isset($_POST['repass']) ? $_POST['repass'] : "" ?>"  required>
                <div id="repass__err" class="text-danger"></div>
            </div>
            <div class="formmain__item mb-3">
                <label for="exampleFormControlInput1" class="form-label">Điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : "" ?>"  required>
                <div id="phone__err" class="text-danger"></div>
            </div>
            <div class="formmain__item mb-3">
                <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                <input type="textarea" class="form-control" id="address" name="phaddressone" value="<?= isset($_POST['address']) ? $_POST['address'] : "" ?>"  required>
                <div id="phone__err" class="text-danger"></div>
            </div>
            <div class="formmain__item formmain__item-btn col-auto">
                <input type="submit" onclick="return validate();" class="btn btn-dark" value="ĐĂNG KÝ" name="register" >
            </div>
        </form>
    </div>
  
  </div>