<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Promena lozinke</h1>
        <br><br>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Trenutna lozinka: </td>
                    <td>
                        <input type="password" name="trenutna_lozinka" placeholder="Trenutna lozinka">
                    </td>
                </tr>
                <tr>
                    <td>Nova lozinka: </td>
                    <td>
                        <input type="password" name="nova_lozinka" placeholder="Nova lozinka">
                    </td>
                </tr>

                <tr>
                    <td>Potvrdi lozinku: </td>
                    <td>
                        <input type="password" name="potvrda_lozinka" placeholder="Ponovite novu lozinku">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Promeni lozinku" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<?php
//da li je kliknuto dugme izmeni
if (isset($_POST['submit'])) {

    //1.--UZMI PODATKE SA FORME
    $id = $_POST['id'];
    $trenutnaLozinka = md5($_POST['trenutna_lozinka']);
    $novaLozinka = md5($_POST['nova_lozinka']);
    $potvrdaLozinka = md5($_POST['potvrda_lozinka']);

    //2.--DA LI USER SA TIM KREDENCIJALIMA POSTOJI ILI NE
    $sql = "SELECT * FROM admin WHERE id = $id AND password = '$trenutnaLozinka'";
    //Izvrsavanje upita
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        //Da li ima takvog ili ne
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            //postoji
            if ($novaLozinka == $potvrdaLozinka) {
                $sql_pwd = "UPDATE admin 
                    SET password = '$novaLozinka'
                    WHERE id = $id";
                $res_pwd = mysqli_query($conn, $sql_pwd);
                if ($res_pwd == true) {
                    $_SESSION['change-pwd'] = "<div class = 'success'>Uspesno promenjena lozinka.</div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                } else {
                    $_SESSION['change-pwd'] = "<div class = 'error'>Greska prilikom promene lozinke.</div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                }
            } else {
                $_SESSION['pwd-not-match'] = "<div class = 'error'>Greska prilikom potvrde lozinke.</div>";
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        } else {
            //ne postoji: 
            $_SESSION['user-not-found'] = "<div class = 'error'>Ne postoji administrator sa unesenim kredencijalima.</div>";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }

    //3.--DA LI JE NOVA LOZINKA I POTVRDA NOVE LOZINKE ISTA

    //4.--PROMENI SIFRU KO JE SVE U REDU
}
?>
<?php include('partials/footer.php'); ?>