<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <section class="dashboard">
        <h1><?php echo e($user->name); ?></h1>
        <hr>
        <div class="dashboard-events">
            <h2>Meus eventos:</h2>
            <?php if(count($events) > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Localização</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="col"><?php echo e($key + 1); ?></td>
                                <td scope="col">
                                    <a href="/events/<?php echo e($event->id); ?>"><?php echo e($event->title); ?></a>
                                </td>
                                <td scope="col"><?php echo e(count($event->users)); ?></td>
                                <td scope="col"><?php echo e($event->city); ?></td>
                                <td scope="col" class="d-flex" style="column-gap: 5px;">
                                    <a href="/events/edit/<?php echo e($event->id); ?>" class="btn edit">Editar</a>
                                    <form action="/events/<?php echo e($event->id); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button
                                        type="submit"
                                        class="btn delete">
                                            Deletar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Você não possui eventos ainda... Deseja <a href="/events/create">criar um agora</a>?</p>
            <?php endif; ?>
        </div>
        <hr>
        <div class="dashboard-events">
            <h2>Eventos que estou participando:</h2>
            <?php if(count($events) > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Localização</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $eventsAsParticipant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="col" class="id"><?php echo e($key + 1); ?></td>
                                <td scope="col" class="title_">
                                    <a href="/events/<?php echo e($event->id); ?>"><?php echo e($event->title); ?></a>
                                </td>
                                <td scope="col"><?php echo e(count($event->users)); ?></td>
                                <td scope="col"><?php echo e($event->city); ?></td>
                                <td scope="col" class="d-flex" style="column-gap: 5px;">
                                    <button class="btn delete window-open" id="btn-<?php echo e($key); ?>">Sair do evento</button>
                                    <p class="event_id" style="display: none;"><?php echo e($event->id); ?></p>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Você não está participando de nenhum evento ainda...
                    Deseja <a href="/">participar de um agora</a>?</p>
            <?php endif; ?>
        </div>
    </section>

    <div class="window-msg disable">
        <div class="window-menu"><ion-icon name="arrow-forward-circle-outline"></ion-icon></div>
        <h1 class="default">Tem certeza de que deseja sair deste evento?</h1>
        <p class="text-info">O "<span class="title_"></span>" parece ser bem top...</p>
        <form method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>

            <a class="btn edit"
                onclick="event.preventDefault(); this.closest('form').submit()">Sair do evento</a>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sites/laravel/aulas/Teste2/resources/views//events/dashboard.blade.php ENDPATH**/ ?>