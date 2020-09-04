$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/frontend/modules/menu/index.php",
        // dataType: 'json',
        success: function (res) {
            $('#subMenuMoskovskayaOblast').html(res.moskovskayaOblast);
            $('#subMenuMoskva').html(res.moskva);
            console.log('res', res);
            // if (json.result == '1') {
            //     console.log($proc);
            //     $proc.find('p').html('Спасибо за Ваш отзыв!');
            //     $(button).fadeOut(100);
            // }
        },
        error: function (jqxhr, textStatus, error) {
            // $(this).parents('.modal-content').html("Ошибка: " + textStatus + ", " + error + ' ' + ' Данные: ' + jqxhr.responseText);
            console.log("Ошибка: " + textStatus + ", " + error + ' ' + ' Данные: ' + jqxhr.responseText);
        }
    });
});
