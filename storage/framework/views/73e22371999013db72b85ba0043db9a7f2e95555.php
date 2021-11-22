<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?> | Manavents</title>
    
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">

    <?php $__currentLoopData = [
        'others',
        'nav',
        'search',
        'events',
        'dashboard',
        'footer'
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="<?php echo e(asset("css/$style.css")); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    

    
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <?php if(session('msg')): ?>
        <script>
            alert('<?php echo e(session('msg')); ?>')
        </script>
    <?php endif; ?>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">Manavents <p>Gerenciador de eventos</p></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Criar Eventos</a>
                    </li>
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(!Request::is('dashboard')): ?>
                            <li><a href="/dashboard" class="nav-link">Perfil</a></li>
                        <?php endif; ?>
                        <li>
                            <form action="/logout" method="post">
                                <?php echo csrf_field(); ?>
                                <a href="/logout" class="nav-link"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <?php echo $__env->yieldContent('content'); ?>

    <footer>
        <p>&copy; Copyright - 2021</p>
        <p id="developer" class="text-info">
            by <a class="text-success" href="https://www.instagram.com/erikfritas" target="_blank">@erikfritas</a>
        </p>
    </footer>

    
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php /**PATH /var/www/html/sites/laravel/aulas/Teste2/resources/views/layouts/main.blade.php ENDPATH**/ ?>