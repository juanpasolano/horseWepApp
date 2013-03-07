<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie7"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=1024, maximum-scale=2" />
  <title></title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	<style>
	.mainWrapper{
		width: 95%;
		margin: 0 auto;
	}
	</style>

</head>
<body>


<div class="mainWrapper">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container" style="width: auto;">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Ernesto Rojas Vet</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Stallions</a></li>
						<li><a href="#">Mares</a></li>
						<li><a href="#">Clients</a></li>
					</ul>
					<ul class="nav pull-right">
						<form class="navbar-search pull-left" action="">
							<input type="text" class="search-query span2" placeholder="Search">
						</form>
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div>


	<a href="#AddHorse" role="button" data-toggle="modal" class="btn btn-primary">Create new Horse</a>

	<hr class="bs-docs-separator">

	<table class="table table-striped table-bordered" id="horsesTable">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Type</th>
				<th>Color</th>
				<th>Client</th>
				<th>Actions</th>
			</tr>
		</thead>
		<!-- APPEND: The horses -->
	</table>

</div>



	<div id="editHorseBox"><!-- APPEND: The container where it appends --></div>
	<div id="addHorseBox"><!-- APPEND: The container where it appends --></div>


	<!--
	**********************************
	 SINGLE HORSE TEMPLATE
	*********************************
	-->
	<script id="horse_tr" type="text/template">
		<td></td>
		<td><%= name %></td>
		<td><%= type %></td>
		<td><%= color %></td>
		<td><%= client %></td>
		<td>
			<a href="#" class="btn btn-mini btn-success"><i class="icon-search  icon-white"></i></a>
			<a href="#" class="btn btn-mini btn-success"><i class="icon-plus-sign  icon-white"></i></a>
			<a href="#editHorse<%= id %>" role="button"  data-toggle="modal" class="btn btn-mini btn-primary editBtn"><i class="icon-pencil icon-white"></i></a>
			<a href="#" class="btn btn-mini btn-danger"><i class="icon-trash  icon-white"></i></a>
		</td>
	</script>
<!--
	**********************************
	 ADD HORSE TEMPLATE
	*********************************
	-->
	<script id="addHorseTemplate" type="text/template">
		<div id="AddHorse" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="AddHorseLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="AddHorseLabel">Create new horse</h3>
		  </div>
		  <div class="modal-body">
		    <form action="" class="form-horizontal" id="addHorseForm">
		    	<fieldset>
		    		<div class="control-group">
							<label class="control-label" for="addName">Name</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="addName" name="addName" value="">
							</div>
						</div>
		    		<div class="control-group">
							<label class="control-label" for="addType">Type</label>
							<div class="controls">
								<select id="addType" name="addType" class="input-xlarge">
									<option value="">Select type</option>
									<option value="1">Donnor</option>
									<option value="2">Mother</option>
									<option value="3">Stallion</option>
									<option value="4">Receptor</option>
								</select>
							</div>
						</div>
		    		<div class="control-group">
							<label class="control-label" for="addColor">Color</label>
							<div class="controls">
								<select id="addColor" name="addColor" class="input-xlarge">
									<option value="">Select Color</option>
									<option value="1">Yellow</option>
									<option value="2">Purple</option>
									<option value="3">Black</option>
									<option value="4">Spotted</option>
								</select>
							</div>
						</div>
		    		<div class="control-group clientsGroup">
							<label class="control-label" for="addClient">Client</label>
							<div class="controls">
								<select id="addClient" name="addClient" class="input-xlarge">
									<option value="">Select Client/Client</option>
									<option value="1">Fransisco Mera</option>
									<option value="2">Mertino Praser</option>
									<option value="3">Joao Girberto</option>
									<option value="4">Marissa Tross</option>
								</select>
							</div>
						</div>
		    		<div class="control-group">
							<label class="control-label" for="addBirthdate">Birthdate</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="addBirthdate" name="addBirthdate">
							</div>
						</div>
		    		<div class="control-group">
							<label class="control-label" for="addImage">Image</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="addImage" name="addImage">
							</div>
						</div>
		  <div class="modal-footer">
		    <button class="btn closeBtn" data-dismiss="modal" aria-hidden="true">Close</button>
		    <input type="submit" class="btn btn-primary submitAddHorse" value="Save changes">
		  </div>
		    	</fieldset>
		    </form>
		  </div>
		</div>
	</script>

	<!--
	**********************************
	 EDIT HORSE TEMPLATE
	*********************************
	-->

	<script id="editHorseTemplate" type="text/template">
		<div id="editHorse<%= id %>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editHorseLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="editHorseLabel">Edit horse: <%= name %></h3>
		  </div>
		  <div class="modal-body">
		    <form action="" class="form-horizontal">
		    	<fieldset>
		    		<div class="control-group">
							<label class="control-label" for="editName">Name</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="editName" name="editName" value="<%= name %>">
							</div>
						</div>
		    		<div class="control-group">
							<label class="control-label" for="editType">Type</label>
							<div class="controls">
								<select id="editType" name="editType" class="input-xlarge">
									<option value="">Select type</option>
									<option value="1" <% if (type == '1') { %>selected="selected"<% } %>>Donnor</option>
									<option value="2" <% if (type == '2') { %>selected="selected"<% } %> >Mother</option>
									<option value="3" <% if (type == '3') { %>selected="selected"<% } %> >Stallion</option>
									<option value="4" <% if (type == '4') { %>selected="selected"<% } %> >Receptor</option>
								</select>
							</div>
						</div>
		    		<div class="control-group">
							<label class="control-label" for="editColor">Color</label>
							<div class="controls">
								<select id="editColor" name="editColor" class="input-xlarge">
									<option value="">Select Color</option>
									<option value="1" <% if (color == '1') { %>selected="selected"<% } %>>Yellow</option>
									<option value="2" <% if (color == '2') { %>selected="selected"<% } %> >Purple</option>
									<option value="3" <% if (color == '3') { %>selected="selected"<% } %> >Black</option>
									<option value="4" <% if (color == '4') { %>selected="selected"<% } %> >Spotted</option>
								</select>
							</div>
						</div>
		    		<div class="control-group clientsGroup">
							<label class="control-label" for="editClient">Client</label>
							<div class="controls">
								// <select id="editClient" name="editClient" class="input-xlarge">
								// 	<option value="">Select Client/Client</option>
								// 	<option value="1" <% if (client == '1') { %>selected="selected"<% } %> >Fransisco Mera</option>
								// 	<option value="2" <% if (client == '2') { %>selected="selected"<% } %> >Mertino Praser</option>
								// 	<option value="3" <% if (client == '3') { %>selected="selected"<% } %> >Joao Girberto</option>
								// 	<option value="4" <% if (client == '4') { %>selected="selected"<% } %> >Marissa Tross</option>
								// </select>
							</div>
						</div>
		    		<div class="control-group">
							<label class="control-label" for="editBirthdate">Birthdate</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="editBirthdate" name="editBirthdate">
							</div>
						</div>
		    		<div class="control-group">
							<label class="control-label" for="editImage">Image</label>
							<div class="controls">
								<input type="text" class="input-xlarge" id="editImage" name="editImage">
							</div>
						</div>
		    	</fieldset>
		    </form>
		  </div>
		  <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		    <button class="btn btn-primary submitEditHorse" data-dismiss="modal" aria-hidden="true">Save changes</button>
		  </div>
		</div>
	</script>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/underscore.js"></script>
	<script type="text/javascript" src="js/backbone.js"></script>
	<script type="text/javascript" src="js/backbone.structure.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>




</body>
</html>