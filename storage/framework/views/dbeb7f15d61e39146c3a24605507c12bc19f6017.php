<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>

    <h2>Bem vindo ao Products</h2>
    <a href="/">Clique aqui para voltar à Home</a>

    <?php if($search): ?>

        <p>Procurando por: <?php echo e($search); ?></p>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sites/laravel/aulas/Teste2/resources/views/products.blade.php ENDPATH**/ ?>