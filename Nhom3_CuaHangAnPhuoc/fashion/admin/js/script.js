function utf8ToAscii(name) {
    const map = {
        'u': [
            'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự',
            'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự',
        ],
        'e': [
            'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ',
            'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ',
        ],
        'o': [
            'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ',
            'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ',
        ],
        'a': [
            'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ',
            'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ',
        ],
        'i': [
            'í', 'ì', 'ỉ', 'ĩ', 'ị',
            'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị',
        ],
        'd': ['đ', 'Đ'],
    };

    let uri = name.trim();

    for (ascii of Object.keys(map)) {
        for (utf8 of map[ascii]) {
            uri = uri.replaceAll(utf8, ascii);
        }
    }
    
    return uri.toLowerCase().replaceAll(/[^0-9a-z]+/g, '-');
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input.dataset.target).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$(function () {
    $(".imgInp").change(function(){
        readURL(this);
    
    });
});