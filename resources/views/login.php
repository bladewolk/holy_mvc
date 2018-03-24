<div class="login-page">
    <div class="form">
        <form class="login-form" action="/login" method="POST">
            <input type="text" placeholder="username" name="login"/>
            <input type="password" placeholder="password" name="pass"/>
            <button>login</button>

            <?php if (session()->hasError('auth')) : ?>
                <p class="message"><?= session()->get('auth') ?></p>
            <?php endif; ?>
        </form>
    </div>
</div>