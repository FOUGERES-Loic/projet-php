<nav class='navbar navbar-default'>
    <div class='container-fluid'>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
                <span class='sr-only'>Toggle navigation</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='../index.php'>Base</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
            <ul class='nav navbar-nav'>
                <li class='<?= $menuService->isActive('index.php');?>'><a href='../index.php'>Index</a></li>
                <li class='<?= $menuService->isActive('create.php');?>'><a href='../create.php'>Ajouter</a></li>
                <?php
                /**
                 * @var Entity\Type $type
                 */
                foreach ($listeTypes as $type): ?>
                    <li class='<?= $menuService->isActive('index.php?type='.$type->getId().'&'.$type->getName());?>'>
                        <a href=<?= '../index.php?type='.$type->getId() ?>&<?= $type->getName() ?>><?= $type->getName().'s' ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li>
                    <form class='navbar-form' method='POST'>
                        <div class='form-group'>
                            <input type='text' name='recherche' class='form-control' placeholder='Rechercher'
                                   value="<?= isset($search) ? $search : '' ?>">
                        </div>
                        <button type='submit' class='btn btn-default'>Envoyer</button>
                    </form>
                </li>
                <li><a href='../logout.php'>Se déconnecter</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>