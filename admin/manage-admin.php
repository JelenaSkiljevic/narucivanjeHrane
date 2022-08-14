    <?php
    include('partials/menu.php');
    ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Amin</h1>
            <!-- Dugme za dodavanje admina -->
            <br />
            <?php //mi smo kao dodali u add admin vrednsot toj sesiji u zavisnosti od njene uspesnosti.
            //a on ovde proverava da li je sesija setovana i ispisuje njenu vrednost ako jeste
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add']; //Prikazujemo poruku sesije
                unset($_SESSION['add']); //Sklanjamo poruku sesije kada se refreshuje
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if(isset($_SESSION['pwd-not-match'])){
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }

            if(isset($_SESSION['change-pwd'])){
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }
            ?>
            <br /><br />
            <a href="add-admin.php" class="btn-primary">Dodaj Admina</a>
            <br /><br /><br />
            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Ime i prezime</th>
                    <th>Korisnicko ime</th>
                    <th>Actions</th>
                </tr>

                <!-- Prikaz admina iz DB -->
                <?php
                $sql = "SELECT * FROM admin";
                $res = mysqli_query($conn, $sql);

                //Da li je upit izvrsen
                if ($res == TRUE) {
                    //brojimo redove da vidimo da li uopste imamo admine u bazi
                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                        $rb = 1;
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $imePrezime = $rows['imePrezime'];
                            $korisnickoIme = $rows['username'];
                ?>
                            <!-- Prikaz prikupljenih podataka -->
                            <!-- HTML kod za prikaz ovih admina -->
                            <tr>
                                <td><?php echo $rb++; ?></td>
                                <td><?php echo $imePrezime; ?></td>
                                <td><?php echo $korisnickoIme; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Promena lozinke</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Izmeni Admina</a>
                                    <!-- na ovaj nacin smo prosledili ID -->
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Obrisi Admina</a>
                                </td>
                            </tr>
                <?php
                        }
                    } else {
                        //baza je prazna

                    }
                }
                ?>

            </table>


        </div>

    </div>
    <!-- Main Content Section End -->

    <?php include('partials/footer.php'); ?>