<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5"><?= $view_bag['title'] ?></h1>
        </div>
    </div>
    <div style="display: flex; width: 80vw; margin: auto; justify-content:flex-end; margin: 50px 0;">
        <button><a href="admin/index.php">Admin</a></button>
    </div>
    <div class="row">
        <form class="form-inline" action="" method="GET">
            <div class="form-group">
                <input type="text" name="search" id="search" />
                <input type="submit" value="search" />
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-striped">
            <tr>
                <th>Term</th>
                <th>Definition</th>
            </tr>
            <?php foreach ($model as $item) : ?>
                <tr>
                    <td><a href="detail.php?term=<?= $item->id ?>"><?= $item->term ?></td>
                    <td>
                        <?php
                        if (strlen($item->definition) >= 60) {
                            echo substr($item->definition, 0, 60) . "<a href='detail.php?term=$item->id ?>'>    continue reading...</a>";
                        } else {
                            echo $item->definition;
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>