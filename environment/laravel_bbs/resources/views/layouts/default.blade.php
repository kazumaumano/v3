<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    
     <style>
        .header_nav {
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        .header_nav li {
            margin-right: 30px;
        }
    </style>
</head>
<body>
   @yield('header')
    @yield('content')
</body>
</html>

<!--共通部分はデフォルトのhtmlにまとめてそのほかはextendsやsectiontとか使って少ない量で書いていく　どんどん継承して-->