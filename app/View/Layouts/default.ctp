<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('managementlab');
		echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<!-- Fixed navbar -->
     <nav class="navbar navbar-default navbar-fixed-top">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="<?php echo $this->Html->url('/')?>">Management LAB</a>
         </div>
         <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav">
             <li class="active"><a href="<?php echo $this->Html->url('/')?>">Home</a></li>
             <li><a href="<?php echo $this->Html->url('/projects')?>">Progetti</a></li>
						 <li><a href="<?php echo $this->Html->url('/tasks')?>">Task</a></li>
						 <li><a href="<?php echo $this->Html->url('/users')?>">Risorse</a></li>
           </ul>

					 <ul class="nav navbar-nav navbar-right">
						 <li><a href="<?php echo $this->Html->url('/users/me')?>">Area Riservata</a></li>
						 <li>
							 <a href="#notifications">
								 <span class="glyphicon glyphicon-bell"></span> <span class="badge badge-red">3</span>
							 </a>
						 </li>
					 </ul>
         </div><!--/.nav-collapse -->
       </div>
     </nav>

		 <div class="container">
			 <div class="alert alert-success alert-dismissible" role="alert">
				 <?php echo $this->Flash->render(); ?>
			</div>
			<?php echo $this->fetch('content'); ?>
		</div>

		<footer class="footer">
 		 <div class="container">
 			 <p class="text-muted">Place sticky footer content here.</p>
 		 </div>
 		</footer>

	<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'); ?>
	<?php echo $this->Html->script('bootstrap.min'); ?>
        <?php echo $this->Html->script('managementlab'); ?>

</body>
</html>
