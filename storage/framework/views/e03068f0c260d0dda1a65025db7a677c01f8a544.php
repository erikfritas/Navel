<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <section id="dashboard">
        <h1>Bem vindo: <?php echo e($user->name); ?></h1>
        <div id="dashboard-events">
            <?php if(count($events) > 0): ?>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="card">
                        <img src="/img/events/<?php echo e($event->img ? $event->img : 'festa.jpg'); ?>" alt="">
                        <p class="text-muted"><?php echo e(date('d/m/Y', strtotime($event->date))); ?></p>
                        <h5><?php echo e($event->title); ?> | <?php echo e($event->city); ?></h5>
                        <p><?php echo e($event->description); ?></p>

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
            <?php else: ?>
                <p>Você não possui eventos ainda... Deseja <a href="/events/create">criar um agora</a>?</p>
            <?php endif; ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sites/laravel/aulas/Teste2/resources/views/dashboard.blade.php ENDPATH**/ ?>