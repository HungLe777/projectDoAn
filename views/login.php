<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/public/css/style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    .toast {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        z-index: 9999;
    }

    .toast.show {
        opacity: 1;
    }
    </style>
</head>

<body>
    <div id="toast-message" class="toast"></div>
    <div class=" container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="../actions/register.php">
                <h1 style=' margin-bottom: 40px;'>Tạo tài khoản mới</h1>
                <input type="text" name="username" placeholder="Họ Và Tên" />
                <input type="text" name="accountname" placeholder="Tài Khoản" />
                <input type="password" name="password" placeholder="Mật Khẩu" />
                <input type="password" name="passwordconfirm" placeholder="Nhập lại mật khẩu" />


                <button>Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1 style=' margin-bottom: 50px;'>Đăng nhập</h1>

                <input type="email" placeholder="Tài Khoản" />
                <input type="password" placeholder="Mật Khẩu" />
                <a href="../views/index.php" style='  font-weight: bold;'>Quay về trang chủ</a>

                <button>Đăng nhập</button>

            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 style="font-size: 30px; margin-bottom: 20px;"> Nếu đã có tài khoản thì đăng nhập tại đây</h1>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào Bạn!!</h1>

                    <p>Nếu bạn chưa có tài khoản đăng ký ngay tại đây</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>


</body>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', function(e) {
        // Lấy giá trị của các trường input
        const username = document.querySelector('input[name="username"]').value;
        const accountname = document.querySelector('input[name="accountname"]').value;
        const password = document.querySelector('input[name="password"]').value;
        const confirmPassword = document.querySelector('input[name="passwordconfirm"]').value;

        // Kiểm tra các biến có rỗng hay không
        if (!username || !accountname || !password || !confirmPassword) {
            e.preventDefault(); // Ngăn chặn gửi biểu mẫu

            // Hiển thị thông báo toast
            const toastMessage = document.getElementById('toast-message');
            toastMessage.textContent = 'Hãy nhập đầy đủ thông tin!';
            toastMessage.classList.add('show');

            // Tạm dừng 3 giây và ẩn thông báo toast
            setTimeout(function() {
                toastMessage.classList.remove('show');
            }, 3000);
        } else if (password.length > 16) {
            e.preventDefault(); // Ngăn chặn gửi biểu mẫu

            // Hiển thị thông báo toast
            const toastMessage = document.getElementById('toast-message');
            toastMessage.textContent = 'Mật khẩu tối đa 16 ký tự';
            toastMessage.classList.add('show');

            // Tạm dừng 3 giây và ẩn thông báo toast
            setTimeout(function() {
                toastMessage.classList.remove('show');
            }, 3000);
        } else if (password !== confirmPassword) {
            e.preventDefault(); // Ngăn chặn gửi biểu mẫu

            // Hiển thị thông báo toast
            const toastMessage = document.getElementById('toast-message');
            toastMessage.textContent = 'Mật khẩu và xác nhận mật khẩu không khớp!';
            toastMessage.classList.add('show');

            // Tạm dừng 3 giây và ẩn thông báo toast
            setTimeout(function() {
                toastMessage.classList.remove('show');
            }, 3000);
        }
    });
});
</script>
<script src="../src/public/js/js_login.js"></script>

</html>