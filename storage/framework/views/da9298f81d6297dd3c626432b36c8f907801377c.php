
<?php $__env->startSection('title', 'Create Tag'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Tag</h1>
                </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(route('website')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('tags.index')); ?>">Tag List</a></li>
                <li class="breadcrumb-item active">Create Tag</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-4 shadow p-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Create Tag </h3>
                            
                                <a href="<?php echo e(route('tags.index')); ?>" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="<?php echo e(route('tags.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <?php echo $__env->make('includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <div class="form-group">
                                                <label for="name">Tag name</label>
                                                <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="description" id="description" rows="4" class="form-control"
                                                    placeholder="Enter description"></textarea>
                                            </div>
                                        </div>
                                        <div class="m-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Main Content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Web Development\Laravel\Blog-app\resources\views/admin/tag/create.blade.php ENDPATH**/ ?>