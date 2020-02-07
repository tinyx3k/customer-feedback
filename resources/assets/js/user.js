$(document).ready(function(){

    function generateMemberID() {
        var province = $('#province-select').val();
        var route = window.publicUrl+"/member-count";
        var data = {
            province: province
        }
        $.ajax({
            cache: false,
            type: 'get',
            dataType: 'json',
            url: route,
            data: data,
            error: function (jqXHR, textStatus, errorThrown) {
                if (textStatus != 'error')
                    return;
                if (errorThrown == 'Unprocessable Entity'){

                    var responseJSON = jqXHR.responseJSON;
                    try {
                        console.log(responseJSON[Object.keys(responseJSON)[0]][0]);
                        return;
                    } catch (e) {
                        // do nothing
                    }
                }
                console.log("Unable to add loan"); // generic error message
            },
            success: function (data) {
                $('#member-id').html(data.member_id)
                $('#member_id_value').val(data.member_id);
            },
        });
    }
    
    generateMemberID();

    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 300,
            type: 'rectangle'
        },
        boundary: {
            width: 400,
            height: 400
        }
    });

    $('#img-upload').on('click', function(){
        $('#file-image').click();
    });


    $('#file-image').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });

        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $('#img-upload').attr('src', resp);
            $('#image').val(resp);
        });
    });

    $('#province-select').on('change', function(){
        generateMemberID();
    });

});
