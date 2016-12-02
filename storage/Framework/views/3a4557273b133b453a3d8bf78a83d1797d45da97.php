<?php $__env->startSection('banner'); ?>

<div class="image-banner">
    <img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
    <div class="container">
        <div class="image-banner-body">
            <h1 class="image-banner-title">Inloggen</h1>
            
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-12">

    <div class="account-form-info col-md-6">
        
        <img src="<?php echo e(asset('images/products/brecht.png')); ?>" alt="">

    </div>


    <form action="/login" class="account-form col-md-6" method="post">

    <h1>Log in</h1>

    <br>

    <?php if( count($errors) > 0 ): ?>
    <ul class="alert alert-danger">
        <?php foreach($errors->all() as $error): ?>
        <li class="error"><?php echo e($error); ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

      <div class="form-group col-md-12">
        <label for="email" class="sr-only">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>

      <div class="form-group col-md-12">
        <label for="password" class="sr-only">Wachtwoord</label>
        <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required>
        <br>
        <a href="/password/reset">Wachtwoord vergeten?</a> | <a href="/account/create">Nog geen account?</a>
      </div>

      <?php echo e(csrf_field()); ?>


      <button type="submit" class="btn btn-default">Log in</button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>