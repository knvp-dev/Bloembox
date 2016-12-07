<div class="shopping-cart-wrapper">
<li class="toggle-shoppingcart-btn is-collapsed"><a href="#" class="cart-btn"><i class="fa fa-shopping-cart"></i><span class="cart-btn-count"> {{ Cart::count() }}</span></a></li>
      <div class="shopping-cart is-collapsed">

        <div class="shopping-cart-header">
          <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{ Cart::count() }}</span>
          <div class="shopping-cart-total">
            <span class="lighter-text">Totaal:</span>
            <span class="main-color-text">€ {{ Cart::total() }}</span>
          </div>
        </div> <!--end shopping-cart-header -->

        <ul class="shopping-cart-items">
        
        @foreach(Cart::content() as $cartitem)
          <li class="clearfix cart-item">
            <img class="cart-img" src="/images/products/{{ $cartitem->model->image }}" />
            <span class="item-name"><a href="/products/{{ $cartitem->model->product_type }}/{{ $cartitem->model->slug }}">{{ $cartitem->name }}</a></span>
            <span class="item-price">€ {{ $cartitem->model->priceInEuros() }}</span><br>
            @if(!$cartitem->options->card)
              <span class="item-quantity">
                <a href="/cards/{{ $cartitem->rowId }}">
                  <i class="fa fa-plus"></i> voeg een kaartje toe
                </a>
              </span><br>
            @endif
            <span class="cart-remove"><a href="/cart/remove/{{ $cartitem->rowId }}"><span><i class="fa fa-times"></i></span></a></span>
          </li> 

          @if($cartitem->options->card)
            <li class="clearfix cart-item connected-items">
            <img class="cart-img" src="/images/cards/{{ $cartitem->options->card->image }}" />
            <span class="item-name">{{ $cartitem->options->card->name }}</span>
            <span class="item-price">€ {{ number_format($cartitem->options->card->price / 100, 2) }}</span><br>
              <span class="item-quantity">
                <a href="/cards/{{ $cartitem->rowId }}">
                  <i class="fa fa-refresh"></i> kaartje wijzigen
                </a>
              </span><br>
            <span class="cart-remove"><a href="/cart/remove/card/{{ $cartitem->rowId }}"><span><i class="fa fa-times"></i></span></a></span>
          </li> 
          @endif

        @endforeach
        </ul>
        
        @if(Cart::count() > 0)
          <a href="/checkout" class="button">Naar de kassa</a>
        @endif
      </div> <!--end shopping-cart -->
  </div>