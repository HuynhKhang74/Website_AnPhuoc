<div class="container">
    <div class="text-center m-5">
        <h1>TIN TỨC - SỰ KIỆN</h1>
        <p>Cập nhật thông tin mới nhất</p>
    </div>
    <div class="row">
        <div class="col-9 p-4">
            <h3 class="text-uppercase"><?= $tintuc["TenTinTuc"] ?></h3>
            <div class="d-flex justify-content-between">
                <p><?= date("d/m/Y", $tintuc["NgayDang"]) ?> <i class="fa-solid fa-earth-americas"></i></p>
                <p class="fs-4"><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a> <a href="https://x.com"><i class="fa-brands fa-twitter"></i></a> </p>
            </div>
            <hr>
            <img src="<?= $tintuc["HinhAnhDaiDien"] ?>" class="img-fluid" alt="Hình ảnh của tin tức">
            <p><?= $tintuc["NoiDung"] ?></p>
        </div>
        <div class="col-3 p-4">
            <h3>TIN TỨC KHÁC</h3>
            <div class="list-group">
                <?php foreach($news as $item) { ?>
                    <a href="" class="list-group-item d-flex">
                    <img style="width: 100px; aspect-ratio : 1; object-fit:cover;padding: 10px 10px" src="<?= $item['HinhAnhDaiDien'] ?>" alt="Hình ảnh của tin tức">
                    <div class="text-uppercase">
                       <div><?= $item['TenTinTuc'] ?></div>
                       <div><?= date("d/m/Y", $item["NgayDang"]) ?></div>
                    </div>
                </a>
                <?php  }?> 
            </div>
        </div>
    </div>
  
  </div>