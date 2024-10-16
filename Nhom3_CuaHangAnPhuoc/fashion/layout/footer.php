<?php $services = selectAll("select * from image where type = 'service' and enable > 0")  ?>
<div class="footer">
    <hr>
    <div class="footer__banner">
      <?php foreach($services as $service) {?>
        <div class="footer__banner_item">
          <p><?= $service['title'] ?></p>
          <a href="">
            <img src="<?= isset($service['url']) ? $service['url'] : '' ?>">
          </a>
        </div>
      <?php }?>
    </div>
    <div class="footer__sub">
      <div class="footer__sub_content">
        <p class="footer__sub_content_title">ĐĂNG KÝ NHẬN BẢN TIN</p>
        <p class="footer__sub_content_sub">Đăng ký ngay đễ nhận thông tin khuyến mãi mới nhất</p>
      </div>
      <div class="footer__sub_dk">
        <form action="" method="post">
          <div class="footer__sub_input input-group mb-3">
            <input type="email" class="form-control" placeholder="Địa chỉ email" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-light" type="button" id="button-addon2">Đăng ký</button>
          </div>
        </form>
      </div>
    </div>
    <div class="footer__main">
      <div class="footer__main_item">
        <div class="footer__main_title text-danger">AN PHƯỚC GROUP</div>
        <div class="footer__main_danhmuc">100/11-12 An Dương Vương, P.9, Q.5, TP. Hồ Chí Minh, Việt Nam</div>
        <div class="footer__main_danhmuc">GPKD Số: 0301241545 <br> Ngày cấp: 26/04/1993GPKD Số: 0301241545 <br> Tư vấn mua hàng: 1800 888 618 (Phím 1) <br> Văn phòng: +84.28.3835.0059 <br> CSKH: 1800 888 618 (Phím 3) <br> Fax: +84.28.3835.0058 <br> Email: cskh@anphuoc.com.vn</div>
      </div>
      <div class="footer__main_item">
        <div class="footer__main_title">CHĂM SÓC KHÁCH HÀNG</div>
        <a href=""><div class="footer__main_danhmuc">Hướng dẫn mua hàng</div></a>
        <a href=""><div class="footer__main_danhmuc">Hướng dẫn thanh toán</div></a>
        <a href=""><div class="footer__main_danhmuc">Hướng dẫn chọn kích cỡ An Phước - Pierre Cardin</div></a>
        <a href=""><div class="footer__main_danhmuc">Hướng dẫn chọn kích cỡ Anamai - Bonjour</div></a>
        <a href=""><div class="footer__main_danhmuc">Thời gian giao hàng</div></a>
        <a href=""><div class="footer__main_danhmuc">Chính sách bảo mật</div></a>
        <a href=""><div class="footer__main_danhmuc">Chính sách đổi hàng</div></a>
        <a href=""><div class="footer__main_danhmuc">Hỏi đáp</div></a>
        <a href=""><div class="footer__main_danhmuc">Cam kết chất lượng</div></a>
      </div>
      <div class="footer__main_item">
        <div class="footer__main_title">LIÊN KẾT NHANH</div>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Bộ sưu tập</div></a>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Tin khuyến mãi</div></a>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Tin thời trang</div></a>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Tin tức - Sự kiện</div></a>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Hệ thống cửa hàng An Phước - Pierre Cardin</div></a>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Hệ thống cửa hàng Anamai - Bonjour</div></a>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Liên hệ</div></a>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Tuyển dụng</div></a>
        <a href="/tin-tuc"><div class="footer__main_danhmuc">Cảnh giác giả mạo An Phước - Pierre Cardin</div></a>
      </div>
      <div class="footer__main_item">
        <div class="footer__main_title">KẾT NỐI VỚI CHÚNG TÔI</div>
        <div class="footer__main_isons">
          <a href="" class="footer__main_ison"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="" class="footer__main_ison"><i class="fa-brands fa-instagram"></i></a>
          <a href="" class="footer__main_ison"><i class="fa-brands fa-youtube"></i></a>
          <a href="" class="footer__main_ison"><i class="fa-brands fa-linkedin-in"></i></a>  
        </div>
        <div class="footer__main_bocongthuong">
          <img src="./assets/img/bocongthuong.png" alt="">
        </div>
      </div>
    </div>
    <div class="footer__copy">
      <hr>
      <p>Copyright &copy; 2024 An Phước by nhóm sinh viên HUIT.</p>
    </div>
  </div>