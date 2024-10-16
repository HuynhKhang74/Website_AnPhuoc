<table class="table bordered" style="width:100%">
    <tr>
        <th>STT</th>
        <th width="100" class="center">URL</th>
        <th>Title</th>
        <th>Type</th>
        <th colspan="3" class="center">Thao tác</th>
    </tr>
    <?php foreach ($images as $key => $image) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td>
                <?php if($image['type'] != 'video') {?>
                    <img style="max-width:200px; max-height:200px" src="../<?= $image['url'] ?>">
                <?php } else { ?>
                    <video  width="200px" height="200px"  controls>
                        <source src="../<?= $image['url'] ?>" type="video/<?= preg_replace('/^.+\.([^\.]+)$/','$1',$image['url']) ?>">
                    </video>
                <?php } ?>
            </td>
            <td><?= $image['title'] ?></td>
            <td><?= $image['type'] ?></td>
            <td  class="center">
                <?php if(intval($image['enable'])) { ?>
                    <a href="index.php?page=image&action=hide&id=<?= $image['id'] ?>"  >Ẩn Đi</a>
                <?php } else { ?>
                    <a href="index.php?page=image&action=show&id=<?= $image['id'] ?>"  >Hiện Ngay</a>
                <?php } ?>
            </td>
            <td width="50" class="center"><a href="index.php?page=image&action=edit&id=<?= $image['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=image&action=remove&id=<?= $image['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=image&action=edit">Thêm mới</a></td>
    </tr>
</table>