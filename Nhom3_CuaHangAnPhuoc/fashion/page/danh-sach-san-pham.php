<div class="container">
<nav class="breadcrumb-area" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="darkyellow">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
</nav>

  <div class="alltitle">
    <p class="alltitle__main">PIERRE CARDIN</p>
    <p class="alltitle__sub">PIERRE CARDIN</p>
  </div>

  <div class="allmain">
    <div class="allsidebar">
      <div class="allsidebar__name">AN PHUOC</div>
      <div class="allsidebar__accordion">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <?php foreach($leftMenuItems as $menuItem) { ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $menuItem["MaLoai"]  ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                  <?= $menuItem["TenLoai"] ?>
                </button>
              </h2>
              <div id="<?= $menuItem["MaLoai"] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <ul class="list-group list-group-flush">
                    <?php   
                    $submenuItems = selectAll("select * from loaisanpham where DanhMucSanPham = '".$menuItem['MaLoai']."'");   
                    foreach($submenuItems as $SubItem) { ?>
                      <li class="list-group-item <?= $query['param-2'] == $SubItem['MaLoai'] ? 'active':'' ?>"><a class="darkyellow" href="/danh-sach-san-pham/<?= $SubItem['MaLoai'] ?>"><?= $SubItem['TenLoai'] ?></a></li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="allsidebar__name">BỘ LỌC</div>
      <hr>
      <div class="allsidebar__kieudang">
        <div class="kieudang__title">Kiểu dáng</div>
        <div class="kieudang__content">
        <?php
          foreach($kieudang as $key => $value) { 
            $href = $requestKieuDang;
            $href[] = "kieu-dang=".$value['MaKieuDang'];
            $href = implode("&", $href);
            ?>
            <a href="<?= $request."?".$href ?>"><?= $value['TenKieuDang']?></a>
          <?php } ?>  
            <a href="<?= $request."?".implode("&", $requestKieuDang) ?>"> X </a>
        </div>
      </div>

      <hr>
      <div class="allsidebar__mausac">
        <div class="mausac__title">Màu sắc</div>
        <div class="mausac__content" style="display: flex; flex-wrap: wrap;">
          <?php
          foreach($mausac as $key => $value) { 
            $href = $requestMauSac;
            $href[] = "mau-sac=".$value['MaMauSac'];
            $href = implode("&", $href);
            ?>
            <a href="<?= $request."?".$href ?>" style="background-color: <?= $value['HEXMauSac']?>">&nbsp;</a>
          <?php } ?>  
          <a href="<?= $request."?".implode("&", $requestMauSac) ?>" style="display: flex; align-items: center; justify-content: center;">X</a>

        </div>
      </div>

      <hr>
      <div class="allsidebar__kieudang">
        <div class="kieudang__title">Kích cỡ</div>
        <div class="kieudang__content">

        <?php
        foreach($size as $key => $value) {
          $href = $requestKichThuoc;
          $href[] ="kich-thuoc=".$value['MaSize'];
          $href = implode("&", $href);
          ?>
          <a href="<?= $request."?".$href ?>"><?= $value['TenSize']?></a>
        <?php } ?>    
        <a href="<?= $request."?".implode("&", $requestKichThuoc) ?>"> X </a>

        </div>
      </div>

      <hr>
      <div class="allsidebar__hoatiet">
        <div class="hoatiet__title">Chất liệu</div>
        <div class="hoatiet__content">
        <?php
        foreach($chatlieu as $key => $value) { 
          $href = $requestChatLieu;
          $href[] ="chat-lieu=".$value['MaChatLieu'];
          $href = implode("&", $href);
          ?>
          <a href="<?= $request."?".$href ?>"><?= $value['TenChatLieu']?> |</a>
        <?php } ?> 
          <a href="<?= $request."?".implode("&", $requestChatLieu) ?>"> X </a>
          
        </div>
      </div>

    </div>

    <div class="allcontent">
      <div class="allcontent__tool">
        <?php if(!isset($_GET['keyword'])) {?>
          <div class="allcontent__tool-left">
            <p>Loại sản phẩm : <?php echo $loaisanpham['TenLoai'] ?> </p>
          </div>
        <?php }?>
        
        <div class="allcontent__tool-right">
          <div class="allcontent__tool-item allcontent__tool-number">
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect01">Hiển thị</label>
              <select class="form-select" onchange="window.location = '<?= $currentUrl.'?sort='.$sort ?>&soluong=' + this.value" id="inputGroupSelect01">
                <option <?php if(isset($display) && $display==6) echo 'selected'; ?> value="6">6</option>
                <option <?php if(isset($display) && $display==12) echo 'selected'; ?> value="12">12</option>
              </select>
            </div>
          </div>
          <div class="allcontent__tool-item allcontent__tool-sort">
            <select class="form-select" onchange="window.location = '<?= $currentUrl.'?soluong='.$display ?>&sort=' + this.value" aria-label="Default select example">
              <option value="1" <?= $sort == 1 ? 'selected' : ''?>>Mới nhất</option>
              <option value="2" <?= $sort == 2 ? 'selected' : ''?>>Giá: Thấp - Cao</option>
              <option value="3" <?= $sort == 3 ? 'selected' : ''?>>Giá: Cao - Thấp</option>
            </select>
          </div>
        </div>
      </div>
      <div class="allcontent__items">
        <?php
        foreach($sanphams as $key => $value) { ?>
          <a href="san-pham/<?= $value['MaSanPham'] ?>"><div class="allcontent__item">
              <img src="<?= $value['HinhAnh']?>" alt="<?=$value['TenSanPham']?>">
              <p><?= $value['TenSanPham']?></p>
              <p><?= number_format($value['GiaBan'])?></p>
          </div></a>
        <?php } ?>
        
      </div>
      <nav aria-label="...">
        <ul class="pagination pagination-lg justify-content-center">
        <li class="page-item" aria-current="page">
            <a class="page-link" href="<?= $currentUrl.'?page=1&soluong='.$display.'&sort='.$sort.'"' ?>">FIRST</a>
          </li>              <?php
            for($i=1; $i<=$numlinks; $i++){
              echo "<li class='page-item ".(($page==$i)?'active':"")." '><a class='page-link' href='".$currentUrl."?page=".$i."&soluong=".$display.'&sort='.$sort."'?>".$i."</a></li>";
            }
          ?>
          <li class="page-item"><a class="page-link" href="<?= $currentUrl.'?page='.ceil($numlinks)."&soluong=".$display.'&sort='.$sort ?>">LAST</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>