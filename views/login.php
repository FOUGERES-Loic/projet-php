<?php include __DIR__ . '/partials/header.php'; ?>
<div class='container'>
<div class='row'>
    <div class='col-md-3 bordure'>

    </div>
    <div class='col-md-6 bordure'>
        <form method='POST'>
            <div class='form-group'>
                <label for='inputLogin'>Login</label>
                <input type='text' name='login' class='form-control' id='inputLogin' placeholder='Login'>
            </div>
            <div class='form-group'>
                <label for='inputPassword'>Password</label>
                <input type='password' name='password' class='form-control' id='inputPassword' placeholder='Password'>
            </div>
            <div class='checkbox'>
                <label>
                    <input type='checkbox' name='keep'> Rester connecté
                </label>
            </div>
            <button type='submit' class='btn btn-default'>Envoyer</button>
        </form>
    </div>
</div>
<?php include __DIR__ . '/partials/footer.php'; ?>