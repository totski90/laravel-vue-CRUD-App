

new Vue({
	el: '#vue-wrapper',

	data: {
		items: [],
		item_id: '',
		hasError: true,
		hasDeleted: true,
		hasAgeError: true,
		showModal: false,
		p_name: '',
		p_age: '',    e_id: '',
		p_profession: '',
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

					toastr.success('Added successfully.');
				});				
			}
		},

		setVal(item_id, p_name,  p_age, p_profession) {
			this.item_id = item_id;
			this.p_name = p_name;
			this.p_profession = p_profession;
			this.p_age = p_age;
		},

		editItem: function(){			
			var name = document.getElementById('p_name');
			var age = document.getElementById('p_age');
			var profession = document.getElementById('p_profession');

			axios.post('/edititems/' + this.item_id, {p_name: name.value, p_age: age.value, p_profession: profession.value })
			.then(response => {
				this.getVueItems();			

				$('#'+this.item_id).modal('hide');
				$('.modal-backdrop').remove();
				toastr.success('Updated successfully.');			
			});

		},

		deleteItem: function deleteItem(item) {
			var _this = this;
			axios.post('/vueitems/' + item.id).then(function (response) {
				_this.getVueItems();				

				toastr.success('Deleted successfully.');
			});

		}
	}
});