$(document).ready(function () {

  $.ajax({
  type: 'POST',
  url: 'catalog.php',
  dataType: 'json',
  response: 'text',
  errrep: true,
  error: function (num) {
    console.log(num);
  },
  success: function (data) {
      for (var i = 0; i < data.length; i++) {
        $('.itemsBlock').append('<div class="item" id="itemId' + data[i].id +'"></div>');
        $('#itemId' + data[i].id).append('<h2>' + data[i].item_name + '</h2>');
        $('#itemId' + data[i].id).append('<h3>Цена: ' + data[i].price + '</h3>');
      }
  }
  });
});
