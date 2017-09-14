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

$('#calculator').on('click', function () {
      location = 'index.html';
});
$('#catalog').on('click', function () {
      location = 'catalog.html';
});
$('#galery').on('click', function () {
      location = 'galery.html';
});
$('#feedBack').on('click', function () {
      location = 'feedBack.html';
});

});
