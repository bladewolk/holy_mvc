<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Tasks dash</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php if (isActiveLink('/')) : ?> active <?php endif; ?>"
               href="/">Home</a>
            <a class="nav-item nav-link <?php if (isActiveLink('/')) : ?> active <?php endif; ?>"
               href="/create">Create</a>

            <?php if (auth()->guest()) : ?>
                <a class="d-sm-none nav-item nav-link float-right" href="/login">LOGIN</a>
            <?php else : ?>
                <a class="d-sm-none nav-item nav-link float-right" href="/logout">LOGOUT</a>
            <?php endif; ?>
        </div>
    </div>

    <?php if (auth()->guest()) : ?>
        <a class="d-none  d-md-block nav-item nav-link float-right" href="/login">LOGIN</a>
    <?php else : ?>
        <a class="d-none d-md-block nav-item nav-link float-right" href="/logout">LOGOUT</a>
    <?php endif; ?>
</nav>