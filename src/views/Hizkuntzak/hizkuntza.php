<form id="languageForm" method="post">
    <select name="aukeratutakoHizkuntza" id="hizkuntza">
        <option value="eus" <?php                        
                            if (isset($_POST['aukeratutakoHizkuntza']) && $_POST['aukeratutakoHizkuntza'] === 'eus') {
                                echo 'selected';
                            } elseif (!isset($_POST['aukeratutakoHizkuntza']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'eus') {
                                
                                echo 'selected';
                            }
                            
                            ?>> EUS</option>
        <option value="es" <?php
                            
                            if (isset($_POST['aukeratutakoHizkuntza']) && $_POST['aukeratutakoHizkuntza'] === 'es') {
                                echo 'selected';
                            } elseif (!isset($_POST['aukeratutakoHizkuntza']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'es') {
                                
                                echo 'selected';
                            }
                            
                            ?>> ES</option>
        <option value="en" <?php
                            if (isset($_POST['aukeratutakoHizkuntza']) && $_POST['aukeratutakoHizkuntza'] === 'en') {
                                echo 'selected';
                            } elseif (!isset($_POST['aukeratutakoHizkuntza']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'en') {
                                
                                echo 'selected';
                            }
                            
                            ?>> EN</option>
    </select>
    <button id="aldatu"><?= itzuli("aldatu") ?></button>
</form>