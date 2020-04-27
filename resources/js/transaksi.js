import Vue from 'vue'
import axios from 'axios'
import select2 from 'select2'

Vue.filter('currency', function(money){
	return accounting.formatMoney(money, 'Rp', 2, '.', ',')
})

new Vue({
	el: '#dw',
	data: {
		product: {
			id: '',
			qty: '',
			price: '',
			name: '',
			photo: ''
		}
	},
	watch: {
		'product.id': function(){
			if (this.product.id) {
				this.getProduct()
			}
		}
	},
	mounted(){
		$('#product_id').select2({
			width: '100%'
		}).on('change', () => {
			this.product.id = $('#product_id').val()
		})
	},
	method: {
		getProduct() {
			axios.get(`/api/product/${this.product.id}`)
			.then((response) => {
				this.product = response.data
			})
		}
	}
})