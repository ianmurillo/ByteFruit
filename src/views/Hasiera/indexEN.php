<!DOCTYPE html>
<html lang="eus">
    
    <?php
    require_once("../../require/header.php");
    ?>

    <center>
    <h2>Special offers on informatics products</h2>
    <p>Discover our exclusive deals on computers, software and more.</p>
    </center>
    <main>
        <section class="hero">
            <a href="../Katalogo/katalogoa.php" class="btn">See the catalog</a>
        </section>
        <section class="featured-offers">
            <div class="offer">
                <h2 style=color:red;>Offers</h2>
                <img src="../../../public/laptop.jpg" alt="Laptop en oferta">
                <h3>HP ProBook</h3>
                <p>High-performance computer with HD screen, Intel Core i7 processor and 8 GB of RAM.</p>
                <p class="price">800$</p>
            </div>
            <div class="offer">
                <img src="../../../public/software.jpg" alt="Software en oferta">
                <h3>Microsoft Office 365</h3>
                <p>A one-year subscription that includes Word, Excel, PowerPoint and more.</p>
                <p class="price">35$</p>
            </div>
        </section>
    </main>

    <?php
    require_once("../../require/footer.php");
    ?>

</html>