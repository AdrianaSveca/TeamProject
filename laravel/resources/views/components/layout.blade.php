<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <x-nav-link href="/">Home</x-nav-link>
        <x-nav-link href="/shop">Shop</x-nav-link>
        <x-nav-link href="/quiz">Quiz</x-nav-link>
        <x-nav-link href="/JoinUs">Join Us</x-nav-link>
    </nav>

    {{$slot}}

    

<footer>
    <p>Footer content here</p>  
</footer>



</body>
</html>
