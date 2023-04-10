$(document).ready(function () {
    $('.delete_product_btn').click(function (e){
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id':id,
                    'delete_product_btn': true
                },
                success: function(response){
                    if (response == 200) {
                        window.location.reload();
                        swal("Success", "product Deleted Successfully", "success");
                    }else if(response == 500){
                        window.location.reload();
                        swal("Error", "Something Went Wrong", "error");
                    }
                }
              })
            }
          });
    });

    $('.delete_category_btn').click(function (e){
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'category_id':id,
                    'delete_category_btn': true
                },
                success: function(response){
                    if (response == 200) {
                        window.location.reload();
                        swal("Success", "category Deleted Successfully", "success");   
                    }else if(response == 500){
                        window.location.reload();
                        swal("Error", "Something Went Wrong", "error");
                    }
                }
              })
            }
          });
    });
});