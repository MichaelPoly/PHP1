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
    } else if (this.id == 'registration') {
            $('.itemsBlock').append('<div class="registration"></div>');
            $('.regBtn').hide();
            $('.registration').append('<h3 class="formTitle">Заполните форму регистрации</h3>');
            $('.registration').append('<div class="names"></div>');
            $('.names').append('<div id="firstName" class="namesN"></div>');
            $('#firstName').append('<label>Имя *<input type="text" name="firstName" required autofocus class="loginIn" id="firstNameIn"></label>');
            $('.names').append('<div id="secondName" class="namesN"></div>');
            $('#secondName').append('<label>Фамилия<input type="text" name="secondName" class="loginIn" id="secondNameIn"></label>');
            $('.names').append('<div id="lastName"class="namesN"></div>');
            $('#lastName').append('<label>Отчество<input type="text" name="lastName" class="loginIn" id="lastNameIn"></label>');
            $('.registration').append('<div id="contactsIn" class="names"></div>');
            $('#contactsIn').append('<div id="mail" class="namesN"></div>');
            $('#mail').append('<label>Email *<input type="email" name="email" required class="loginIn" id="emailIn"></label>');
            $('#contactsIn').append('<div id="phone" class="namesN"></div>');
            $('#phone').append('<label>Телефон<input type="phone" name="phone" class="loginIn" id="phoneIn"></label>');
            $('.registration').append('<div class="check"></div>');
            $('.check').append('<label>Использовать Email как логин <input type="checkbox" name="loginMail" class="checkIn" id="loginMail"></label>');
            $('.registration').append('<div class="loginBox"></div>');
            $('.loginBox').append('<label>Логин *<br><input type="text" name="login" class="loginIn" id="login" required></label>');
            $('.loginBox').append('<div class="pwdBox"></div>');
            $('.pwdBox').append('<label>Пароль *<br><input type="password" name="password" required class="loginIn" id="pwdIn"></label>');
            $('.pwdBox').append('<label>Введите пароль еще раз *<br><input type="password" name="password" required class="loginIn" id="pwdConfirm"></label>');
            $('#loginMail').on('change', function () {
              if (document.querySelector('#loginMail').checked == true) {
                document.querySelector('#login').value = document.querySelector('#emailIn').value;
              } else {
                document.querySelector('#login').value = '';
              }
            });
            $('.registration').append('<div class="toolTip2">Заполните обязательные поля *</div>');
            $('#firstName').append('<div class="toolTip">Имя должно содержать только буквы</div>');
            $('#mail').append('<div class="toolTip1">Введите корректный E-mail</div>');
            $('.toolTip').hide();
            $('.toolTip1').hide();
            $('.toolTip2').hide();
            $('.registration').append('<input type="submit" class="btn">');
            var $nameOk = false;
            var $mailOk = false;
            var $firstNameIn = document.querySelector('#firstNameIn').value;
            var $secondNameIn = document.querySelector('#secondNameIn').value;
            var $lastNameIn = document.querySelector('#lastNameIn').value;
            var $emailIn = document.querySelector('#emailIn').value;
            var $phoneIn = document.querySelector('#phoneIn').value;
            var $login = document.querySelector('#login').value;
            var $pwd = document.querySelector('#pwdIn').value;
            var $pwdCheck = document.querySelector('#pwdConfirm').value;
            var $regExpName = /[a-zA-Zа-яА-я]/i;
            var $regExpMail = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/i;
            $('#firstNameIn').on('input', function () {
              $firstNameIn = document.querySelector('#firstNameIn').value;
              if ($regExpName.test($firstNameIn) == false) {
                $('.toolTip').show();
              } else {
                $('.toolTip').hide();
                $nameOk = true;
              }
            });
            $('#emailIn').on('input', function () {
              $emailIn = document.querySelector('#emailIn').value;
              if ($regExpMail.test($emailIn) == false) {
                $('.toolTip1').show();
              } else {
                $('.toolTip1').hide();
                $mailOk = true;
              }
            });
            $('.btn').on('click', function () {
              $firstNameIn = document.querySelector('#firstNameIn').value;
              $secondNameIn = document.querySelector('#secondNameIn').value;
              $lastNameIn = document.querySelector('#lastNameIn').value;
              $emailIn = document.querySelector('#emailIn').value;
              $phoneIn = document.querySelector('#phoneIn').value;
              $login = document.querySelector('#login').value;
              $pwd = document.querySelector('#pwdIn').value;
              $pwdCheck = document.querySelector('#pwdConfirm').value;
              if ($firstNameIn == '' || $emailIn == '' || $login == '' || $pwd == '' || $pwdCheck == '') {
                $('.toolTip2').show();
              } else if ($nameOk == true && $mailOk == true){
                $('.toolTip2').hide();
                if ($pwd == $pwdCheck) {
                  var $regStr = 'first_name=' + $firstNameIn + '&' + 'second_name=' + $secondNameIn +
                  '&' + 'last_name=' + $lastNameIn + '&' + 'email=' + $emailIn + '&' +
                  'phone=' + $phoneIn + '&' + 'login=' + $login + '&' + 'password=' + $pwd;
                  $.ajax({
                    type: 'POST',
                    url: 'registration.php',
                    dataType: 'json',
                    data: $regStr,
                    response: 'text',
                    errrep: true,
                    error: function (num) {
                      console.log(num);
                    },
                    success: function (data) {
                        $user = data;
                        if ($user != false) {
                          $('.registry').append('<p> Здравствуйте ' + data.first_name + '</p>');
                          $('.registration').remove();
                        } else {
                          document.querySelector('#login').placeholder = 'Логин уже занят';
                        }
                    }
                 });
                } else {
                  document.querySelector('#pwdConfirm').value = '';
                  document.querySelector('#pwdConfirm').placeholder = 'Не верный пароль';
                }
              }
            });
          } else return false;
    // });
  });
});
