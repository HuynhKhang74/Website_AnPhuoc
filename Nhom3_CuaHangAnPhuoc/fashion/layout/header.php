<?php 
  $logo = selectOne('select * from image where type = "logo" and enable > 0');
  $customer = selectOne('select * from khachhang where email = "'.@$_SESSION['customer'].'"');
?>
<div class="header__top">
      <div class="header__top1">
        <a href="#" class="header__top1__link"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="header__top1__link"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="header__top1__link"><i class="fa-brands fa-youtube"></i></a>
        <a href="#" class="header__top1__link"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="tel:1800 888 618" class="header__top1__link">
          <i class="fa-solid fa-phone"></i>
          1800 888 618
        </a>
        <a href="#" class="header__top1__link">
          <i class="fa-solid fa-location-dot"></i>
          Tìm cửa hàng
        </a>
        
        
      </div>
      <div class="header__top2">
        <a href="."><img src="<?= isset($logo['url']) ? $logo['url'] : '' ?>" alt="LOGO"></a>
      </div>
      <div class="header__top3">
        <div class="header__user">
          <i class="fa-regular fa-circle-user"></i>
          <?php if(isset($_SESSION['customer']))  { ?>
            <i style="margin : 0px 10px">Xin Chào : <?= $customer['TenKhachHang'] ?></i>
            <a href="/logout" class="header__user__link">Đăng xuất</a>
            <?php }
            else{
              ?>
                 <a href="/login" class="header__user__link">Đăng nhập</a>
                 <a href="/register" class="header__user__link">Đăng ký</a>
            <?php } ?>
        </div>
        <div class="header__cart">
          <button type="button" class=" btn btn-outline-light" id="liveToastBtn">Show</button>
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 2000">
              <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                  <strong class="me-auto">Search</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                  <form action="./danh-sach-san-pham" method="get">
                    <input type="text" name="keyword">
                    <input type="submit" value="Search">
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="header__cart btn btn-outline-light position-relative">
          <i class="fa-solid fa-cart-shopping"></i>
          <span>Giỏ hàng</span>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?= $cart_quantity?>
          </span>
          <div class="header__cart-box">
            <header class="header__cart-header">
                <div class="header__cart-title">
                  <div class="header__cart-title1">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div><span class=" start-50 translate-middle badge rounded-pill bg-danger">
                    <?= $cart_quantity?>
                    </span></div>
                  </div>
                  <div class="header__cart-title2">
                    <p>Tổng số tiền: <span><?= $cart_total ?></span></p>
                  </div>
                </div>
                <hr>
            </header>
            <ul class="header__cart-list">
                <li class="header__cart-item">
                  <?php foreach($cart as $cart_item){ ?>
                    <a href="/san-pham/<?=$cart_item['item']['MaSanPham']?>" class="header__cart-link">
                        <img src="<?=$cart_item['item']['HinhAnh']?>" alt="This is a picture of product" class="header__cart-img">
                        <div class="header__cart-info">
                            <div class="header__cart-name"><?=$cart_item['item']['TenSanPham']?></div>
                            <div class="header__cart-price"><?=number_format($cart_item['item']['GiaBan'])?></div>
                        </div>
                    </a>
                  <?php } ?>
                </li>
            </ul>
            <footer class="header__cart-footer">
                <hr>
                <a href="/gio-hang" class="header__cart-footer-btn">Xem giỏ hàng</a>
            </footer>
          </div>
        </div>
        
      </div>
  </div>

<!-- HEADER BOTTOM  -->
<div class="header__bottom sticky-top">
  <nav class="header__navber__nav navbar navbar-expand-lg">
    <div class="header__navber__nav container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
      </button>
      <div class=" header__navber__nav collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav header__navbar__ul">
          <?php $loaisps = selectAll("select * from loaisanpham where DanhMucSanPham is null")?>
          <?php foreach($loaisps as $lsp) {?>

            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $lsp['TenLoai'] ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <?php $items = selectAll('select * from LoaiSanPham where DanhMucSanPham = "'.$lsp['MaLoai'].'"') ?>
                  <?php foreach($items as $item) { ?>
                      <li><a class="dropdown-item" href="danh-sach-san-pham/<?= $item['MaLoai'] ?>"><?= $item['TenLoai'] ?></a></li>
                  <?Php } ?>
              </ul>
            </li>
          <?php } ?>
          
        </ul>
      </div>
    </div>
  </nav>
</div>