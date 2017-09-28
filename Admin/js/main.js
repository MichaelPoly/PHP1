$(document).ready(function () {
var $admin;
  $('.enterBtn').on('click', function () {
    var $log = document.querySelector('#login').value;
    var $pwd = document.querySelector('#password').value;
    var $str = 'login=' + $log + '&' + 'password=' + $pwd;
    $.ajax({
      type: 'POST',
      url: 'php/amin_login.php',
      dataType: 'json',
      data: $str,
      response: 'text',
      errrep: true,
      error: function (num) {
        console.log(num);
      },
      success: function (data) {
          $admin = data;
          $('.authorisation').remove();
//----------------------------------------------------------------------------
console.log($log);
console.log($pwd);
    $('.mainWindow').append('<div class="leftBar"></div>');
    $('.leftBar').append('<div class="leftBarBtn" id="statistics"></div>');
    $('#statistics').append('<p>Статистика</p>');
    $('.leftBar').append('<div class="leftBarBtn" id="products"></div>');
    $('#products').append('<p>Управление товарами</p>');
    $('.leftBar').append('<div class="leftBarBtn" id="actions"></div>');
    $('#actions').append('<p>Управление акциями</p>');
    $('.leftBar').append('<div class="leftBarBtn" id="orders"></div>');
    $('#orders').append('<p>Управление заказами</p>');
    $('.leftBar').append('<div class="leftBarBtn" id="categories"></div>');
    $('#categories').append('<p>Управление категориями</p>');
    $('.mainWindow').append('<div class="infoBlock"></div>');
    $('.leftBarBtn').on('click', function () {
      var $btnId = this.id;
      console.log($btnId);
      if ($btnId == 'categories') {
        //--Управление категориями-------------------------------------------------------------
        $('.infoBlock').remove();
        $('.mainWindow').append('<div class="infoBlock"></div>');
        $('.infoBlock').append('<h1>Управление категориями</h1>');
        var $Str = 'login=' + $log + '&' + 'password=' + $pwd + '&' + 'table_name=categories';
        $.ajax({
          type: 'POST',
          url: 'php/get_categories.php',
          dataType: 'json',
          data: $Str,
          response: 'text',
          errrep: true,
          error: function (num) {
            console.log(num);
          },
          success: function (data){
            if (data == false) {
              $('.infoBlock').append('<h2 class="noTable">У вас пока нет категорий</h2>');
              $('.infoBlock').append('<div class="category"></div>');
              $('.category').append('<label>Введите название категории товаров<br><input type="text" name="categoryIn" id="categoryIn" autofocus required></label>');
              $('.category').append('<div class="enterBtn" id="addCategory"></div>');
              $('#addCategory').append('<p>Добавить категорию</p>');
            }

          }
        });
        //-------------------------------------------------------------------------------------
      } else if ($btnId == 'orders') {
        //--Управление заказами----------------------------------------------------------------
        $('.infoBlock').remove();
        $('.mainWindow').append('<div class="infoBlock"></div>');
        //-------------------------------------------------------------------------------------
      } else if ($btnId == 'actions') {
        //--Управление акциями-----------------------------------------------------------------
        $('.infoBlock').remove();
        $('.mainWindow').append('<div class="infoBlock"></div>');
        //-------------------------------------------------------------------------------------
      } else if ($btnId == 'products') {
        //--Управление товарами----------------------------------------------------------------
        $('.infoBlock').remove();
        $('.mainWindow').append('<div class="infoBlock"></div>');
        //-------------------------------------------------------------------------------------
      } else if ($btnId == 'statistics') {
        //--Статистика-------------------------------------------------------------------------
        $('.infoBlock').remove();
        $('.mainWindow').append('<div class="infoBlock"></div>');
        //-------------------------------------------------------------------------------------
      }
    });






//----------------------------------------------------------------------------
      }
    });
  });
});
