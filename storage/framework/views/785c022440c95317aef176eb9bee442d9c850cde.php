<?php $__env->startSection('title', 'Evento'); ?>

<?php $__env->startSection('content'); ?>

    <section id="evento_">
        <div id="evento_-article">
            <?php if($event->img): ?>
                <img src="/img/events/<?php echo e($event->img); ?>" alt="">
            <?php else: ?>
                <img src="/img/events/festa.jpg" alt="">
            <?php endif; ?>
            <article>
                <h1><?php echo e($event->title); ?></h1>
                <p class="text-muted">
                    Evento publicado em <?php echo e(date('d/m/Y', strtotime($event->updated_at))); ?>

                </p>
                <p class="text-primary">
                    Participantes: <?php echo e(count($event->users)); ?>

                </p>
                <p class="text-description"><?php echo e($event->description); ?></p>
                <p class="text-success">Data prevista: <?php echo e(date('d/m/Y', strtotime($event->date))); ?></p>
                <p>Evento: <span class="text-info"><?php echo e($event->private ? 'Privado' : 'Público'); ?></span></p>
                <details>
                    <summary>Detalhes</summary>
                    <div>Local do Evento: <?php echo e($event->city); ?></div>
                    <div>Dono do evento: <?php echo e($owner['name']); ?></div>
                    <?php if($event->items): ?>
                        <br>
                        <div>O evento conta com:</div>
                        <ul id="items-list">
                            <?php $__currentLoopData = $event->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><ion-icon name="play-outline"></ion-icon> <?php echo e($_item); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </details>
                <form action="/events/join/<?php echo e($event->id); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <a href="/events/join/<?php echo e($event->id); ?>"
                            id="event-join-submit"
                            class="btn btn-success"
                            onclick="event.preventDefault();
                            this.closest('form').submit()"
                            >
                            Confirmar Presença
                        </a>
                    </div>
                </form>
            </article>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sites/laravel/aulas/Teste2/resources/views/events/show.blade.php ENDPATH**/ ?>