<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Login</h1>
        </div>
    </div>
    <div class="row">
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">email: </label>
                <input class="form-control" type="email" id="email" name="email" />
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input class="form-control" type="password" id="password" name="password" />
            </div>
            <div class="form-group">
                <input type="submit" value="LOGIN" />
            </div>
            <h4><?= $view_bag['status'] ?></h4>
        </form>
    </div>
</div>