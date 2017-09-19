$(document).ready(function () {
var $items;
var $user;
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
        $('#itemId' + i).append('<img src="' + data[i].img_folder + data[i].main_photo + '" alt="">');
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
        $('.imgShow').append('<img src="' + $items[$itemId].img_folder + $items[$itemId].main_photo + '" alt="" class="actImg">');
        $('.infoBox').append('<div class="decribtionBox"></div>');
        var $str = $items[$itemId].describtion.replace(/\n/g, '<br>');
        $('.decribtionBox').append('<p>' + $str + '</p>');
        $('.itemShow').append('<h2>Цена: ' + $items[$itemId].price + ' руб.</h2>');
        $('.itemShow').append('<div class="btnBox"></div>');
        $('.btnBox').append('<div id="btnBuy" class="btnItem"></div>');
        $('#btnBuy').append('<p>В корзину</p>');
        $('.btnBox').append('<div id="btnReturn" class="btnItem"></div>');
        $('#btnReturn').append('<p>Вернуться к покупкам</p>');
        var $Str = 'directory=' + $items[$itemId].img_folder;
        $.ajax({
        type: 'POST',
        url: 'read_files.php',
        dataType: 'json',
        data: $Str,
        response: 'text',
        errrep: true,
        error: function (num) {
          console.log(num);
        },
        success: function (data){
          $('.images').append('<img src="' + $items[$itemId].img_folder + $items[$itemId].main_photo + '" alt="" id="' + $items[$itemId].img_folder + $items[$itemId].main_photo + '" class="imgMin">');
          for (var i = 0; i < data.length; i++) {
            if ($items[$itemId].main_photo != data[i]){
                $('.images').append('<img src="' + $items[$itemId].img_folder + data[i] + '" alt="" id="' + $items[$itemId].img_folder + data[i] + '" class="imgMin">');
            }
          }
          $('.imgMin').on('click', function () {
            $('.actImg').remove();
            $('.imgShow').append('<img src="' + this.id + '" alt="" class="actImg">');
          });
        }
      });
        $('.btnItem').on('click', function () {
          if (this.id == 'btnBuy') {
            console.log('положить в корзину');
            $('.itemShow').remove();
          } else {
            $('.itemShow').remove();
          }
        });
      });
  }
  });
  $('.regBtn').on('click', function () {
    console.log('Ok');
    if (this.id == 'enter') {
  $('.itemsBlock').append('<div class="authorisation"></div>');
  $('.regBtn').hide();
  $('.authorisation').append('<div class="login"></div>');
  $('.login').append('<label>Логин<input type="text" name="login" required autofocus class="loginIn" id="login"></label>');
  $('.login').append('<label>Пароль<input type="password" name="password" required class="loginIn" id="pwd"></label>');
  $('.login').append('<input type="submit" class="btn">');
  $('.btn').on('click', function () {
    var $log = document.querySelector('#login').value;
    var $pwd = document.querySelector('#pwd').value;
    var $logStr = 'login=' + $log + '&' + 'password=' + $pwd;
    $.ajax({
      type: 'POST',
      url: 'login.php',
      dataType: 'json',
      data: $logStr,
      response: 'text',
      errrep: true,
      error: function (num) {
        console.log(num);
      },
      success: function (data) {
          $('.authorisation').remove();
          $user = data;
          if ($user) {
            console.log(data);
            $('.registry').append('<p> Здравствуйте ' + data.first_name + '</p>');
            } else {
            $('.regBtn').show();
            $('.registry').append('<p class="errInfo">Вы ввели неправильный логин или пароль</p>');
          }

      }
     });
    });
    }
  });
});
