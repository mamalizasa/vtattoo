$(document).ready(function(){
    $('#form').submit(function(event){
        event.preventDefault();

        var name = $('#name_input').val();
        var surname = $('#surname_input').val();
        var email = $('#email_input').val();
        var phone = $('#tel_input').val();
        var theme = $('#t_select').val();
        var size = $('#s_select').val();
        var date = formatDate($('#date_input').val()); // Обработка даты
        var msg = $('#textarea').val();

        // Проверка на заполненность полей
        if(name == '' || surname == '' || email == '' || phone == '' || theme == '' || size == '' || date == '' || msg == ''){
            window.scrollTo(10000, 10000);
            $('#message').html('Пожалуйста, заполните все поля');
            return;
        }


        // AJAX запрос
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response){
                // Показать сообщение об успешной отправке
                window.scrollTo(0, 0);
                $('#message_success').html('Ваша запись будет рассмотрена в ближайшее время. Ожидайте письмо на электронную почту');
                $("#form")[0].reset();

            },
            error: function(xhr, status, error){
                // Показать сообщение об ошибке
                $('#message').html('Произошла ошибка: ' + error);
            }
        });
    });
});


function formatDate(dateString) {
    var dateObject = new Date(dateString);
    var day = dateObject.getDate();
    var month = dateObject.getMonth() + 1; // Месяцы в JavaScript начинаются с 0
    var year = dateObject.getFullYear();

    // Форматирование даты в формат "d.m.Y"
    var formattedDate = (day < 10 ? '0' : '') + day + '.' + (month < 10 ? '0' : '') + month + '.' + year;
    return formattedDate;
}
