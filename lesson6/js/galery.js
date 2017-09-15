$(document).ready(function () {

  function refreshGalery() {
    var $Str1 = 'directory=img/galery/';
    $.ajax({
    type: 'POST',
    url: 'read_files.php',
    dataType: 'json',
    data: $Str1,
    response: 'text',
    errrep: true,
    error: function (num) {
      console.log(num);
    },
    success: function (data){
      for (var i = 0; i < data.length; i++) {
           $('.images1').append('<img src="img/galery/' + data[i] + '" alt="" id="' + data[i] + '" class="imgGalMin">');
      }
    }
    });
  }
  refreshGalery();
  $('.addImage').on('click', function () {
    console.log('Ok');
      $('.center').append('<div class="addForm"></div>');
      $('.addForm').append('<h2>Выберите фото для загрузки</h2>');
      $('.addForm').append('<form class="addImgForm" action="add_img.php" method="post"></form>');
      $('.addImgForm').append('<input type="file" name="addFile" value="">');
      $('.addImgForm').append('<input type="submit" name="" value="Загрузить">');


  });
});
