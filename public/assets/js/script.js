$(function () {
    $(".a-confirm").on("click", function (e) {
        e.preventDefault();
        var link = $(this).attr('href');

        swal({
          title: "Apakah anda yakin?",
          text: "Anda tidak bisa membatalkan proses ini!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, saya yakin !",
      },function(isConfirm){
        if (isConfirm) {
            window.location = link;
           }
      });
    });
    $(".form-confirm").on("click", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");
        swal({
            title: "Apakah anda yakin?",
            text: "Anda tidak bisa membatalkan proses ini!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, saya yakin !",
        },function(isConfirm){
            if(isConfirm){
                form.submit();
            }
        });
    });
});
