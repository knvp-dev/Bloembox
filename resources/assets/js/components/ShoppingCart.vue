<template>
    <div class="shopping-cart-wrapper">
      <div class="cart-btn btn btn-rounded btn-groen mr-5" @click="isVisible = !isVisible">
        <i class="fa fa-shopping-cart"></i><span class="cart-btn-count">{{ cartCount }}</span>
      </div>

      <div class="shopping-cart" v-if="toggle" v-cloak>

        <div class="shopping-cart-header">
          <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{ cartCount }}</span>
          <div class="shopping-cart-total">
            <span class="lighter-text">Totaal:</span>
            <span class="main-color-text">{{ totalPrice | to-euros }}</span>
          </div>
        </div> <!--end shopping-cart-header -->

        <i v-if="loading" class="loading-spinner fa fa-circle-o-notch fa-spin is-opace text-centered p-10" style="font-size:18px"></i>

        <ul class="shopping-cart-items">
        
        
          <li class="clearfix cart-item" v-for="cartitem in cart">
          
            <img class="cart-img" :src="cartitem.image" />
            <span class="item-name">{{ cartitem.name }}</span>
            <span class="item-price">{{ cartitem.price | to-euros }}</span>
            <span class="item-quantity"></span><br>
            <span class="cart-remove"><span @click="remove(cartitem)"><i class="fa fa-times"></i></span></span>

          </li> 

        </ul>

        <a v-if="cartCount > 0" href="/checkout" class="button">Naar de kassa</a>
      </div> <!--end shopping-cart -->
  </div>
</template>

<script>
var Events = new Vue({});

    export default {
        mounted() {
            console.log("shopping-cart initialized");
            this.update();

            this.$parent.$on('productAdded', (product) => {
                this.add(product);
            });
        },
        data() {
            return{
                    isVisible : false,
                    cart: [],
                    cartCount: 0,
                    totalPrice: 0,
                    loading: false
                  }
        },
        computed: {
            toggle() {
                return this.isVisible;
            }
        },
        methods: {
            add(product){
                this.$http.get('/cart/add/'+product.id).then(function(response){
                    this.$parent.$emit('openModal',response);
                    this.update();
                });
            },
            remove(item, e){
                this.loading = true;
                this.$http.get('/cart/remove/'+item.rowId).then(function(response){
                  this.update();
                });
            },
            update(){
                this.loading = true;
                this.$http.get('/cart/get').then(function(response){
                    var total = 0;

                   this.cart = JSON.parse(response.body);
                   this.cartCount = Object.keys(this.cart).length;

                   _.mapValues(this.cart, function(item){
                    total += item.price;
                    item.image = "/images/products/"+(item.name).toString().toLowerCase().replace(/\s+/g, '-')+".jpg";
                   });

                   this.totalPrice = total ;

                   this.loading = false;

                });
            }
        }
        
    }
</script>
