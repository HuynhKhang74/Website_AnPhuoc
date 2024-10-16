<div class="container">
    <?php if(empty($cart)){?>
        <h1>GIỎ HÀNG CỦA BẠN (<span class="text-danger">0</span>) SẢN PHẨM</h1>
    <div class="noidunggiohang">
    <p>
        <i class="fa-solid fa-cart-shopping"></i>
        Chưa có sản phẩm nào trong giỏ hàng
    </p>
    <p><a href="#">
        <i class="fa-solid fa-angle-left"></i>
        Quay về
    </a></p>
    </div>
    <?php }
    else { ?>
         <h1>GIỎ HÀNG CỦA BẠN (<span class="text-danger"><?= $cart_quantity ?></span>) SẢN PHẨM</h1>

<div class="noidunggiohang">
    <table class="table">
        <thead>
          <tr class="table-secondary">
            <th scope="col">SẢN PHẨM</th>
            <th scope="col">GIÁ</th>
            <th scope="col">SỐ LƯỢNG</th>
            <th scope="col">TỔNG TIỀN</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($cart as $cart_item) { ?>
                <tr>
                    <td scope="row">
                    <div class="sanphamgiohang">
                    <a href="#"><img src="<?= $cart_item['item']['HinhAnh'] ?>" width="150px" height="150px"></a>
                    <div class="noidungsanpham">
                        <a href="#"><b><?= $cart_item['item']['TenSanPham'] ?> </b></a>
                        <p>Kích cỡ: <?= isset($cart_item['item']['kichco_item']) ? $cart_item['item']['kichco_item']['TenSize'] : 'Mặc định' ?></p>
                        <p>Màu Sắc: <?= isset($cart_item['item']['mausac_item']) ? $cart_item['item']['mausac_item']['TenMauSac'] : 'Mặc định' ?></p>
                        <p>Kiểu dáng : <?= isset($cart_item['item']['kieudang_item']) ? $cart_item['item']['kieudang_item']['TenKieuDang'] : 'Mặc định' ?></p>
                        <form action="" method='post'>
                        <input type="hidden" name='id' value='<?=  $cart_item['item']['MaSanPham']?>'>
                        <input type="submit" name='delete' class="btn btn-outline-danger" value="Bỏ sản phẩm" >
                    </form>
                    </div>
                </div>
            </td>
            <td><?= number_format($cart_item['item']['GiaBan']) ?></td>
            <td>
                <div class="input-group mb-3 quantity-container">
                    <form action="" method='post'>
                        <input type="hidden" name='id' value='<?=  $cart_item['item']['MaSanPham']?>'>
                        <input type="submit" name='minus' class="input-group-text btn btn-secondary decrease" value="-" <?= intval($cart_item['quantity']) <= 1 ? 'disabled' : '' ?>>
                    </form>
                    <input type="text" class="form-control soluongsanpham quantity-input" min="1" value="<?= $cart_item['quantity']?>" style="width: 60px; flex-grow: 0; text-align : center" readonly>
                    <form action="" method='post'>
                        <input type="hidden" name='id' value='<?=  $cart_item['item']['MaSanPham']?>'>
                        <input type="submit" name='plus' class="input-group-text btn btn-secondary increase" value="+"  <?= intval($cart_item['quantity']) >= $cart_item['item']['SoLuong'] ? 'disabled' : '' ?>>
                    </form>
                  </div>
            </td>
            <th><?= number_format($cart_item['item']['GiaBan']) ?></th>
          </tr>

            <?php } ?>
        </tbody>
      </table>
        <div class="noidungtongtien">
            <b>Tổng tính: </b>
            <p class="text-danger"><?= number_format($cart_total) ?></p>
        </div>
        <div class="submittongtien">
            <button class="btn btn-secondary"><i class="fa-solid fa-arrow-left-long"></i> Quay lại</button>
            <?php if(isset($_SESSION['customer'])) {?>
                <button onclick="if(confirm('Bạn chắc chắn muốn tiếp tục ?')) window.location='/dat-hang'" class="btn btn-danger">Đặt Hàng<i class="fa-solid fa-arrow-right-long"></i></button>
            <?php } 
            else {    ?>
                <a href='/login?back=gio-hang' class="btn btn-danger">Tiếp tục<i class="fa-solid fa-arrow-right-long"></i></a>
            <?php } ?>
            
        </div>
</div>

    <?php } ?>
    
</div>
