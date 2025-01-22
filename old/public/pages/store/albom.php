<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Альбом
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/productCard.css">
</head>
<body>
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">
                    Пример альбома
                </h1>
                <p class="lead text-muted">
                    Что-то краткое и ведущее о коллекции ниже - ее содержание, создатель и т.д. Сделайте ее короткой и
                    интересной, но не слишком короткой, чтобы люди просто не пропустили ее полностью.
                </p>
                <p>
                    <a href="#" class="btn btn-primary my-2">
                        Главный призыв к действию
                    </a>
                    <a href="#" class="btn btn-secondary my-2">
                        Вторичное действие
                    </a>
                </p>
            </div>
        </div>
    </section>

    <div class="container">

        <?php

        try {
            $connection = new mysqli("db", "root", "root");
            $connection->select_db("db");

            $users = $connection->query("SELECT * FROM `Users`");

            if ($users->num_rows > 0) {
                foreach ($users as $user) {
                    echo $user['Id'];
                }
            } else {
                echo False;
            }
        } catch (Exception $e) {
            echo "Не удалось подключиться к базе данных: " . $e->getMessage() . '.';
        }

        ?>

        <div class="row g-3">
            <div class="col">
                <div class="product-card">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="card">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Заголовок карточки</h5>
                                    <p class="card-text">Небольшой пример текста, который должен основываться на
                                        названии карточки и составлять основную часть содержимого карты.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-back">
                            <div class="card" style="width: 18rem;">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Заголовок карточки</h5>
                                    <p class="card-text">Небольшой пример текста, который должен основываться на
                                        названии карточки и составлять основную часть содержимого карты.</p>
                                    <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="card">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Заголовок карточки</h5>
                                    <p class="card-text">Небольшой пример текста, который должен основываться на
                                        названии карточки и составлять основную часть содержимого карты.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-back">
                            <div class="card" style="width: 18rem;">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Заголовок карточки</h5>
                                    <p class="card-text">Небольшой пример текста, который должен основываться на
                                        названии карточки и составлять основную часть содержимого карты.</p>
                                    <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="card">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Заголовок карточки</h5>
                                    <p class="card-text">Небольшой пример текста, который должен основываться на
                                        названии карточки и составлять основную часть содержимого карты.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-back">
                            <div class="card" style="width: 18rem;">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Заголовок карточки</h5>
                                    <p class="card-text">Небольшой пример текста, который должен основываться на
                                        названии карточки и составлять основную часть содержимого карты.</p>
                                    <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="product-card">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="card">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Заголовок карточки</h5>
                                    <p class="card-text">Небольшой пример текста, который должен основываться на
                                        названии карточки и составлять основную часть содержимого карты.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-back">
                            <div class="card" style="width: 18rem;">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз"
                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title">Заголовок карточки</h5>
                                    <p class="card-text">Небольшой пример текста, который должен основываться на
                                        названии карточки и составлять основную часть содержимого карты.</p>
                                    <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>