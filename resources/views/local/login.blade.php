
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Login</title>
    <link href="/assets/local/css/register.css" rel="stylesheet" />
</head>
<body ng-app="myapp">
    <div class="login-container" ng-controller="logincontroller">
        <form action="" method="post" class="login-form" name="loginForm" id="form-1">
            <h3 class="heading">Đăng nhập</h3>
            <p class="desc mb-16 pt-16"></p>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" ng-model="email" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message">@{{email_message}}</span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" ng-model="pass" placeholder="Nhập mật khẩu" class="form-control" required minlength="6">
                <span class="form-message">@{{pass_message}}</span>
            </div>

            <button type="button" class="form-submit" ng-click="Login(email,pass)">
                Đăng nhập
            </button>

            <div class="login-question mt-4">
                <div class="remember-password">
                    <input type="checkbox" name="remember-password" id="remember-password">
                    <span class="remember-password-text">Nhớ mật khẩu?</span>
                    <br>
                    <a href="/register" class="link-to-register pull-right">
                        Tạo tài khoản
                    </a>
                    <a style="float:right" href="/forgot-password" class="link-to-register pull-right">
                        Quên mật khẩu
                    </a>
                </div>

            </div>
        </form>
    </div>
    <script src="/js/angular.min.js"></script>

    <script src="/js/logincontroller.js"></script>
    <!-- <script src="/js/dirPagination.js"></script> -->
</body>
</html>
