<!DOCTYPE html>
<html lang="eus">
    
    <?php
    require_once("../../require/header.php");
    ?>

    <center>
    <h2><?= itzuli("hasi1") ?></h2>
    <p><?= itzuli("hasi2") ?></p>
    </center>
    <main>
        <section class="hero">
            <a href="../Katalogo/katalogoa.php" class="btn"><?= itzuli("katalogoBotoia") ?></a>
            <h2 style=color:red;><?= itzuli("eskaintzak") ?></h2>
        </section>
        <section class="featured-offers">
            <div class="offer">
                <img src="../../../public/laptop.jpg" alt="Laptop en oferta">
                <h3>HP ProBook</h3>
                <p><?= itzuli("oferta1") ?></p>
                <p class="price">800€</p>
            </div>
            <div class="offer">
                <img src="../../../public/software.jpg" alt="Software en oferta">
                <h3>Microsoft Office 365</h3>
                <p><?= itzuli("oferta2") ?></p>
                <p class="price">35€</p>
            </div>
        </section>
    </main>

    <?php
    require_once("../../require/footer.php");
    ?>

</html>