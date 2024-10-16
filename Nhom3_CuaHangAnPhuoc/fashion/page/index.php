<div class="container">

    <div class="slideshow">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <?php foreach($sliders as $key => $slider) { ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $key ?>" class="<?= $key == 0 ? 'active' : ''?>" aria-current="true" aria-label="Slide 1"></button>
          <?php } ?>
        </div>
        <div class="carousel-inner">
          <?php foreach($sliders as $key => $slider) { ?>
            <div class="carousel-item <?= $key == 0 ? 'active' : ''?>">
                <a href=""><img src="<?= $slider['url'] ?>" class="d-block w-100"></a>
            </div>
          <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>




    <div class="khamPhaDanhMuc">
      <div class="khamPhaDanhMuc__title">Khám phá các sản phẩm cao cấp từ An Phước - Pierre Cardin</div>
      <div class="khamPhaDanhMuc__main">
        <?php foreach($brand as $item) { ?>
          <div class="khamPhaDanhMuc__item">
          <img src="<?= $item['url'] ?>">
          <p><?= $item['title'] ?></p>
        </div>
        <?php } ?>
      </div>
    </div>
    
    <div class="noiBat">
      <div class="TinNoiBat">
        <p>Tin Tức Nổi Bật</p>
        <a href="./tin-tuc" class="noiBat__imglink"><img src="<?= $news['url'] ?>" alt="Tin Nổi Bật"></a>
        <a href="./tin-tuc" class="noiBat__imgbtn btn btn-outline-light">XEM TIN TỨC</a>
      </div>

      <div class="SanPhamNoiBat">
        <p>Sản phẩm nổi bật</p>
        <div class="SanPhamNoiBat__main">
          <?php foreach($popular as $item) { ?>
            <a href="san-pham/<?= $item['MaSanPham'] ?>"><div class="SanPhamNoiBat__item">
            <img src="<?= $item['HinhAnh'] ?>" alt="Sản phẩm nổi bật">
            <p><?= $item['TenSanPham'] ?></p>
            <p><?= number_format($item['GiaBan']) ?></p>
          </div></a>
          <?php } ?>
          
        </div>
        <a class="SanPhamNoiBat__xemAll" href="./danh-sach-san-pham">Xem tất cả</a>
      </div>
    </div>
    <video  width="100%" autoplay="1" loop="1" muted="1">
        <source src="./<?= $video['url'] ?>" type="video/<?= preg_replace('/^.+\.([^\.]+)$/','$1',$video['url']) ?>">
    </video>
    <div class="BoSuuTap">
      <p class="BoSuuTap__title">LE CONQUÉRANT</p>
      <p class="BoSuuTap__sub">Cùng An Phước bước vào một cuộc hành trình khám phá đại dương bao la, nơi những nhà chinh phục mang phong thái thời thượng, sang trọng và đầy khí chất.</p>
    </div>
  </div>