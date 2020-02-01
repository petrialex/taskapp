<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                padding:10px;
                right: 10px;
                top: 18px;
				height:100px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			 body {
				font-family:helvetica, arial;
				 font-size:12px
			  }
			.scrumboard{
				margin:0 auto;
				width:90%;
			}
			h1{
				margin-left:20px;
				font-size:2rem;
			}
			  .column {
				width: 20%;
				float: left;
				border: solid 1px black;
				min-height:600px;
				border-radius:4px;
				margin-left:5px;
			  }
			  .portlet {
				margin: 0 1em 1em 0;
				padding: 0.3em;
			  }
			  .portlet-header {
				padding: 0.2em 0.3em;
				margin-bottom: 0.5em;
				position: relative;
			  }
			  .portlet-toggle {
				position: absolute;
				top: 50%;
				right: 0;
				margin-top: -8px;
			  }
			  .portlet-content {
				padding: 0.4em;
			  }
			  .portlet-placeholder {
				border: 1px dotted black;
				margin: 0 1em 1em 0;
				height: 50px;
			  }
			  .left-bar {
				  width:20%;
				  height:100%;
				  float:left;
			  }
			  
        </style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
        <div class="full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content row">
				<div class="left-bar col-md2">
					<p></p>
				</div>
                <div class="scrumboard ">
					<div class="column flex">
					 <!-- todo -->
						<h1>Todo</h1>
					  <div class="portlet">
						<div class="portlet-header">Task</div>
						<div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
					  </div>
					 
					  <div class="portlet">
						<div class="portlet-header">Task</div>
						<div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
					  </div>
					 
					</div>
					 
					<div class="column flex">
					  <!-- ongoing -->
						<h1>In Progress</h1>

					  <div class="portlet">
						<div class="portlet-header">Task</div>
						<div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
					  </div>
					 
					</div>
					 


						
						
					<div class="column flex">
					   <!-- done -->
						<h1>Testing</h1>

					  <div class="portlet">
						<div class="portlet-header">Task</div>
						<div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
					  </div>
					 
					  <div class="portlet">
						<div class="portlet-header">Task</div>
						<div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
					  </div>
					 
					</div>
						
					<div class="column flex">
					   <!-- done -->
						<h1>Done</h1>

					  <div class="portlet">
						<div class="portlet-header">Task</div>
						<div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
					  </div>
					 
					  <div class="portlet">
						<div class="portlet-header">Task</div>
						<div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
					  </div>
					 
					</div>


						
					</div>
            </div>
        </div>
    </body>
	<script>
	 $(function() {
		$( ".column" ).sortable({
		  connectWith: ".column",
		  handle: ".portlet-header",
		  cancel: ".portlet-toggle",
		  placeholder: "portlet-placeholder ui-corner-all"
		});
	 
		$( ".portlet" )
		  .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
		  .find( ".portlet-header" )
			.addClass( "ui-widget-header ui-corner-all" )
		   
	 
		$( ".portlet-toggle" ).click(function() {
		  var icon = $( this );
		  icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
		  icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
		});
	  });
	</script>
</html>
