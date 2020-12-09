<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="send-email" method="post"> -->
     <!-- <form action="contact" method="post"> --> <!-- Метод 2 -->
     
     
     
        <form action="{{ route('contact') }}" method="post">

       {{-- {{csrf_field()}} --}}
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <button type="submit">Submit</button>
    </form>

    {{-- <form action="{{ route('contact') }}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <button type="submit">Submit</button>
    </form> --}}
       {{-- Появится скрытое поле с методом указанноам в скобках --}}
        {{-- {{ method_field('PUT') }}  --}}       <!-- Первый вариант -->
    {{-- Если передать теперь эту форму, то появится ошибка, так как метод put не поддерживатеся. Так как мы указали это в route:match в web --}}
</body>
</html>
{{-- // теперь при смене названия страницы '/contact2' на любую другую страница все равно будет называться '/contact' и если используется много вьюшек, то менять в верстке название страницы не придется --}}