<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Dodavanje Admina</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add'])){ //Proveravamo da li je session set
                echo $_SESSION['add']; //Prikazujemo poruku sesije
                unset($_SESSION['add']); //Uklanjamo poruku sesije
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Ime i prezime: </td>
                    <td><input type="text" name="Ime_Prezime" placeholder="Ime Prezime"></td>
                </tr>
                <tr>
                    <td>Korisnicko ime: </td>
                    <td><input type="text" name="Korisnicko_Ime" placeholder="korisnickoIme"></td>
                </tr>
                <tr>
                    <td>Lozinka: </td>
                    <td><input type="password" name="Lozinka" placeholder="Lozinka"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
//prosledivanje vrednosti forme i cuvanje u bazi
//Proveriti da li je submit dugme kliknuto 
if (isset($_POST['submit'])) { //ovo proverava da li je dugme pritisnuto
    //ako jeste kliknuto
    //1.--uzimamo podatke sa forme
    $ime_prezime = $_POST['Ime_Prezime'];
    $korisnicko_ime = $_POST['Korisnicko_Ime'];
    $lozinka = md5($_POST['Lozinka']); //neka predlozena enkripcija

    //2.--SQL upit za cuvanje admina
    $sql = "INSERT INTO admin SET imePrezime = '$ime_prezime',
        username = '$korisnicko_ime',
        password = '$lozinka'";
    
    //3--Izvrsavanje SQL upita i cuvanje podataka
    $res = mysqli_query($conn, $sql) or die(mysqli_query()); 
    //sadrzace T/F da li je uspesno. Ako ne uspe prekinuce ovim die

    //4--Provera da li je uspesno sacuvano
    if($res==TRUE){
        //USPESNO
        //Radicemo sa SESIJOM
        //Kreiramo sesion variablu
        $_SESSION['add'] = "<div class = 'success'>Novi admin je uspesno dodat</div>";
        //Redirect page: Hocemo d nas vrati na ovu stranicu
        header("location:".SITEURL.'admin/manage-admin.php');
    }else{
        //FAIL
        $_SESSION['add'] = "<div class = 'error'>Greska prilikom dodavanja novog administratora</div>";
        //Redirect page: Hocemo d nas vrati na ovu stranicu
        header("location:".SITEURL.'admin/add-admin.php');
        

    }
    
}

?>