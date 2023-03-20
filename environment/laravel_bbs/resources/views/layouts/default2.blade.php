<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    
    
    @foreach($errors->all() as $error)
    <p class ="error">{{$error}}</p>
    @endforeach
 
    @yield('content')
</body>
</html>

<!--共通部分はデフォルトのhtmlにまとめてそのほかはextendsやsectiontとか使って少ない量で書いていく　どんどん継承して-->