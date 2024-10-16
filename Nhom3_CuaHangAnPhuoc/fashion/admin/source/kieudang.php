<?php
switch ($_GET['action']) {
    case 'list':
        $kieudangs = selectAll('select * from kieudang');
        $template = 'kieudang/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $kieudang = selectOne("select * from kieudang where id='{$_GET['id']}'");
            if (!is_array($kieudang) || empty($kieudang)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=kieudang&action=list');
            }
        }
        $template = 'kieudang/edit';
        break;
    case 'save':
        if (intval($_POST['id'])) {
            if (!update('kieudang', [ 'id' => $_POST['id'], 'MaKieuDang' => $_POST['MaKieuDang'], 'TenKieuDang' => $_POST['TenKieuDang']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=kieudang&action=list');
            }
        } else {
            if (!insert('kieudang', ['MaKieuDang' => $_POST['MaKieuDang'],'TenKieuDang' => $_POST['TenKieuDang']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=kieudang&action=list');
            }
        }
        redirect('index.php?page=kieudang&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("kieudang", "where id='{$_GET['id']}'");
            if (!$num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=kieudang&action=list');
            }
        }
        redirect('index.php?page=kieudang&action=list');
        break;
    default:
        redirect('index.php');
}