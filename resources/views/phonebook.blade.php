<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>PhoneBook App</title>

	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
		table td i.alert{
			padding: 2px;
		}
		.input-danger{
			border-color: #a94442;
		}

		.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
 
 /* margin: 0px auto;*/
  padding: 0px 0px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-header {
    /* background-color: #f00; */
    /* position: absolute; */
    padding: unset;
    /*border-bottom: 2px solid #111;*/
}
.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}


.alert {
    padding: 15px;
     margin-bottom: unset; 
    border: 1px solid transparent;
     border-radius: unset; 
}

button.modal-default-button {
    margin-left: 10px;
}



.col-md-offset-2 {
    margin:0px auto;


	</style>
</head>
<body>
	<div id="app">
<Myheader></Myheader>

<div class="container">
	 <router-view></router-view>
</div>

<Myfooter></Myfooter>
	 </div>


<script src="{{asset('js/app.js')}}"></script>


</body>
</html>