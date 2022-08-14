<?php
    include('../config/constants.php');
    //1.--Uzimamo ID admina kog zelimo da izbrisemo
     $id = $_GET['id'];
     
    //2.--SQL upit za brisanje admina
    $sql = "DELETE FROM admin WHERE id = $id";
    $res = mysqli_query($conn,$sql);
    if($res == TRUE){
        //SESSION var za prikaz poruke na stanici
        $_SESSION['delete'] = "<div class = 'success'>Uspesno obrisan admin</div>";
        //Preusmeravanje
        //3.--Redirect na ManageAdmin page sa porukom USPESNO/NEUSPESNO
        header("location:".SITEURL.'admin/manage-admin.php');
    }else{
        $_SESSION['delete'] = "<div class = 'error'>Greska prilikom brisanja admina</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    
?>