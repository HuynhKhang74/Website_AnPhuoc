<?php
switch ($_GET['action']) {
    case 'list':
        $mausacs = selectAll('select * from mausac');
        $template = 'mausac/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $mausac = selectOne("select * from mausac where id='{$_GET['id']}'");
            if (!is_array($mausac) || empty($mausac)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=mausac&action=list');
            }
        }
        $template = 'mausac/edit';
        break;
    case 'save':
        foreach($_POST as $key => $param) {
            if ($param === '') {
                $_POST[$key] = NULL;
            }
        }
        if (intval($_POST['id'])) {
            if (!update('mausac', ['id' => $_POST['id'],'MaMauSac' => $_POST['MaMauSac'], 'TenMauSac' => $_POST['TenMauSac'],'HEXMauSac' => $_POST['HEXMauSac']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=mausac&action=list');
            }
        } else {
            if (!insert('mausac', ['MaMauSac' => $_POST['MaMauSac'], 'TenMauSac' => $_POST['TenMauSac'],'HEXMauSac' => $_POST['HEXMauSac']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=mausac&action=list');
            }
        }
        redirect('index.php?page=mausac&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("mausac", "where id='{$_GET['id']}'");
            if (!$num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=mausac&action=list');
            }
        }
        redirect('index.php?page=mausac&action=list');
        break;
    default:
        redirect('index.php');
}