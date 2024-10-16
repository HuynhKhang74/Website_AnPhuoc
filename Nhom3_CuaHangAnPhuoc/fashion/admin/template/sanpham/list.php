<table class="table bordered">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Nhân Viên</th>
        <th>Tên Sản Phẩm</th>
        <th>URI</th>
        <th>Link</th>
        <th>Hình Ảnh</th>
        <th>Giá Bán</th>
        <th>Số Lượng</th>
        <th>Loại Sản Phẩm</th>
        <th>Màu Sắc</th>
        <th>Size</th>
        <th>Chất Liệu :</th>
        <th>Kiểu Dáng</th>
        <th colspan="4" class="center">Thao tác</th>
    </tr>
    <?php foreach ($sanphams as $key => $sanpham) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $sanpham['MaSanPham'] ?></td>
            <td><?= $sanpham['TenSanPham'] ?></td>
            <td><?= $sanpham['uri'] ?></td>
            <td width="50" class="center"><a href="index.php?page=gallery&action=list&product_id=<?= $sanpham['id'] ?>">Gallery</a></td>
            <td><img style="max-width:200px; max-height:200px" src="../<?= $sanpham['HinhAnh'] ?>"></td>
            <td><?= $sanpham['GiaBan'] ?></td>
            <td><?= $sanpham['SoLuong'] ?></td>
            <td><?= $sanpham['LoaiSanPham'] ?></td>
            <td><?= $sanpham['MauSac'] ?></td>
            <td><?= $sanpham['Size'] ?></td>
            <td><?= $sanpham['ChatLieu'] ?></td>
            <td><?= $sanpham['KieuDang'] ?></td>
            <td  class="center">
                <?php if(intval($sanpham['enable'])) { ?>
                    <a href="index.php?page=sanpham&action=hide&id=<?= $sanpham['id'] ?>"  >Ẩn Đi</a>
                <?php } else { ?>
                    <a href="index.php?page=sanpham&action=show&id=<?= $sanpham['id'] ?>"  >Hiện Ngay</a>
                <?php } ?>
            </td>
            <td  class="center">
                <?php if(intval($sanpham['popular'])) { ?>
                    <a href="index.php?page=sanpham&action=unpopular&id=<?= $sanpham['id'] ?>"  >Bỏ nổi bật</a>
                <?php } else { ?>
                    <a href="index.php?page=sanpham&action=popular&id=<?= $sanpham['id'] ?>"  > Nổi bật</a>
                <?php } ?>
            </td>
            <td width="50" class="center"><a href="index.php?page=sanpham&action=edit&id=<?= $sanpham['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=sanpham&action=remove&id=<?= $sanpham['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=sanpham&action=edit">Thêm mới</a></td>
    </tr>
</table>