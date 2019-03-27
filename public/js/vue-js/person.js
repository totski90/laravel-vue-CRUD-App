

new Vue({
	el: '#vue-wrapper',

	data: {
		items: [],
		hasError: true,
		hasDeleted: true,
		hasAgeError: true,
		showModal: false,
		e_name: '',
		e_age: '',    e_id: '',
		e_profession: '',
		newItem: { 'name': '','age': '','profession': '' },
	},

	mounted() {
		this.getVueItems();
	},

	methods: {
		getVueItems: function getVueItems() {
	      var _this = this;

	      axios.get('/vueitems').then(function (response) {
	        _this.items = response.data;
	      });
	    },

		createItem: function createItem() {
			var _this = this;
			var input = this.newItem;

			if (input['name'] == '' || input['age'] == '' || input['profession'] == '' ) {
				this.hasError = false;
			} else {
				this.hasError = true;
				axios.post('/vueitems', input).then(function (response) {
					_this.newItem = { 'name': '', 'age': '', 'profession': '' };
					_this.getVueItems();
				});
				this.hasDeleted = true;
			}
		},

		editItem: function(){
			var i_val_1 = document.getElementById('e_id');
			var n_val_1 = document.getElementById('e_name');
			var a_val_1 = document.getElementById('e_age');
			var p_val_1 = document.getElementById('e_profession');

			axios.post('/edititems/' + i_val_1.value, {val_1: n_val_1.value, val_2: a_val_1.value,val_3: p_val_1.value })
			.then(response => {
				this.getVueItems();
				this.showModal=false
			});
			this.hasDeleted = true;

		},

		deleteItem: function deleteItem(item) {
			var _this = this;
			axios.post('/vueitems/' + item.id).then(function (response) {
				_this.getVueItems();
				_this.hasError = true, 
				_this.hasDeleted = false

			});
		}
	}
});