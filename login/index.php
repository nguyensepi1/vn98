<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TEAM VN98 - Trang đăng nhập</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="TEAM VN98, Nhóm Dịch VN98, Dịch truyện Hệ Thống">
    <meta name="description" content="TEAM VN98 chuyên dịch thể loại truyện Hệ Thống, Tu Chân, Xuyên Không, Dị Năng, Đô Thị. Các truyện của team: Khi Bác Sĩ Mở Hack (Dịch), Ta Xây Gia Viên Trên Lưng Huyền Vũ (Dịch, Lãnh Chúa Toàn Dân: Binh Chủng Của Ta Biến Dị (Dịch), Lãnh Chúa Toàn Dân: Bắt Đầu Xây Dựng Tiên Vực Bất Hủ (Dịch), Cẩu Đạo: Lập Gia Tộc Ở Yêu Ma Giới (Dịch)">
    <meta name="author" content="VN98">
    <link rel="shortcut icon" href="./img/icon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="post">
                <h1>Đăng ký tài khoản</h1>
                <input type="text" id="fname" placeholder="Nhập tên trên Facebook" required/>
                <input type="email" id="email" placeholder="Nhập email" required/>
                <input type="password" id="pass1" placeholder="Nhập mật khẩu" required/>
                <input type="password" id="pass2" placeholder="Nhập lại mật khẩu" onchange="checkpass(this)" onkeypress="checkpass(this)" required/>
                <div class="status" id="pass_status"></div>
                <button onclick="register()">Đăng ký</button>
            </form>
        </div>
        <div class="form-container log-in-container">
            <form action="login.php" method="post">
                <h1>Đăng nhập</h1>
                <font style="color: red; font-size: 14px"><?= $_SESSION["cho_duyet"] ?></font>
                <input type="email" id="email_dn" name="email_dn" placeholder="Nhập email" required/>
                <input type="password" id="password_dn" name="password_dn" placeholder="Nhập mật khẩu" required/>
                <div class="g-recaptcha" data-sitekey="6Lf03gUjAAAAAGQdpru7lh7OmlUhhh4KSfqEcha2" required></div>
                <a href="#">Quên mật khẩu?</a>
                <button>Đăng nhập</button>
            </form>
            <div class="status" id="status"></div>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Bạn đã có tài khoản rồi?</p>
                    <button class="ghost" id="logIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, There!</h1>
                    <p>Bạn chưa có tài khoản?</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function register() {
            let formData = new FormData()
            formData.append("name", fname.value)
            formData.append("email", email.value)
            formData.append("pass1", pass1.value)
            formData.append("pass2", pass2.value)
            const response = await fetch('register.php', {
                method: "POST", 
                body: formData
            }); 
            const data = await response.text()
            if ( data === 'Đăng ký thành công') {
                container.classList.remove("right-panel-active")
            }
        }

    // ----------------------------------------------------------------------

    
    function checkpass(pass_2) {
        pass_1 = document.getElementById('pass1')
        
        if (pass2.value !== pass_1.value) {
            document.getElementById('pass_status').innerText = 'Vui lòng nhập 2 mật khẩu giống nhau'
        } else {
            document.getElementById('pass_status').innerText = ''
        }
    }
    </script>
    <script src="app.js"></script>
</body>

</html>