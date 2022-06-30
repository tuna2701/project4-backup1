<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Register</title>
    <link href="/assets/local/css/register.css" rel="stylesheet" />
</head>
<body ng-app="LoginApp" ng-controller="LoginController">
    <div>
        <div class="register-container">
            <form action="" method="post" class="register-form" name="registerForm" id="form-1">
                <h3 class="heading">Đăng ký thành viên</h3>
                <p class="desc mb-16 pt-16"></p>

                <div class="form-group">
                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                    <input id="fullname" name="fullname" type="text" placeholder="VD: Nguyễn Anh Tuấn" class="form-control">
                    <!-- <span class="form-message"></span> -->
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" ng-model="New_user.email" placeholder="VD: email@gmail.com" class="form-control">
                    <!-- <span class="form-message" ng-show="registerForm.email.$invalid && registerForm.email.$dirty">Email invalid or empty</span> -->
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" name="password" type="password" ng-model="New_user.pass" placeholder="Nhập mật khẩu" class="form-control" required minlength="6">
                    <!-- <span class="form-message" ng-show="registerForm.password.$invalid && registerForm.password.$dirty">Password must be at least 6 characters</span> -->
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
                    <!-- <span class="form-message"></span> -->
                </div>

                <button class="form-submit" ng-click="Register()">Đăng ký</button>

                <p class="register-question mt-4">Bạn đã có tài khoản? <a href="/login">Đăng nhập</a></p>
            </form>
        </div>
    </div>
</body>
</html>