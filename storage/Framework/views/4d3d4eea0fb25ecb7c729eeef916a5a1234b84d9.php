<div class="shopping-cart-wrapper">
<li class="toggle-shoppingcart-btn is-collapsed"><a href="#" class="cart-btn"><i class="fa fa-shopping-cart"></i><span class="cart-btn-count"> <?php echo e(Cart::count()); ?></span></a></li>
      <div class="shopping-cart is-collapsed">

        <div class="shopping-cart-header">
          <i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php echo e(Cart::count()); ?></span>
          <div class="shopping-cart-total">
            <span class="lighter-text">Totaal:</span>
            <span class="main-color-text">€ <?php echo e(Cart::total()); ?></span>
          </div>
        </div> <!--end shopping-cart-header -->

        <ul class="shopping-cart-items">
        
        <?php foreach(Cart::content() as $cartitem): ?>
          <li class="clearfix cart-item">
            <img class="cart-img" src="/images/products/<?php echo e($cartitem->id); ?>.jpg" />
            <span class="item-name"><a href="/products/<?php echo e($cartitem->model->product_type); ?>/<?php echo e($cartitem->model->slug); ?>"><?php echo e($cartitem->name); ?></a></span>
            <span class="item-price">€ <?php echo e($cartitem->model->priceInEuros()); ?></span><br>
            <?php if(!$cartitem->options->card): ?>
              <span class="item-quantity">
                <a href="/cards/<?php echo e($cartitem->rowId); ?>">
                  <i class="fa fa-plus"></i> voeg een kaartje toe
                </a>
              </span><br>
            <?php endif; ?>
            <span class="cart-remove"><a href="/cart/remove/<?php echo e($cartitem->rowId); ?>"><span><i class="fa fa-times"></i></span></a></span>
          </li> 

          <?php if($cartitem->options->card): ?>
            <li class="clearfix cart-item connected-items">
            <img class="cart-img" src="/images/cards/<?php echo e($cartitem->options->card->image); ?>.jpg" />
            <span class="item-name"><?php echo e($cartitem->options->card->name); ?></span>
            <span class="item-price">€ <?php echo e(number_format($cartitem->options->card->price / 100, 2)); ?></span><br>
              <span class="item-quantity">
                <a href="/cards/<?php echo e($cartitem->rowId); ?>">
                  <i class="fa fa-refresh"></i> kaartje wijzigen
                </a>
              </span><br>
            <span class="cart-remove"><a href="/cart/remove/card/<?php echo e($cartitem->rowId); ?>"><span><i class="fa fa-times"></i></span></a></span>
          </li> 
          <?php endif; ?>

        <?php endforeach; ?>
        </ul>
        
        <?php if(Cart::count() > 0): ?>
          <a href="/checkout" class="button">Naar de kassa</a>
        <?php endif; ?>
      </div> <!--end shopping-cart -->
  </div>