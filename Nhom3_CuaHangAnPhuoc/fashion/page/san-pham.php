<div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="./all_product.php?">Áo</a></li>
      <li class="breadcrumb-item"><a href="./all_product.php?">Áo sơ mi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Áo sơ mi tay ngắn</li>
    </ol>
  </nav>

  <div class="showsanpham">
    <div class="showleft">
      <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="swiper-slide-container">
              <a href="san-pham/<?= $sanpham['MaSanPham'] ?>">
                <div class="allcontent__item">
                  <img src="<?= $sanpham['HinhAnh'] ?>" alt="<?= $sanpham['TenSanPham'] ?>">
                </div>
              </a>
            </div>
          </div>
          <?php foreach ($galleries as $gallery) { ?>
            <div class="swiper-slide">
              <div class="swiper-slide-container">
                <a href="san-pham/<?= $sanpham['MaSanPham'] ?>">
                  <div class="allcontent__item">
                    <img src="<?= $gallery['url'] ?>" alt="<?= $sanpham['TenSanPham'] ?>">
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
      <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="swiper-slide-container">
              <img src="<?= $sanpham['HinhAnh'] ?>" alt="<?= $sanpham['TenSanPham'] ?>">
            </div>
          </div>
          <?php foreach ($galleries as $gallery) { ?>
            <div class="swiper-slide">
              <div class="swiper-slide-container">
                <img src="<?= $gallery['url'] ?>" alt="<?= $sanpham['TenSanPham'] ?>">
              </div>
            </div>
          <?php } ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
    <div class="showright">
      <p><?= $sanpham['TenSanPham'] ?></p>
      <p><?= $sanpham['MoTaNgan'] ?></p>
      <p><?= $sanpham['MotaDai'] ?></p>
      <p>Giá Gốc : <del><?= number_format($sanpham['GiaGoc']) ?></del></p>
      <p> Giá Bán : <?= number_format($sanpham['GiaBan']) ?></p>
      <div class="KieuDangGr">
        <p class="GrTitle">Kiểu Dáng </p>
        <?php if (@$sanpham['KieuDang'] != "") { ?>
          <p class="KieuDang  btn btn-danger" onclick="ChonKichCo('<?= $sanpham['KieuDang']['MaKieuDang'] ?>');">
            <?= $sanpham['KieuDang']['TenKieuDang'] ?></p>
        <?php } else { ?>
          <p class="KieuDang  btn btn-danger">Mặc định</p>
        <?php } ?>
      </div>
      <div class="KichCoGr">
        <p class="GrTitle">Kích cỡ</p>
        <?php if (@$sanpham['Size'] != "") { ?>
          <p class="KichCo  btn btn-danger" onclick="ChonKichCo('<?= $sanpham['Size']['MaSize'] ?>');">
            <?= $sanpham['Size']['TenSize'] ?></p>
        <?php } else { ?>
          <p class="KichCo  btn btn-danger">Mặc định</p>
        <?php } ?>
      </div>
      <div class="KichCoGr">
        <p class="GrTitle">Chất Liệu </p>
        <?php if (@$sanpham['ChatLieu'] != "") { ?>
          <p class="ChatLieu  btn btn-danger" onclick="ChonKichCo('<?= $sanpham['ChatLieu']['MaChatLieu'] ?>');">
            <?= $sanpham['ChatLieu']['TenChatLieu'] ?></p>
        <?php } else { ?>
          <p class="ChatLieu  btn btn-danger">Mặc định</p>
        <?php } ?>
      </div>
      <div class="KichCoGr">
        <p class="GrTitle">Màu Sắc </p>
        <?php if (@$sanpham['MauSac'] != "") { ?>
          <p class="MauSac  btn btn-danger" onclick="ChonKichCo('<?= $sanpham['MauSac']['MaMauSac'] ?>');">
            <?= $sanpham['MauSac']['TenMauSac'] ?></p>
        <?php } else { ?>
          <p class="MauSac  btn btn-danger">Mặc định</p>
        <?php } ?>
      </div>

      <hr>

      <p class="NoiDungSanPham">
        <i class="fa-solid fa-chevron-right"></i>
        Hướng dẫn chọn size
      </p>
      <p class="NoiDungSanPham">
        <i class="fa-solid fa-chevron-right"></i>
        Liên hệ tư vấn: m.me/AnPhuoc.PierreCardin.Official
      </p>
      <p class="NoiDungSanPham">
        <i class="fa-solid fa-chevron-right"></i>
        Xem danh sách cửa hàng: Hệ thống cửa hàng
      </p>
      <p class="NoiDungSanPham">
        <i class="fa-solid fa-chevron-right"></i>
        Miễn phí vận chuyển cho đơn hàng từ 1.000.000đ
      </p>
      <p class="NoiDungSanPham">
        <i class="fa-solid fa-chevron-right"></i>
        Chính sách đổi hàng:
        <br>
        - Quần, áo: Được đổi hàng trong vòng 30 ngày kể từ ngày mua.
        <br>
        - Giày dép, áo len: Được đổi trong vòng 07 ngày, được bảo hành 60 ngày kể từ ngày mua.
        <br>
        - Phụ kiện (thắt lưng, ví, túi xách,...): Không được đổi trả, được bảo hành trong vòng 60 ngày.
        <br>
        - Nội y, caravat, khẩu trang, kẹp, nơ, nút, khăn: Không đổi hàng
        <br>
        - Áo ngực, đồ ngủ, đồ mặc nhà, đồ thể thao, áo hai dây hàng dệt: Được đổi trong vòng 14 ngày
      </p>
      <p class="NoiDungSanPham">
        <i class="fa-solid fa-chevron-right"></i>

        Màu sắc sản phẩm trên website và thực tế có thể chênh lệch (không đáng kể) do điều kiện ánh sáng của môi trường
        và thiết bị công nghệ khác nhau.
      </p>
      <hr>
      <div class="ThemGioHang">
        <form action="" method='post'>
          <input type="number" min="1" name='quantity' value='1' max="<?= intval($sanpham['SoLuong']) - intval(@$_SESSION['cart'][$sanpham['MaSanPham']])  ?>" >
          <input type="hidden" name='id' value='<?= $sanpham['MaSanPham'] ?>'>
          <input type="submit" name='addtocart' class="btn btn-dark" value="Thêm vào giỏ hàng">
        </form>
      </div>
      <hr>
      <div class="ChiaSeSanPham">
        <span> Chia sẻ: </span>
        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
        <a href=""><i class="fa-brands fa-twitter"></i></a>
        <a href=""><i class="fa-brands fa-pinterest"></i></a>
      </div>
    </div>

  </div>

</div>