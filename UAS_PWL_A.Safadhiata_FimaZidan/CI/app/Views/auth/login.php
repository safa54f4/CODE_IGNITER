<?php
$validation =  \Config\Services::validation();
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control <?= (!empty($validation->getError("email")) ? "is-invalid" : "") ?>" name="email" />
                            <?php if (!empty($validation->getError("email"))) : ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError("email") ?></strong>
                                </span>
                            <?php endif; ?>

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control  <?= (!empty($validation->getError("password")) ? "is-invalid" : "") ?>" name="password" />
                            <?php if (!empty($validation->getError("password"))) : ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError("password") ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>