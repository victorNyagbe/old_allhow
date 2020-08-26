<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('mdb/css/mdb.lite.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/fontawesome.css') }}">
</head>
<body>
    <p class="text-justify">
        Cher(e) {{ $data['seller_name'] }}, nous avons le regret de vous annoncer que votre document portant sur le
        sujet <strong>{{ $data['nom_document'] }} a été rejeté après étude.</strong>
    </p>
    <p class="mt-5 text-center ">L'équipe All-how</p>
</body>
</html>