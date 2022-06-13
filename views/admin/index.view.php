<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5"><?= $view_bag['title'] ?></h1>
        </div>
    </div>
    <div style="display: flex; width: 80vw; margin: auto; justify-content:flex-end; margin: 50px 0;">
        <button><a href="authentication/logout.php">LOGOUT</a></button>
    </div>
    <div class="row" style="margin-bottom: 30px;">
        <a href="create.php">Create New Term</a>
    </div>
    <div class="row">
        <table class="table table-striped">
            <tr>
                <th>Term</th>
                <th>Definition</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($model as $item) : ?>
                <tr>
                    <td><?= $item->term ?></td>
                    <td>
                        <?php
                        if (strlen($item->definition) >= 60) {
                            echo substr($item->definition, 0, 60) . "..........";
                        } else {
                            echo $item->definition;
                        }
                        ?>
                    </td>
                    <td><a href="edit.php?key=<?= $item->id ?>">Edit</a></td>
                    <td><a href="delete.php?key=<?= $item->id ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>