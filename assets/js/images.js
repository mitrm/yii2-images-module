
var MitrmImagesWidget = function () {
    var item = this;
    this.form = $('.js_mitrm_img_upload_form');
    this.btnUpload = $('.js_mitrm_img_upload_submit');
    this.resultContent = $('.js_mitrm_image_content');
    this.resultImageSize = $('.js_mitrm_image_link_size');
    this.resultImageSizeImg = $('.js_mitrm_get_size_img');
    this.resultImg = $('.js_mitrm_image_result');
    this.resultImgPreview = $('.js_mitrm_image_preview');

    this.form.submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            type:'POST',
            url: item.form.attr('action'),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                item.clearAll();
                if(data.status === true) {
                    item.resultImageSize.html(data.btn_img);
                    item.resultImg.val(data.url);
                    item.resultImgPreview.html(data.preview);
                    item.resultContent.show();

                }


            },
            error: function(data){

            }
        });
        return false;
    });

    $('body').delegate('.js_mitrm_get_size_img', 'click', function() {
        $.get($(this).attr('href'),
            function( data ) {
                if(data.status === true) {
                    item.resultImg.val(data.url);
                } else {
                    alert('Произошла ошибка: ' + data.message);
                }
            });
        return false;
    });

    this.clearAll = function() {
        item.form.find('.js_mitrm_input_clear').val('');
        item.resultImg.val('');
        item.resultImageSize.html('');
        item.resultImgPreview.html('');

    }

};


$(document).ready(function () {
    window.mitrmImages = new MitrmImagesWidget();


});

