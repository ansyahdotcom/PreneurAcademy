$(document).ready(function() {
    $("#btn-newform").click(function() {
        const jumlah = parseInt($("#count-form").val());
        const nextForm = jumlah + 1;

        $("#insert-form").append(
        "<div class='card-body'>" +
            "<div>" +
            "<h2 class='text-bold text-primary badge-pill bg-warning text-center'>Data Ke " + nextForm + "</h2>" +
            "</div>" +
            "<hr>" +
            "<div class='row'>" +
            "<div class='col-md-6'>" +
                "<div class='form-group'>" +
                "<label for='namakls'>Nama Kelas</label>" +
                "<input type='text' class='form-control' id='namakls' name='namakls' placeholder='Nama kelas'>" +
                "</div>" +
            "</div>" +
            "<div class='col-md-6'>" +
                "<div class='form-group'>" +
                "<label for='link'>Link Kelas</label>" +
                "<input type=text class='form-control' id='link' name='link' placeholder='Link kelas'>" +
                "</div>" +
            "</div>" +
            "</div>" +
            "<div class='row'>" +
            "<div class='col-md-6'>" +
                "<div class='form-group'>" +
                "<label for='harga'>Harga Kelas</label>" +
                "<input type='text' class='form-control' id='harga' name='harga' placeholder='Harga kelas'>" +
                "</div>" +
            "</div>" +
            "<div class='col-md-6'>" +
                "<div class='form-group'>" +
                "<label for='diskon'>Diskon</label>" +
                "<input type='text' class='form-control' id='diskon' name='diskon' placeholder='Diskon kelas (jikas ada)'>" +
                "</div>" +
            "</div>" +
            "</div>" +
            "<div class='row'>" +
            "<div class='col-md-6'>" +
                "<div class='form-group'>" +
                "<label for='exampleInputFile'>Gambar Kelas</label>" +
                "<div class='input-group'>" +
                    "<div class='custom-file'>" +
                    "<input type='file' class='custom-file-input text-gray' id='exampleInputFile' name='gbrkls'>" +
                    "<label class='custom-file-label' for='exampleInputFile'>Pilih Berkas...</label>" +
                    "</div>" +
                "</div>" +
                "</div>" +
            "</div>" +
            // "<div class='col-md-6'>" +
            //     "<div class='form-group'>" +
            //     "<label>Kategori</label>" +
            //     "<select class='custom-select'>" +
            //         "<option class='text-gray' selected disabled>Kategori kelas...</option>" +
            //         . foreach ($ktg as $k)  . " 
            //         . $id = $k['ID_KTGKLS']. " 
            //         . $ktg = $k['KTGKLS'] . " 
            //         " 
            //         "<option value='<?= $id; ?>'>" . $ktg . "</option>" +
            //         . endforeach .  
            //     "</select>" +
            //     "</div>" +
            // "</div>" +
            "</div>" +
            "<div class='row'>" +
            "<div class='col-md-12'>" +
                "<div class='form-group'>" +
                "<label>Deskripsi</label>" +
                "<textarea class='form-control' rows='6' cols='12' id='deskripsi' name='deskripsi' placeholder='Deskripsi kelas'></textarea>" +
                "</div>" +
            "</div>" +
            "</div>" +
        "</div>" +
        "<hr>")

        $("#count-form").val(nextForm);
    });

    $("#btn-reset").click(function() {
        $("#insert-form").html("");
        $("#count-form").val("1");
    });

    $('#slct-ktg').click(function() {
        var id=$(this).val();
        $.ajax({
            url : "<?php echo site_url('admin/kelas/get_ktgkls'); ?>",
            method : "POST",
            data : {id: id},
            async : true,
            datatype : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].ID_KTGKLS+'>'+data[i].KTGKLS+'</option>';
                }
                $('#slct-ktg').html(html);
            }
        });
        return false;
        // alert('helo');
    });
});