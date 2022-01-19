$(function() {

  $("#quota").on("input", function(){

    var $quotaPrice = $(this).val() / 2; 
    $("#quota-price").text("RM" + $quotaPrice.toFixed(2));

    var $taxPrice = $quotaPrice * 0.06;
    $("#tax-price").text("RM" + $taxPrice.toFixed(2));

    var $totalPrice = ($taxPrice + $quotaPrice).toFixed(2);
    $("#total-price").text("RM" + $totalPrice);

    $("#hidden-price").val($totalPrice);
  })
  
})