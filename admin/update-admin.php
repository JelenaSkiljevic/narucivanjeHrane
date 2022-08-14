<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Izmeni Admina</h1>
        <br><br>

        <?php
            //1/--Getovanje IDa izabranog admina
            $id = $_GET['id'];
            //2.-- SQL query
            $sql = "SELECT * FROM admin WHERE id = $id";
            $res = mysqli_query($conn, $sql);
            if($res == TRUE){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    //DETALJI
                    $row = mysqli_fetch_assoc($res);
                    $imePrezime = $row['imePrezime'];
                    $username = $row['username'];
                    $password = $row['password'];
                }else{
                     //VRATI NA POCETNU
                     header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }else{
                    

            }
        ?>

        <form action="" method="POST">
            <table class "tbl-30">
                <tr>
                    <td>Ime i Prezime: </td>
                    <td>
                        <input type="text" name="ime_prezime" value="<?php echo $imePrezime; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Korisnicko ime: </td>
                    <td>
                        <input type="text" name="korisnicko_ime" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    //menjamo samo ako je klinknuto dugme
    if(isset($_POST['submit'])){
        //uzimanje svih vrednosti sa forme za update
        $id = $_POST['id'];
        $imePrezime = $_POST['ime_prezime'];
        $username = $_POST['korisnicko_ime'];
        
        $sql = "UPDATE admin SET imePrezime = '$imePrezime', username = '$username' WHERE id = '$id'";
        $res = mysqli_query($conn, $sql);
        if($res == TRUE){
            $_SESSION['update'] = "<div class = 'success'>Uspesno izmenjen administrator</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            $_SESSION['update'] = "<div class = 'error'>Greska prilikom izmene administratora</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>
<?php include('partials/footer.php'); ?>