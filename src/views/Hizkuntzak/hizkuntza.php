<form id="languageForm" method="post">
    <select name="selectLang">
        <!-- PHPko logika honekin formularioan zein hizkuntza agertzen den aukeratuta erabakiko dugu -->
        <option value="eus" <?php
                            
                            if (isset($_POST['selectLang']) && $_POST['selectLang'] === 'eus') {
                                echo 'selected';
                            } elseif (!isset($_POST['selectLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'eus') {
                                
                                echo 'selected';
                            }
                            
                            ?>> EUS</option>
        <option value="es" <?php
                            
                            if (isset($_POST['selectLang']) && $_POST['selectLang'] === 'es') {
                                echo 'selected';
                            } elseif (!isset($_POST['selectLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'es') {
                                
                                echo 'selected';
                            }
                            
                            ?>> ES</option>
        <option value="en" <?php
                            if (isset($_POST['selectLang']) && $_POST['selectLang'] === 'en') {
                                echo 'selected';
                            } elseif (!isset($_POST['selectLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'en') {
                                
                                echo 'selected';
                            }
                            
                            ?>> EN</option>
    </select>
    <button><?= itzuli("aldatu") ?></button>
</form>