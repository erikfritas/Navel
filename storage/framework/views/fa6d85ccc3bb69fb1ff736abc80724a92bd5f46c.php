<?php $__env->startSection('title', 'HOME'); ?>

<?php $__env->startSection('content'); ?>

    <header id="header-home">
        <h1 class="default">Bem vindo a Home</h1>
    </header>

    <div id="search-container">
        <h1>Pesquise um evento</h1>
        <form action="/" method="get" class="form-group">
            <label for="search">Nome do Evento</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="exemplo: evento de JS">
        </form>
    </div>

    <hr class="w80">

    <div id="events-container">
        
        <?php if($search): ?>
            <h1>Procurando por <?php echo e($search); ?>...</h1>
        <?php else: ?>
            <h1>Eventos quentes...</h1>
        <?php endif; ?>

        <div id="events-container-articles">
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="card">
                    <img src="/img/events/<?php echo e($event->img ? $event->img : 'festa.jpg'); ?>" alt="">
                    <p class="text-muted"><?php echo e(date('d/m/Y', strtotime($event->date))); ?></p>
                    <h5><?php echo e($event->title); ?> | <?php echo e($event->city); ?></h5>
                    <p><?php echo e($event->description); ?></p>

                    <p class="text-muted">
                        <?php if(count($event->users) > 1): ?>
                            <?php echo e(count($event->users)); ?> Participantes
                        <?php elseif(count($event->users) == 1): ?>
                            1 Participante
                        <?php else: ?>
                            Nenhum participante, seja o primeiro!
                        <?php endif; ?>
                    </p>

                    <?php if($event->private): ?>
                        <span class="text-primary">
                            Evento privado
                        </span>
                    <?php else: ?>
                        <span class="text-success">
                            Evento público
                        </span>
                    <?php endif; ?>

                    <a href="/events/<?php echo e($event->id); ?>" class="btn btn-primary mt-2">Saiba mais clicando aqui...</a>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($events) === 0 && $search): ?>
                <div style="text-align: center;">
                    <p>Lamentamos, mas não encontramos nenhum evento com o título "<?php echo e($search); ?>" :(</p>
                    <a href="/" class="text-info">Ver todos...</a>
                </div>
            <?php elseif(count($events) === 0): ?>
                <p>Lamentamos, mas não há eventos suficientes :(</p>
            <?php endif; ?>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sites/laravel/aulas/Teste2/resources/views/home.blade.php ENDPATH**/ ?>