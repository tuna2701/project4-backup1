
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Login</title>
    <link href="/assets/local/css/register.css" rel="stylesheet" />
</head>
<body ng-app="LoginApp">
    <div class="login-container" ng-controller="LoginController">
        <form action="" method="post" class="login-form" name="loginForm" id="form-1">
            <h3 class="heading">Lấy lại mật khẩu</h3>
            <p class="desc mb-16 pt-16"></p>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" ng-model="User.email" placeholder="VD: email@domain.com" class="form-control">
                <!-- <span class="form-message" ng-show="loginForm.email.$invalid && loginForm.email.$dirty">Email invalid or empty</span> -->
            </div>

            <button type="button" class="form-submit" ng-click="Login()" ng-disabled="loginForm.email.$invalid && loginForm.email.$dirty
                    || loginForm.password.$invalid && loginForm.password.$dirty">
                Lấy lại mật khẩu
            </button>

            <div class="login-question mt-4">
                <div class="remember-password">
                    <!-- <input type="checkbox" name="remember-password" id="remember-password"> -->
                    <!-- <span class="remember-password-text">Nhớ mật khẩu?</span> -->
                    Quay lại đăng nhập
                    <a href="/login" class="link-to-register pull-right">Đăng nhập</a>
                </div>

            </div>
        </form>
    </div>
    <script src="/js/angular.min.js"></script>

    <script src="/js/bookcontroller.js"></script>
    <script src="/js/dirPagination.js"></script>
</body>
</html>
