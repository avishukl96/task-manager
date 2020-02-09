<html>
 <head>
   <!-- add your javascript includes here -->
   <!-- add your css includes here -->
   <!-- etc -->
 </head>

 <body>

 <div id='header'>
    <!-- include your header view here -->
    <?php $this->load->view('template/header'); ?>
 </div>

 <div id='whateverworks'>
   <?= $contents ?>
 </div>

 <div id='footer'>
    <!-- include your footer view here -->
    <?php $this->load->view('template/footer'); ?>
 </div>
 
 </body>

</html>