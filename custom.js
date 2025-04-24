$(document).ready(function () {
  $(".increment").click(function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product_data").find(".qty").val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;
      $(this).closest(".product_data").find(".qty").val(value);
    }
  });

  $(".decrement").click(function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product_data").find(".qty").val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      $(this).closest(".product_data").find(".qty").val(value);
    }
  });

  $(".addtocartBtn").click(function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product_data").find(".qty").val();
    var prod_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "Functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "add",
      },
      success: function (response) {
        if (response == 201) {
          alertify.success("Product Added to cart");
        } else if (response == "existing") {
          alertify.success("Product already in cart");
        } else if (response == 401) {
          alertify.success("Login To Continue");
        } else if (response == 500) {
          alertify.success("something went wrong");
        }
      },
    });
  });

  $(document).on("click", "updateQty", function () {
    var qty = $(this).closest(".product_data").find(".qty").val();
    var prod_id = $(this).closest(".product_data").find(".prodId").val();

    $.ajax({
      method: "POST",
      url: "Functions/handlecart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "update",
      },
      success: function (response) {
        alert(response);
      },
    });
  });

  $(document).on('click', '.deleteitem', function () {
    var cart_id = $(this).val();
    // alert(cart_id);

    $.ajax({
      method: "POST",
      url: "Functions/handlecart.php",
      data: {
        cart_id: cart_id,
        scope: "delete",
      },
      success: function (response) {
        if (response == 200) {
            alertify.success("Product Deleted Successfully");
          }
          else
          {
            alertify.success(response);
          }
      },
    });
  });
});
