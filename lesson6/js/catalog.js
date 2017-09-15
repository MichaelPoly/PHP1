$(document).ready(function () {
var $items;
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
      $items = data;
      for (var i = 0; i < data.length; i++) {
        $('.itemsBlock').append('<div class="item" id="itemId' + i +'"></div>');
        $('#itemId' + i).append('<img src="' + data[i].main_photo + '" alt="">');
        $('#itemId' + i).append('<h2>' + data[i].item_name + '</h2>');
        $('#itemId' + i).append('<h3>Цена: ' + data[i].price + '</h3>');
      }
      $('.item').on('click', function () {
        var $itemId = this.id;
        $itemId = $itemId.slice(6);
        $('.center').append('<div class="itemShow"></div>');
        $('.itemShow').append('<h2>' + $items[$itemId].item_name + '</h2>');
        $('.itemShow').append('<div class="infoBox"></div>');
        $('.infoBox').append('<div class="imgBox"></div>');
        $('.imgBox').append('<div class="images"></div>');
        $('.imgBox').append('<div class="imgShow"></div>');
        $('.imgShow').append('<img src="' + $items[$itemId].main_photo + '" alt="">');
        $('.infoBox').append('<div class="decribtionBox"></div>');
        var $str = $items[$itemId].describtion.replace(/\n/g, '<br>');
        $('.decribtionBox').append('<p>' + $str + '</p>');
        $('.itemShow').append('<h2>Цена: ' + $items[$itemId].price + ' руб.</h2>');
        $('.itemShow').append('<div class="btnBox"></div>');
        $('.btnBox').append('<div id="btnBuy" class="btnItem"></div>');
        $('#btnBuy').append('<p>В корзину</p>');
        $('.btnBox').append('<div id="btnReturn" class="btnItem"></div>');
        $('#btnReturn').append('<p>Вернуться к покупкам</p>');
        $('.btnItem').on('click', function () {
          if (this.id == 'btnBuy') {
            console.log('положить в корзину');
            $('.itemShow').remove();
          } else {
            $('.itemShow').remove();
          }
        });
        console.log($itemId);
      });
  }
  });

});
