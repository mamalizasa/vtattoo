
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="assets/icons/ico.svg" type="image/x-icon">
    <title>Запись на сеанс</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>body {background-color: black;}</style>
    
    
</head>

<form class="form" id="form" method="POST" >
                <label for="name_input">Ваше имя*</label>
                <input id="name_input" class="inputsu _req" type="text" name="name" data-valid="required" placeholder="Имя"><span></span>
            
                <label for="surname_input">Ваша фамилия*</label>
                <input id="surname_input" class="inputsu _req" type="text" name="surname" data-valid="required" placeholder="Фамилия"><span></span>
               
                <label for="email_input">Ваша почта*</label>
                <input id="email_input" class="inputsu _req _email" type="email" name="email" data-valid="required" placeholder="Email"><span></span>
            
                <label for="tel">Ваш номер телефона*</label>
                <input id="tel" class="inputsu _req" type="tel" name="tel" data-phone data-valid="required" placeholder="Телефон"><span></span>
             
                <label for="t-select">Какую татуировку вы хотите?</label>
                <select name="theme" data-valid="required" id="t-select"><span></span>
                    <option value="Не выбрано">Тема</option>
                    <option value="Надписи">Надписи</option>
                    <option value="Животные">Животные</option>
                    <option value="Нежность">Нежность</option>
                    <option value="Люди">Люди</option>
                    <option value="Цветы">Цветы</option>
                    <option value="Рукав">Рукав</option>
                    <option value="Мифология">Мифология</option>
                    <option value="Демоны">Демоны</option>
                    <option value="Другое">Другое</option>
                </select>

                <label for="s-select">Какого размера татуировку вы хотите?</label>
                <select name="size" data-valid="required" id="s-select"><span></span>
                    <option value="Не выбрано">Размер</option>
                    <option value="Маленькая">Маленькая</option>
                    <option value="Средняя">Средняя</option>
                    <option value="Большая">Большая</option>
                </select>

                <label for="date">На какую дату вам удобно записаться?*</label>
                <input id="date" class="inputsu _req" data-valid="required" type="date" name="date" placeholder="Дата"><span></span>
            

                <label>Посмотрите в <a class="oneword" href="calendar.php">графике</a> свободное время</label>

                <label for="textarea">Напишите особенные пожелания, важную информацию или свой вопрос.</label>
                <textarea id="textarea" class="textarea" name="textarea">Здравствуйте,</textarea>
              
                <button type="submit" id="zapis" class="knopa">Записаться</button>
                
              </form>

<!-- <form id="userData" class="form" method="post" action="">
          <h3 class="form__title">Получить консультацию</h3>
          <div class="form__fields">
            <input name="name" class="form__input" type="text" placeholder="Ваше имя" data-valid="required"><span></span>
            <input name="phone" class="form__input form__input--split" type="tel" placeholder="Ваше номер" data-valid="required" data-phone ><span></span>
            <input name="email" id="email" class="form__input form__input--split" type="email" placeholder="Ваш e-mail" data-valid="required" data-email><span></span>
              <textarea name="message" class="form__input" placeholder="Ваше сообщение" rows="15"></textarea>
          </div>
            <input class="button button__form" type="submit" value="отправить">
        </form> -->
        
        <script>
            $(document).ready(function(){
                $('#form').submit(function(){
                    let errors = false;
                    $(this).find('span').empty();

                    $(this).find('input, textarea').each(function(){
                        if(  $.trim( $(this).val() ) == ''){
                            errors = true;
                            $(this).next().text('Не заполнено поле ');
                        }
                    });

                    if(!errors){
                        let data = $('#userData').serialize();
                        $.ajax({
                            url: 'index.php',
                            type: 'POST',
                            data: data,
                            success: function(res){
                                if (data['error']) { 
                            alert(data['error']); 
                        } else { 
                            console.log('Письмo oтврaвлeнo!');
                        }
                            },
                            error: function(){
                                alert('Ошибка');
                            }
                        });
                    }

                    return false;
                });
            });
        </script>

</html>