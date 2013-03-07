
(function(){

	window.App = {
		Models: {},
		Collections: {},
		Views: {},
		Routers: {}
	};

	/*
	|-----------------------------------------------------------------------------
	| Global App View
	|-----------------------------------------------------------------------------
	*/
	App.Models.App = Backbone.Model.extend({
		initialize : function(){

		}
	});


	/*
	|-----------------------------------------------------------------------------
	| HORSES
	|-----------------------------------------------------------------------------
	*/


	/*
	|-----------------------------------------------------------------------------
	| Single Horse Model
	|-----------------------------------------------------------------------------
	*/
	App.Models.Horse = Backbone.Model.extend({

		initialize : function(){
			console.log('horse initialized');
		},

		urlRoot : 'http://localhost/Dropbox/restserver/index.php/horses/horse'
	});

	/*
	|-----------------------------------------------------------------------------
	| Single Horse View
	|-----------------------------------------------------------------------------
	*/
	App.Views.Horse = Backbone.View.extend({
		tagName: 'tr',

		template: _.template($('#horse_tr').html()),

		events : {
			'click .editBtn' : 'editHorse'
		},

		editHorse: function(){
			var editHorseView = new App.Views.EditHorse({model: this.model});
			$('#editHorseBox').html(editHorseView.el);
		},

		render: function(){
			var template = this.template( this.model.toJSON());
			this.$el.html( template);
			return this;
		}
	});

	/*
	|-----------------------------------------------------------------------------
	| Horses collection
	|-----------------------------------------------------------------------------
	*/
	App.Collections.Horses = Backbone.Collection.extend({
		model: App.Models.Horse,
		url: 'http://localhost/Dropbox/restserver/index.php/horses/horsesall'
	});

	/*
	|-----------------------------------------------------------------------------
	| Horses Collection View
	|-----------------------------------------------------------------------------
	*/
	App.Views.Horses = Backbone.View.extend({
		tagName: 'tbody',

		initialize: function(){
			this.collection.on('change', this.render, this );
			this.collection.on('sync', this.render, this );
		},

		render: function(){
			$('#horsesTable tbody').empty();
			this.collection.each(this.addOne, this);
			console.log(this.el);
			return this;
		},
		addOne: function(horseModel){
			var horseView = new App.Views.Horse({model: horseModel});
			this.$el.append( horseView.render().el);
		}

	});

	/*
	|-----------------------------------------------------------------------------
	| Add Horse View
	|-----------------------------------------------------------------------------
	*/
	App.Views.AddHorse = Backbone.View.extend({
		el: $('#addHorseBox'),

		template: _.template($('#addHorseTemplate').html()),

		initialize: function(){
			this.render();
		},

		events: {
			'submit #addHorseForm': 'addHorse'
		},

		addHorse: function(e){
			e.preventDefault();
			var newHorse = this.collection.create({
				name:	this.$el.find('#addName').val(),
				type: this.$el.find('#addType').val(),
				color: this.$el.find('#addColor').val(),
				client: this.$el.find('#addClient').val(),
				image: this.$el.find('#addImage').val(),
				birthdate: this.$el.find('#addBirthdate').val()
			}, { silent: true } );

			newHorse.on('sync', function(model) {
				console.dir( newHorse.id );
				console.log(this.collection.toJSON());
			});
			this.$el.find('.closeBtn').trigger('click');

		},

		render: function(){
			var html =  this.template();
			this.$el.html(html);
			this.$el.append(this.$el);

			var clientsCollection = new App.Collections.Clients();
			clientsCollection.fetch().then(function(){
				var clientsSelect = new App.Views.ClientsSelect({collection: clientsCollection});
				$('#addHorseBox .clientsGroup .controls').empty().append(clientsSelect.el).find('select').attr({'name':'addClient'}).prepend('<option value"" selected>Select a client</oprtion>');
			});
			return this;
		}
	});

	/*
	|-----------------------------------------------------------------------------
	| Edit Horse View
	|-----------------------------------------------------------------------------
	*/
	App.Views.EditHorse = Backbone.View.extend({
		template: _.template($('#editHorseTemplate').html()),

		initialize: function(){
			this.render();
		},

		events: {
			'click .submitEditHorse'	: 'submit'
		},

		submit: function(e){
			e.preventDefault();
			this.model.save({
				name: this.$el.find('#editName').val(),
				color: this.$el.find('#editColor').val(),
				type: this.$el.find('#editType').val(),
				client: this.$el.find('#editClient').val(),
				image: this.$el.find('#editImage').val(),
				birthdate: this.$el.find('#editBirthdate').val()
			});
		},

		render: function(){
			var html =  this.template( this.model.toJSON() );
			var model = this.model;

			var clientsCollection = new App.Collections.Clients();
			clientsCollection.fetch().then(function(){
				var clientsSelect = new App.Views.ClientsSelect({collection: clientsCollection});
				$('#editHorseBox .clientsGroup .controls').empty().append(clientsSelect.el).find('select').attr({'name':'addClient'}).prepend('<option value selected>Select a client</oprtion>');
				$('#editHorseBox .clientsGroup .controls select').val(model.get('client'));
			});
			this.$el.html(html);
			return this;
		}
	});




	/*
	|-----------------------------------------------------------------------------
	| CLIENTS
	|-----------------------------------------------------------------------------
	*/

	/*
	|-----------------------------------------------------------------------------
	| Single Client Model
	|-----------------------------------------------------------------------------
	*/
	App.Models.Client = Backbone.Model.extend({

		initialize : function(){
			console.log('client initialized');
		},

		urlRoot : 'http://localhost/Dropbox/restserver/index.php/clients/client'
	});

	/*
	|-----------------------------------------------------------------------------
	| Clients collection
	|-----------------------------------------------------------------------------
	*/
	App.Collections.Clients = Backbone.Collection.extend({
		model: App.Models.Client,
		url: 'http://localhost/Dropbox/restserver/index.php/clients/clientsall'
	});

	/*
	|-----------------------------------------------------------------------------
	| Clients Collection Select View
	|-----------------------------------------------------------------------------
	*/
	App.Views.ClientsSelect = Backbone.View.extend({
		tagName: 'select',
		className: 'input-xlarge',
		id: 'addClient',

		initialize: function(){
			this.render();
		},

		render: function(){
			this.collection.each(this.addOne, this);
			return this;
		},
		addOne: function(clientModel){
			var clientView = '<option value="'+clientModel.get('id')+'">'+clientModel.get('name')+'</option>';
			this.$el.append(clientView);
		}
	});







	//new App.Router;
	Backbone.history.start();

	// populates all
	var horseCollection = new App.Collections.Horses();
	horseCollection.fetch().then( function(){
		var horsesTable =  new App.Views.Horses({collection: horseCollection});

		$('#horsesTable').append(horsesTable.render().el);
		var addHorseView = new App.Views.AddHorse({collection: horseCollection});

	});





// var horseCollection = new App.Collections.Horses([
//	{
//		name: 'Mariano',
//			color: 'Bayo'
//	},
//	{
//		name: 'Lobo',
//		color: 'Blanco'
//	}
//]);

	// var allhorsesview = new horses_view({ collection: horseCollection }).render();
	// $('#horses').append(allhorsesview.el);
	// console.log(horseCollection);

	// creates one horse by id fetch
	// window.horse = new horse({id:2});
	// horse.fetch();
	// console.log(horse);

	// var horse_v = new horses_view();
	//horses.add(horse)


	// window.horse = new horse({name:'jon'});
	// horse.save();
	// horse.get(1);

 App.Views.Tales = Backbone.Model.extend({});



})();