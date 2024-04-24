<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" defer></script>
    <title>Titolo</title>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="row g-5">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card text-center">
                            <img class="card-img" src="{{ $product->img }}" alt="">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>{{ $product->name }}</h4>
                                </div>
                                <div class="card-text">
                                    <h4>{{ $product->description }}</h4>
                                </div>
                                <span>PREZZO {{ $product->price }}</span>
                            </div>
                            <a class="bg-info p-2" href="">ACQUISTA</a>                  
                        </div>
                    </div>
                @endforeach
                <div class="col">

                </div>
            </div>
        </div>

        <script src="js/main.js"></script>
    </div>
</body>

</html>

<style>
    .card-img {
        width: 300px;
    }
</style>
