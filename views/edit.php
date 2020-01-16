<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Редактированные данных</h2>
                        <form action="#" method="post">
                            <p>Пароль:</p>
                            <input type="password" name="oldpas" placeholder="Пароль" value="<?php echo $oldpas; ?>"/>

                            <p>Новое имя:</p>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>

                            <p>Новый пароль:</p>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            <p>Повторите новый пароль:</p>
                            <input type="password" name="secpas" placeholder="Пароль" value="<?php echo $secpas; ?>"/>

                            <br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
                        </form>
                    </div><!--/sign up form-->

                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
