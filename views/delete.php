<?php include __DIR__ . '/partials/navigation.php'; ?>
    <div class='row'>
        <div class='col-md-12 bordure'>
            <h1>Page Delete</h1>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3 bordure'>
        </div>
        <div class='col-md-6 bordure'>
            <p>Voulez vous vraiment supprimer cet article? <?= $nom ?></p>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3 bordure'>
        </div>
        <div class='col-md-6 bordure'>
            <form method='POST'>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="non" checked>
                        Non
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="oui">
                        Oui
                    </label>
                </div>

                <button type='submit' class='btn btn-default'>Envoyer</button>
            </form>
        </div>
    </div>
<?php include __DIR__ . '/partials/footer.php'; ?>