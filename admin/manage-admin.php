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
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //Prikazujemo poruku sesije
                    unset($_SESSION['add']); //Sklanjamo poruku sesije kada se refreshuje
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

                <tr>
                    <td>1.</td>
                    <td>Jelena Skiljevic</td>
                    <td>jelena</td>
                    <td>
                        <a href="#" class="btn-secondary">Izmeni Admina</a>
                        <a href="#" class="btn-danger">Obrisi Admina</a>
                    </td>
                </tr>

                <tr>
                    <td>2.</td>
                    <td>Jelena Skiljevic</td>
                    <td>jelena</td>
                    <td>
                        <a href="#" class="btn-secondary">Izmeni Admina</a>
                        <a href="#" class="btn-danger">Obrisi Admina</a>
                    </td>
                </tr>

                <tr>
                    <td>3.</td>
                    <td>Jelena Skiljevic</td>
                    <td>jelena</td>
                    <td>
                        <a href="#" class="btn-secondary">Izmeni Admina</a>
                        <a href="#" class="btn-danger">Obrisi Admina</a>
                    </td>
                </tr>
            </table>


        </div>

    </div>
    <!-- Main Content Section End -->

    <?php include('partials/footer.php'); ?>