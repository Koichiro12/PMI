function confirmDelete(e,val){
    e.preventDefault();
    var form = val.closest("form");
    swal({
        title: "Are you sure?",
        text: "You cannot cancel this process!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, I am sure !",
    },function(isConfirm){
        if(isConfirm){
          form.submit();
        }
    });
}

function confirmAButton(e,val){
    e.preventDefault();
    var link = $(val).attr("href");
    swal({
        title: "Are you sure?",
        text: "You cannot cancel this process!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, I am sure !",
    },function(isConfirm){
        if(isConfirm){
            window.location = link;
        }
    });
}

$(function () {
    $(".a-confirm").on("click", function (e) {
        e.preventDefault();
        var link = $(this).attr('href');

        swal({
          title: "Are you sure?",
          text: "You cannot cancel this process!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, I am sure !",
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
            title: "Are you sure?",
            text: "You cannot cancel this process!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, I am sure !",
        },function(isConfirm){
            if(isConfirm){
                form.submit();
            }
        });
    });
});
