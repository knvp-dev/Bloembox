<template>
	<div class="modal-mask" tabindex="-1" role="dialog" v-show="show" transition="modal">
		  <div class="modal-dialog modal-sm modal-container" role="document">
		    <div class="modal-content">
		      <div class="modal-image"><img src="/images/banner/home.jpg" alt=""></div>
		      <div class="content-modal">
		      	<h1>Wenst u een kaartje toe te voegen aan dit boeket?</h1>
		      	<ul class="flowers-list">
		      		<li>
		      			<a :href="buildUrl"><span class="modal-list-item-name">Ja, ik wil er een kaartje bij</span></a>
		          </li>
		      		</li>
		      		<li>
		      			<a href="#" @click="dismissModal"><span class="modal-list-item-name">Neen, ga verder zonder kaartje</span></a></li>
		      	</ul>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script>
	export default{
		props: ['show','rowId'],
		methods:{
			dismissModal(e){
				this.show = !this.show;
			}
		},
		computed:{
			buildUrl(){
				return "/cards/"+this.rowId;
			}
		}
	}
</script>