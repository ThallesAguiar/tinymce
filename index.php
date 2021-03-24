<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/5iz1qas7kbokguikpszjkf4jp7mnckd2noiox92kugaxigum/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    // https://www.docow.com/45395/limitar-o-numero-de-caracteres-no-tinymce.html#:~:text=tinyMCE%20n%C3%A3o%20fornece%20nenhuma%20maneira,ou%20sua%20l%C3%B3gica%20para%20isso.
        tinymce.init({
            selector: '#tiny',
            menubar: 'file | tools',
            toolbar: 'undo redo | bold | alignleft aligncenter alignright alignjustify | outdent indent',
            height: 500,
            setup: function(tiny) {
                tiny.on('KeyDown', function(e) {
                    var max = 10;
                    var count = CountCharacters();
                    if (count >= max) {
                        // 8 = backspace/delete   46 = delete
                        if (e.keyCode != 8 && e.keyCode != 46)
                            tinymce.dom.Event.cancel(e);
                        document.getElementById("character_count").innerHTML = "Máximo de caracteres permitido é " + max + "";
                    } else {
                        document.getElementById("character_count").innerHTML = "Contando seus caracteres: " + count;
                    }
                });

                function CountCharacters() {
                    var body = tinymce.get("tiny").getBody();
                    var content = tinymce.trim(body.innerText || body.textContent);
                    return content.length;
                };
            }

        });
    </script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Olá, </h1>
            <p class="lead">Este é um espaço para você escrever a sua redação para ingressar na melhor Universidade de Brusque e Região. </p>
            <hr class="my-4">
            <p>Sua redação após enviada, será analizada por professores, e após analizado, terá o seu resultado.</p>
        </div>

        <form method="post">
            <textarea my-input=”name” id="tiny" name="tiny" placeholder="Escreva a sua redação aqui ..."></textarea>
            <small id="character_count"><!--Mostra a quantidade de caracteres--></small><br>
            <a class="btn btn-danger btn-lg" href="http://localhost/" type="button" role="button">Cancelar</a>
            <a class="btn btn-warning btn-lg" href="#" type="button" role="button">Limpar</a>
            <a class="btn btn-success btn-lg" href="#" type="submit" role="button">Enviar</a>
        </form>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>