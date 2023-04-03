<?php
    $code = $_SERVER['REDIRECT_STATUS'];
    $codes = array(
        403 => 'Forbidden',
        404 => 'Không tìm thấy trang này',
        500 => 'Internal Server Error'
    );
    $source_url = 'http'.((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>


<!doctype html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
        .page_404 {
            padding: 40px 0;
            /* background: #f5c1ca; */
        }
        .page_404 img {
            width: 100%;
        }
        .four_zero_four_bg {
            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
        }
        .four_zero_four_bg h1 {
            font-size: 80px;
            color: #f18497;
        }

        .four_zero_four_bg h3 {

            font-size: 80px;

        }
        .contant_box_404 {

            margin-top: -50px;

        }

        .btn-primary {
            background: #f18497;
            border-color: #f18497;
        }
    </style>

</head>

<body>

    <section class="page_404">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col col-md-8">

                    <div class="text-center">
                        <?php 
                            if (array_key_exists($code, $codes) && is_numeric($code)) {
                                echo '<title>'.$codes[$code].'</title>';
                                // die("Error $code: {$codes[$code]}");
                        ?>

                        <div class="four_zero_four_bg"><h1 class="text-center "><?= $code ?></h1></div>

                        <div class="contant_box_404">
                            <div class="h2"><?= $codes[$code] ?></div>

                            <p>Hãy kiểm tra lại truy vấn của bạn.</p>

                            <a href="/" class="btn btn-primary">Trang chủ VN98 (<span id="chuyen_huong">5</span>)</a>
                            
                            <meta http-equiv="refresh" content="5;url=/"> 

                        </div>

                        <?php
                            
                            } else {
                                die('Unknown error');
                            }
                        ?>


                    </div>

                </div>

            </div>

        </div>                      

    </section>

    <script>
        sec = 5
        time = document.getElementById('chuyen_huong')
        setInterval(() => {
            sec = sec - 1
            time.innerText = sec
        }, 1000);
    </script>

</body>

</html>