<template>

<div class="products-grid col-md-12 col-centered">

	<h1>{{ productType }}</h1>

	<div class="product-cards row row-centered">

		<div class="product-card col-md-3 col-centered" v-for="product in products">
			<a :href="product.image" data-lity>
				<img :src="product.image" alt="boeket" class="product-card-image">
			</a>
			<div class="product-card-title">
				<h1>{{ product.name }}</h1>
				<p>{{ product.description }}</p>
			</div>
			<div class="product-card-price">
				{{ product.price | to-euros }}
			</div>
			<div v-if="product.tag" class="product-card-extra blue-tag">
				Aanrader!
			</div>
			<div class="add-to-cart-btn">
				<a @click="addProductToCart(product)"><i class="fa fa-shopping-cart"></i>
				in winkelmandje</a>
			</div>
		</div>

	</div>
</div>
	
</template>

<script>
	export default{
		mounted(){
			console.log('product grid initialized');
			this.getProducts();
		},
		data() {
			return {
				productType: '',
				products: []
			}
		},
		methods:{
			getProducts(){
				this.$http.get('/products').then(function(response){
					this.products = response.body;
					this.productType = "brievenbusbloemen"
					_.mapValues(this.products, function(item){
                    item.image = "/images/products/"+(item.name).toString().toLowerCase().replace(/\s+/g, '-')+".jpg";
                   });
				});
			},
			addProductToCart(product){
		        console.log("add product to cart");
		        this.$parent.$emit('productAdded',product);
		    }
		}
	}

	Vue.filter('to-euros', function (value) {
	   return "€ " + parseFloat(value / 100).toFixed(2);
	});
</script>