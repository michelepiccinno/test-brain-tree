<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.42.0/js/dropin.min.js"></script>
    <title>Titolo</title>
</head>

<body>

    <header>
        <nav class="container header-box">
            <ul class="ps-0 mb-0">
                <li>Donna</li>
                <li>Uomo</li>
                <li>Bambino</li>
            </ul>
            <span class="logo">LOGO</span>
            <div class="head-symbol">
                <i class="fa-regular fa-user"></i>
                <i class="fa-regular fa-heart"></i>
                <i class="fa-solid fa-lock"></i>
            </div>
        </nav>
    </header>

    @yield('content')

</body>

<style>
    body {
        font-family: cursive, Arial, Helvetica, sans-serif;
    }

    header {
        background-color: #ff6900;
        box-shadow: 0 4px 8px 0;
        position: fixed;
        /*FISSO LA NAV*/
        width: 100%;
        z-index: 100;
        /*LA SPOSTO SU LEVEL 1*/
    }

    .container {
        /*  max-width: 980px; */
        margin: 0 auto;
        padding: 0 20px;
    }

    main .container {
        padding-top: 5rem;
    }
    .header-box {
        display: flex;
        align-items: center;
        color: white;
    }

    .header-box ul {
        display: flex;
        flex: 1;
        list-style: none;
    }

    .header-box ul li {
        padding-right: 0.7rem;
    }

    .header-box .logo {
        height: 40px;
        padding: 10px;
        flex: 1rem;
    }
    .header-box .head-symbol>i {
        padding-left: 5px;
    }
  
</style>


</html>
