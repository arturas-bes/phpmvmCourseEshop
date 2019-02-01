<?php $__env->startSection('title', 'Product Categories'); ?>
<?php $__env->startSection('data-page-id', 'adminCategories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="category">
        <div class="row expanded column">
            <h2>Product Categories</h2> <hr />
        </div>

        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row expanded">
            <div class="small-12 medium-6 column">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by name">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>

            <div class="small-12 medium-5 end column">
                <form action="/admin/product/categories" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" name="name"
                               placeholder="Category Name">
                        <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row expanded">
            <div class="small-12 medium-11 column">
                <?php if(count($categories)): ?>
                    <table class="hover" data-form="deleteForm">
                        <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category['name']); ?></td>
                                <td><?php echo e($category['slug']); ?></td>
                                <td><?php echo e($category['added']); ?></td>
                                <td width="100" class="text-right">
                                    <span data-tooltip aria-haspopup="true" class="has-tip top"
                                          data-disable-hover="false" tabindex="1"
                                          title="Add Subcategory">
                                        <a data-open="add-subcategory-<?php echo e($category['id']); ?>"><i class="fa fa-plus"></i></a>
                                    </span>
                                    <span data-tooltip aria-haspopup="true" class="has-tip top"
                                          data-disable-hover="false" tabindex="1"
                                          title="Edit Category">
                                        <a data-open="item-<?php echo e($category['id']); ?>"><i class="fa fa-edit"></i></a>
                                    </span>
                                    <span style="display: inline-block" data-tooltip aria-haspopup="true" class="has-tip top"
                                          data-disable-hover="false" tabindex="1"
                                          title="Delete Category">
                                        <form method="POST" action="/admin/product/categories/<?php echo e($category['id']); ?>/delete"
                                              class="delete-item">
                                            <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                                            <button type="submit"><i class="fa fa-times delete"></i> </button>
                                        </form>
                                    </span>

                                    <!--Edit Category Modal -->
                                    <div class="reveal" id="item-<?php echo e($category['id']); ?>"
                                         data-reveal data-close-on-click="false" data-close-on-esc="false"
                                         data-animation-in="scale-in-up">
                                        <div class="notification callout primary"></div>
                                        <h2>Edit Category</h2>
                                        <form>
                                            <div class="input-group">
                                                <input type="text" id="item-name-<?php echo e($category['id']); ?>"
                                                       name="name" value="<?php echo e($category['name']); ?>">
                                                <div>
                                                    <input type="submit" class="button update-category"
                                                           id="<?php echo e($category['id']); ?>"
                                                           name="token" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>"
                                                           value="Update">
                                                </div>
                                            </div>
                                        </form>
                                        <a href="/admin/product/categories" class="close-button"
                                           aria-label="Close modal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    <!--End Edit Category Modal -->

                                    <!--Add subcategory Modal -->
                                    <div class="reveal" id="add-subcategory-<?php echo e($category['id']); ?>"
                                         data-reveal data-close-on-click="false" data-close-on-esc="false"
                                         data-animation-in="scale-in-up">
                                        <div class="notification callout primary"></div>
                                        <h2>Add Subcategory</h2>
                                        <form>
                                            <div class="input-group">
                                                <input type="text" id="subcategory-name-<?php echo e($category['id']); ?>">
                                                <div>
                                                    <input type="submit" class="button add-subcategory"
                                                           id="<?php echo e($category['id']); ?>"
                                                           name="token" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>"
                                                           value="Create">
                                                </div>
                                            </div>
                                        </form>
                                        <a href="/admin/product/categories" class="close-button"
                                           aria-label="Close modal" type="button">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    <!--End subcategory Modal -->
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $links; ?>

                <?php else: ?>
                    <h2>You have not created any category</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>