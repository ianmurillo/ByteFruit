<!DOCTYPE html>
<html lang="eus">
    
    <?php
    require_once("../../require/header.php");
    ?>

    <center>
    <h2>Ofertas especiales en productos informaticos.</h2>
    <p>Descubra nuestras ofertas exclusivas en computadoras, software y más.</p>
    </center>
    <main>
        <section class="hero">
            <a href="../Katalogo/katalogoa.php" class="btn">Ver catalogo</a>
        </section>
        <section class="featured-offers">
            <div class="offer">
                <h2 style=color:red;>Ofertas</h2>
                <img src="../../../public/laptop.jpg" alt="Laptop en oferta">
                <h3>HP ProBook</h3>
                <p>Computadora de alto rendimiento con pantalla HD, procesador Intel Core i7 y 8 GB de RAM.</p>
                <p class="price">800€</p>
            </div>
            <div class="offer">
                <img src="../../../public/software.jpg" alt="Software en oferta">
                <h3>Microsoft Office 365</h3>
                <p>Una suscripción de un año que incluye Word, Excel, PowerPoint y más.</p>
                <p class="price">35€</p>
            </div>
        </section>
    </main>

    <?php
    require_once("../../require/footer.php");
    ?>

</html>