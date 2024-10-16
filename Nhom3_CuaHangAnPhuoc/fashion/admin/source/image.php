<?php
$types = [
    'logo' => 'Logo',
    'slider' => 'Ảnh Slide',
    'service' => 'Dịch vụ',
    'video' => 'Video',
    'brand' => "Brand",
    'new' => 'New',
];
switch ($_GET['action']) {
    case 'list':
        $images = selectAll('select * from image where type in ("'.implode('","', array_keys($types)).'")');
        $template = 'image/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $image = selectOne("select * from image where id='{$_GET['id']}'");
            if (!is_array($image) || empty($image)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=image&action=list');
            }
        }
        $template = 'image/edit';
        break;
    case 'save':

        if($_FILES['file']['name'] != ''){
            $file = uploadFile('file');
        }
        elseif($_POST['file_curr'] != '') {
            $file = $_POST['file_curr'];
        }
        if (intval($_POST['id'])) {
            if (!update('image', ['id' => $_POST['id'],'title' => $_POST['title'],'url' => $file, 'type' => $_POST['type']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=image&action=list');
            }
        } else {
            if (!insert('image', ['title' => $_POST['title'], 'url' => $file, 'type' => $_POST['type'], 'enable' => 1])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=image&action=list');
            }
        }
        redirect('index.php?page=image&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("image", "where id='{$_GET['id']}'");
            if (!$num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=image&action=list');
            }
        }
        redirect('index.php?page=image&action=list');
        break;
    case 'show':
        if (isset($_GET['id'])) {
            update("image", ['id' => $_GET['id'], 'enable' => 1]);

        }
        redirect('index.php?page=image&action=list');
        break;
    case 'hide':
        if (isset($_GET['id'])) {
            update("image", ['id' => $_GET['id'], 'enable' => 0]);
        }
        redirect('index.php?page=image&action=list');
        break;
    default:
        redirect('index.php');
}