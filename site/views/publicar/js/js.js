function filePreview(input) {

    var html='';
    if (input.files && input.files[0]) {
        for (var i = 0; i < input.files.length; i++) {
           
        var reader = new FileReader();
        reader.onload = function (e) {
            
            html+='<div class="col-2 " ><img src="'+e.target.result+'" class="img-thumbnail" /></div>';
            $('#mini').html(html);
        }
        reader.readAsDataURL(input.files[i]);
        }
    }
}

$("#fotos").change(function () {
    filePreview(this);
});
