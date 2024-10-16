<?php
switch ($_GET['action']) {
    case 'list':
        $tintucs = selectAll('select * from tintuc');
        $template = 'tintuc/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $tintuc = selectOne("select * from tintuc where id='{$_GET['id']}'");
            if (!is_array($tintuc) || empty($tintuc)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=tintuc&action=list');
            }
        }
        $template = 'tintuc/edit';
        break;
    case 'save':
        $checkMaSP = selectOne("select MaTinTuc from tintuc where MaTinTuc = '{$_POST['MaTinTuc']}' and id <> '{$_POST['id']}'");
        if (is_array($checkMaSP) && !empty($checkMaSP)) {
            alert('Mã sản phẩm đã tồn tại!', 'index.php?page=tintuc&action=list');
        }
        foreach ($_POST as $key => $param) {
            if ($param === '') {
                $_POST[$key] = NULL;
            }
        }
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
            $file = uploadFile('file');
        } elseif ($_POST['file_curr'] != '') {
            $file = $_POST['file_curr'];
        }
        if (intval($_POST['id'])) {
            if (
                !update('tintuc', [
                    'id' => $_POST['id'],
                    'MaTinTuc' => $_POST['MaTinTuc'],
                    'TenTinTuc' => $_POST['TenTinTuc'],
                    'HinhAnhDaiDien' => $file,
                    'NoiDung' => $_POST['NoiDung'],
                    'NgayDang' => time()
                ])
            ) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=tintuc&action=list');
            }
        } else {
            if (
                !insert('tintuc', [
                    'MaTinTuc' => $_POST['MaTinTuc'],
                    'TenTinTuc' => $_POST['TenTinTuc'],
                    'HinhAnhDaiDien' => $file,
                    'NoiDung' => $_POST['NoiDung'],
                    'NgayDang' => time()
                ])
            ) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=tintuc&action=list');
            }
        }
        redirect('index.php?page=tintuc&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("tintuc", "where id='{$_GET['id']}'");
            if ($num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=tintuc&action=list');
            }
        }
        redirect('index.php?page=tintuc&action=list');
        break;
    case 'show':
        if (isset($_GET['id'])) {
            update("tintuc", ['id' => $_GET['id'], 'enable' => 1]);

        }
        redirect('index.php?page=tintuc&action=list');
        break;
    case 'hide':
        if (isset($_GET['id'])) {
            update("tintuc", ['id' => $_GET['id'], 'enable' => 0]);
        }
        redirect('index.php?page=tintuc&action=list');
        break;
    case 'popular':
        if (isset($_GET['id'])) {
            update("tintuc", ['id' => $_GET['id'], 'popular' => 1]);
        }
        redirect('index.php?page=tintuc&action=list');
        break;
    case 'unpopular':
        if (isset($_GET['id'])) {
            update("tintuc", ['id' => $_GET['id'], 'popular' => 0]);
        }
        redirect('index.php?page=tintuc&action=list');
        break;
    default:
        redirect('index.php');
}