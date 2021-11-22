<?php $__env->startSection('title', 'Editar'); ?>

<?php $__env->startSection('content'); ?>

    <section id="events-create-header" class="editing" style="background-image: url('/img/events/<?php echo e($event->img); ?>')">
        <div id="events-create-container">
            <h1>Editando: "<?php echo e($event->title); ?>"</h1>
            <form action="/events/update/<?php echo e($event->id); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group"> 
                    <label for="img">Imagem:</label>
                    <input type="file" name="img" id="img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" name="title" id="title" class="form-control"
                    value="<?php echo e($event->title); ?>">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" class="form-control"><?php echo e($event->description); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Data do Evento:</label>
                    <input type="date" name="date" id="date" class="form-control"
                    value="<?php echo e($event->date->format('Y-m-d')); ?>">
                </div>
                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" name="city" id="city" class="form-control" value="<?php echo e($event->city); ?>">
                </div>
                <select name="private" id="private">
                    <option value="0">Público</option>
                    <option value="1" <?php echo e($event->private ? 'selected="selected"' : ''); ?>>Privado</option>
                </select>
                <div class="form-group">
                    <label for="title">Adicione infraestrutura:</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Cadeiras"
                        <?php echo e(in_array('Cadeiras', $event->items) ? 'checked' : ''); ?>> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Mesas"
                        <?php echo e(in_array('Mesas', $event->items) ? 'checked' : ''); ?>> Mesas
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Palco"
                        <?php echo e(in_array('Palco', $event->items) ? 'checked' : ''); ?>> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="Comida"
                        <?php echo e(in_array('Comida', $event->items) ? 'checked' : ''); ?>> Comida
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Editar" class="form-control">
                </div>
            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sites/laravel/aulas/Teste2/resources/views/events/edit.blade.php ENDPATH**/ ?>