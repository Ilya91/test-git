<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Name: <input name="name"><br>
Email: <input name="email"><br>
Message: <textarea name="text"></textarea><br>
<button type="submit" id="button">Send</button>
<script src="https://yastatic.net/jquery/3.1.0/jquery.js"></script>
<script>
    $(document).ready(function () {
       $('#button').on('click', function () {
           $.ajax({
               url: 'mail.php',
               method:"POST",
               dataType:"text",
               data: {
                   name : $('input[name=name]').val(),
                   email: $('input[name=email]').val(),
                   text: $('textarea[name=text]').val()
               },
               success: function () {
                   console.log('good');
               }
           });
       }) ;
    });
</script>

</body>
</html>
