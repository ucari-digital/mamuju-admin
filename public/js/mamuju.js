// Cropper JS
window.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('crpr-upload');
    var image = document.getElementById('crpr-image');
    var cropper;
    var canvas;
    input.addEventListener('change', function(e) {
        var files = e.target.files;
        var done = function(url) {
            input.value = '';
            image.src = url;
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
                console.log(URL.createObjectURL(file));
                $('.crpr-modal').show();
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
        cropper = new Cropper(image, {
            dragMode: 'move',
            aspectRatio: 16 / 9,
            autoCropArea: 0.65,
            restore: false,
            guides: false,
            center: false,
            highlight: false,
            cropBoxMovable: false,
            cropBoxResizable: false,
            toggleDragModeOnDblclick: false,
        });
        $('.crpr-btn').click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 800,
                height: 400,
            });
            $('.crpr-modal-preview').show();
            $('#crpr-image-preview').attr('src', canvas.toDataURL());
            $('.crpr-btn-preview-save').click(function(){
            	$('#image-base').val(canvas.toDataURL());
            	$('.crpr-modal').hide();
            	$('.crpr-modal-preview').hide();
            });
        })
    });
});