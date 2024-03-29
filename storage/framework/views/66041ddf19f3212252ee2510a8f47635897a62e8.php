
<?php $__env->startSection('title', 'Tag'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tag List</h1>
                </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(route('website')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Tag List</li>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Tag List</h3>
                            
                                <a href="<?php echo e(route('tags.create')); ?>" class="btn btn-primary">Add Tag</a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($tags->count() > 0): ?>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($tag->id); ?></td>
                                        <td><?php echo e($tag->name); ?></td>
                                        <td><?php echo e($tag->slug); ?></td>
                                        <td class="d-flex">
                                            <a href="<?php echo e(route('tags.edit', [$tag->id])); ?>" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="<?php echo e(route('tags.destroy', [$tag->id])); ?>" class="mr-1" method="POST">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?> 
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>   
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-center">No tags found.</h5>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            <?php echo e($tags->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Main Content -->
    


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Web Development\Laravel\Blog-app\resources\views/admin/tag/index.blade.php ENDPATH**/ ?>