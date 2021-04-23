<body background="<?=BASEURL;?>/img/banner/b3.jpg">
    <br><br><br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <div class="card " style="background: linear-gradient(to bottom, #0099e6 75%, #ffffff 100%);">
                    <div class="card-header text-center shadow-lg p-3  rounded" style="background-color: #0088cc;">
                        <h5 class="card-title">Login</h5>
                    </div>
                    <div class="card-body shadow-lg p-3 rounded ">
                        <br>
                        <form action="<?=BASEURL;?>/login/auth" method="POST">
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Input your email"
                                    name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control fas fa-lock" id="password" name="password"
                                    placeholder="Input your password" required>
                                <div class="text-right">
                                    <a href="#" class="card-link small" style="color: #336699;">Forgot password?</a>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </form>
                    </div>
                    <div class="card-footer shadow-lg p-3 rounded text-center">
                        <p class="card-text">Not have account? <a href="<?=BASEURL;?>"
                                class="btn btn-success btn-sm">Pengunjung</a></p>
                        <hr>

                    </div>

                </div>
            </div>
        </div>
    </div>