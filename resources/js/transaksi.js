import Vue from 'vue'
import axios from 'axios'
import select2 from 'select2'
import VueSweetAlert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.filter('currency', function(money){
	return accounting.formatMoney(money, 'Rp', 2, '.', ',')
})

Vue.use(VueSweetAlert2);

new Vue({
	el: '#dw',
	data: {
		product: {
			id: '',
			qty: '',
			price: '',
			name: '',
			photo: ''
		},
		cart: {
			product_id: '',
			qty: 1
		},
		shoppingCart: [],
		submitCart: false
	},
	watch: {
		'product.id': function(){
			if (this.product.id) {
				this.getProduct()
			}
		}
	},
	mounted(){
		$('#product_id').on('change', () => {
			this.product.id = $('#product_id').val()
		})

		this.getCart()
	},
	methods: {
		getProduct() {
			axios.get(`/api/product/${this.product.id}`)
			.then((response) => {
				this.product = response.data
			})
		},
		addToCart() {
			this.submitCart = true;

			axios.post('/api/cart', this.cart)
			.then((response) => {
				setTimeout(() => {
					this.shoppingCart = response.data

					this.cart.product_id = '';
					this.cart.qty = 1;
					this.product = {
						id: '',
						price: '',
						name: '',
						photo: ''
					}

					$('#product_id').val('')
					this.submitCart = false
				}, 1000)
			})
			.catch((error) => {

			})
		},
		getCart() {
			axios.get('/api/cart')
			.then((response) => {
				this.shoppingCart = response.data
			})
		},
		removeCart(id) {
			this.$swal({
				title: 'Kamu yakin ?',
				text: 'Kamu tidak dapat mengembalikan tindakan ini',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Iya, lanjutkan!',
				cancelButtonText: 'Tidak, Batalkan!',
				showCloseButton: true,
				showLoaderConfirm: true,
				preConfirm: () => {
					return new Promise(resolve => {
						setTimeout(() => {
							resolve()
						}, 1000)
					})
				},
				allowOutsideClick: () => ! this.$swal.isLoading()
			}).then(result => {
				if (result.value) {
					axios.delete(`/api/cart/${id}`)
					.then(response => {
						this.getCart()
					})
					.catch(error => {
						console.log(errr)

					})
				}
			})
		}
	}
})