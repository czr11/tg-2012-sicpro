<div class="header">
				<div class="header_resize">

				</div>
			</div>
<div class="principal">

	<div class="resumen">
		
		<p> SICPRO. Sistema Informatico para control y seguimiento de proyectos para la Direcció General de ORenamiento Foresta, Cuenca y Riego del Ministerio de Agricultura y Ganadería</p>
		
		<!--<div style="margin: 10px 30px 10px; width: 500px; height: 200px;">
			
			<img src="../img/login/robyn.jpg" name="cube"  border=0 style="filter:progid:DXImageTransform.Microsoft.Stretch(stretchStyle='PUSH')">
			
		</div>-->
		
		<div id="slides">
            <div class="slides_container">
                <div class="slide">
						<a href="#" title="titulo" target="_blank"><img src="../img/login/robyn.jpg" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p>Robyn!</p>
						</div>
				</div>
				<div class="slide">
						<a href="#" title="titulo" target="_blank"><img src="../img/login/mujeres2.jpg" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p>Anyone!</p>
						</div>
				</div>
				<div class="slide">
						<a href="#" title="titulo" target="_blank"><img src="../img/login/miley.gif" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p>Miley!</p>
						</div>
				</div>
				<div class="slide">
						<a href="#" title="titulo" target="_blank"><img src="../img/login/katy.gif" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p>Katy!</p>
						</div>
				</div>
                
            </div>
            <a href="#" class="prev"><img src="../img/login/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
			<a href="#" class="next"><img src="../img/login/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
        </div>
		<!--<img src="../img/login/example-frame.png" width="550" height="250" alt="Example Frame" id="frame">-->
	</div>
	
	<div class="container">
		
		<section class="login">
	    	<h1>iniciar sesion</h1>
	    	
	      	<?php echo $this->Form->create('User'); ?>
	      	
	      	<!--<?php echo $this->Session->flash('auth'); ?>-->
	        <?php echo $this->Session->flash(); ?>
	      	
	      	<?php $this->Form->inputDefaults(array('label' => false,'div' => false,)); ?>
		    
		    
		    
		    <p><?php echo $this->Form->input('username', array(
		    	'id' => 'username',
		    	'placeholder'=>'Nombre de Usuario',
				'autofocus' => 'autofocus')); ?></p>
		    
		    <!--
		    <script type="text/javascript">
						var username = new LiveValidation( "username", { validMessage: " " } );
						username.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			</script>
		    -->
		    
		    
		    <p><?php echo $this->Form->input('password', array(
		    	'id' => 'password',
		    	'placeholder'=>'Contraseña')); ?></p>
		    
		    <!--
		    <script type="text/javascript">
						var password = new LiveValidation( "password", { validMessage: " " } );
						password.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			</script>
			-->
			
		    <p class="remember_me">
				<label>
			    	<input type="checkbox" name="remember_me" id="remember_me">
			        Recordarme en esta computadora
			    </label>
		    </p>
		    
		    <p class="submit">
	        	<?php echo $this->Form->end(array('label' => 'Login', 'name' => 'commit', 'div' => false)); ?>
	        	<?php //echo $this->Form->end(__('Login'), array( 'name'=>'commit')); ?>
	        </p>
	        
	        
	    
	    </section>
	
	    <section class="login-help">
	      <p>¿Ha olvidado su contraseña? Contacte al Administrador.</p>
	    </section>
	</div>

</div>

<div class="piedepagina">
  <section class="about">
    <!--<p class="links">
      <a href="http://www.webinterfacelab.com/snippets/login-form" target="_parent">View Article</a>
      <a href="http://www.webinterfacelab.com/snippets/login-form.zip" target="_parent">Download Snippet</a>
    </p> -->
    <p class="author">
      <a href="#" target="_blank" rel="nofollow"> &copy; 2012 SICPRO </a><br>
      <a href="#" target="_blank" rel="nofollow">Propiedad de la Universidad de El Salvador</a><br>
      
  </section>
</div>

			<style scoped>

 				.LV_validation_message{
				    /*font-weight:bold;*/
				    margin:0 0 0 5px;
				}
				
				.LV_valid {
				    color:#00CC00;
				    margin-left: 10px;
				}
					
				.LV_invalid {
				    color:#CC0000;
				    
					clear:both;
               		display:inline-block;
               		margin-left: 20px; 
               
				}
				
				.message {
				    color:#CC0000;
				    
					clear:both;
               		display:inline-block;
               		margin-left: 10px; 
               
				}
/*				    
				.LV_valid_field,
				input.LV_valid_field:hover, 
				input.LV_valid_field:active,
				textarea.LV_valid_field:hover, 
				textarea.LV_valid_field:active {
				    border: 1px solid #00CC00;
				}
				    
				.LV_invalid_field, 
				input.LV_invalid_field:hover, 
				input.LV_invalid_field:active,
				textarea.LV_invalid_field:hover, 
				textarea.LV_invalid_field:active {
				    border: 1px solid #CC0000;
				}
*/                

            </style>


<script>
	
			$("input").focusin(function () {
  						$("#flashMessage").fadeOut(5000);
  				});
                
  /*              
              
var specifyimage=new Array() //Your images
specifyimage[0]="../img/login/robyn.jpg"
specifyimage[1]="../img/login/mujeres2.jpg"
specifyimage[2]="../img/login/katy.gif"

var delay=3000 //3 seconds

//Counter for array 
var count =1;

var cubeimage=new Array()
for (i=0;i<specifyimage.length;i++){
cubeimage[i]=new Image()
cubeimage[i].src=specifyimage[i]
}

function movecube(){
if (window.createPopup)
cube.filters[0].apply()
document.images.cube.src=cubeimage[count].src;
if (window.createPopup)
cube.filters[0].play()
count++;
if (count==cubeimage.length)
count=0;
setTimeout("movecube()",delay)
}

window.onload=new Function("setTimeout('movecube()',delay)")

*/



                $('#slides').slides({
				preload: true,
				preloadImage: '...img/login/spinner.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
            
	
</script>