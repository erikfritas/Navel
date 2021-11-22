<?php $__env->startSection('title', 'Produto'); ?>

<?php $__env->startSection('content'); ?>

    <?php if($id != null): ?>

        <h1>Produto:</h1>
        <p>Id: <?php echo e($id); ?></p>

    <?php else: ?>

        <h1>Produto Inválido</h1>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sites/laravel/aulas/Teste2/resources/views/product.blade.php ENDPATH**/ ?>