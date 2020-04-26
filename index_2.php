
<?php
if ((isset($_GET['page'])) && ($_GET['page']==="controller_wines") ){
  include("view/includes/top_page_wines.php");
}else if((isset($_GET['page'])) && ($_GET['page']==="controller_login") ){
  include("view/includes/top_page_login.php");
}else if((isset($_GET['page'])) && ($_GET['page']==="controller_order") ){
  include("view/includes/top_page_order.php");
}else if((isset($_GET['page'])) && ($_GET['page']==="controller_shop") ){
  include("view/includes/top_page_shop.php");
}else if((isset($_GET['page'])) && ($_GET['page']==="controller_cart") ){
  include("view/includes/top_page_cart.php");
}else{
  include("view/includes/top_page.php");

}
include("module/login/model/regenerate_session.php");
session_start();
regenerate_session();
?>
<?php include("view/includes/header.html"); ?>        

<body>

<?php 
      if(isset($_SESSION)&& $_SESSION['type']==='admin'){
        include("view/includes/menu/menu_admin.php"); 
      }else if(isset($_SESSION)&& $_SESSION['type']==='user'){
        include("view/includes/menu/menu_user.php"); 
      }else{
        include("view/includes/menu/menu.php");
      }
  ?>


  <!-- Header - set the background image for the header in the line below -->
 

 <?php include("view/includes/pages.php"); ?>        


  <!-- Footer -->
  <?php include("view/includes/footer.php"); ?>        

</body>

</html>
