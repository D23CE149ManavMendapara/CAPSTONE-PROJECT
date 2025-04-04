
<?php $__env->startSection('content'); ?>
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Wishlist</h2>
      
      <div class="shopping-cart">
        <?php if(Cart::instance('wishlist')->content()->count()>0): ?>
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <tr>
                    <td>
                    <div class="shopping-cart__product-item">
                        <img loading="lazy" src="<?php echo e(asset('uploads/products/thumbnails')); ?>/<?php echo e($item->model->image); ?>" width="120" height="120" alt="<?php echo e($item->name); ?>" />
                    </div>
                    </td>
                    <td>
                    <div class="shopping-cart__product-item__detail">
                        <h4><?php echo e($item->name); ?></h4>
                        
                    </div>
                    </td>
                    <td>
                    <span class="shopping-cart__product-price"><?php echo e($item->price); ?></span>
                    </td>
                    <td>
                        <?php echo e($item->qty); ?>

                    </td>
                    <td>
                      <div class="row">
                        <div class="col-6">
                            <form method="POST" action="<?php echo e(route('wishlist.move.to.cart',['rowId'=>$item->rowId])); ?>">
                              <?php echo csrf_field(); ?>
                              <button type="submit" class="btn btn-sm btn-warning">Move To Cart</button>
                            </form>
                        </div>
                        <div class="col-6">
                            <form method="POST" action="<?php echo e(route('wishlist.item.remove',['rowId'=>$item->rowId])); ?>" id="remove-item-<?php echo e($item->id); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <a href="javascript:void(0)" class="remove-cart" onclick="document.getElementById('remove-item-<?php echo e($item->id); ?>').submit();">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                    <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                    </svg>
                                </a>
                            </form>
                        </div>
                      </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <div class="cart-table-footer">
           <form method="POST" action="<?php echo e(route('wishlist.items.clear')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-light">CLEAR WISHLIST</button>
           </form>
          </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-12">
                    <p>No Item Found In Your Wishlist</p>
                    <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-info">Wishlist Now</a>
                </div>
            </div>
        <?php endif; ?>
      </div>
    </section>
  </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel11ecommerce\resources\views/wishlist.blade.php ENDPATH**/ ?>