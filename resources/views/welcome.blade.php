<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Hello Vue</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
</head>
<body>
  <div id="app"></div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
