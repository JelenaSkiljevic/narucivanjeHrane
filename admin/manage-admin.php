    <?php
    include('partials/menu.php');
    ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Amin</h1>
            <!-- Dugme za dodavanje admina -->
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