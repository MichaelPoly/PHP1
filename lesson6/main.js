$(document).ready(function () {

$('#sum').on('click', function () {
  var $a = document.querySelector('#first_num').value;
  var $b = document.querySelector('#second_num').value;
  var $Str = 'first_num=' + $a + '&' + 'second_num=' + $b + '&' + 'operator=sum';
      $.ajax({
      type: 'POST',
      url: 'calc.php',
      dataType: 'json',
      data: $Str,
      response: 'text',
      errrep: true,
      error: function (num) {
        console.log(num);
      },
      success: function (data) {
          document.querySelector('#result').value = data;
      }
    });
});
$('#sub').on('click', function () {
  var $a = document.querySelector('#first_num').value;
  var $b = document.querySelector('#second_num').value;
  var $Str = 'first_num=' + $a + '&' + 'second_num=' + $b + '&' + 'operator=sub';
      $.ajax({
      type: 'POST',
      url: 'calc.php',
      dataType: 'json',
      data: $Str,
      response: 'text',
      errrep: true,
      error: function (num) {
        console.log(num);
      },
      success: function (data) {
          document.querySelector('#result').value = data;
      }
    });
});
$('#mul').on('click', function () {
  var $a = document.querySelector('#first_num').value;
  var $b = document.querySelector('#second_num').value;
  var $Str = 'first_num=' + $a + '&' + 'second_num=' + $b + '&' + 'operator=mul';
      $.ajax({
      type: 'POST',
      url: 'calc.php',
      dataType: 'json',
      data: $Str,
      response: 'text',
      errrep: true,
      error: function (num) {
        console.log(num);
      },
      success: function (data) {
          document.querySelector('#result').value = data;
      }
    });
});
$('#dev').on('click', function () {
  var $a = document.querySelector('#first_num').value;
  var $b = document.querySelector('#second_num').value;
  var $Str = 'first_num=' + $a + '&' + 'second_num=' + $b + '&' + 'operator=dev';
      $.ajax({
      type: 'POST',
      url: 'calc.php',
      dataType: 'json',
      data: $Str,
      response: 'text',
      errrep: true,
      error: function (num) {
        console.log(num);
      },
      success: function (data) {
          document.querySelector('#result').value = data;
      }
    });
});

$('#catalog').on('click', function () {
      location = 'catalog.html';
});

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
