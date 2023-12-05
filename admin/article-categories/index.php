
<?php
    include '../utils/db-connection.php';
    include '../utils/functions.php';
    include '../config.php';

    $success_msg = isset($_GET['success']) ? $_GET['success'] : '';
    $error_msg = isset($_GET['error']) ? $_GET['error'] : '';

    $sql = 'SELECT id, name, navigation FROM category';
    $statement = $pdo->query($sql);
    $categories = $statement->fetchAll();


    include '../includes/admin-header.php';
?>

<form action="enhanced-results.html">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Result Type:</label>
                        <select class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                            <option>Text only</option>
                            <option>Images</option>
                            <option>Video</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Sort Order:</label>
                        <select class="select2" style="width: 100%;">
                            <option selected>ASC</option>
                            <option>DESC</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Order By:</label>
                        <select class="select2" style="width: 100%;">
                            <option selected>Title</option>
                            <option>Date</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!--Search Form Ends HEre -- Need to make it Workable and needs some styling Customization-->

<div class="card">

    <div class="card-header">
        <div class="row">
            <?php if($success_msg){ ?>
                <div class="alert alert-success">
                    <?php print_r($success_msg); ?>
                </div>
            <?php } ?>
            <?php if($error_msg) { ?>
                <div class="alert alert-danger">
                    <?php print_r($success_msg); ?>
                </div>
            <?php } ?>
            <div class="col-10">
                <h3 class="card-title">Article Categories</h3>
            </div>
            <div class="col-2">
                <a href="<?php echo ADMIN_URL . 'article-categories/create.php'?>" type="button" class="btn btn-block bg-gradient-primary btn-sm">Create New Cateory</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 10px">S.No</th>
                <th>Category Name</th>
                <th>Navigation</th>
                <th>Created By</th>
                <th>Status</th>
                <th >Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($categories){
            foreach($categories as $category){ ?>
            <tr>
                <td>1.</td>
                <td><?php echo html_escape($category['name']); ?></td>
                <td>1</td>
                <td>Admin</td>
                <td></td>
                <td>
                    <form action="<?php echo ADMIN_URL . 'article-categories/edit.php' ?>" method="GET">
                        <input type="hidden" name="id" value=<?php echo $category['id']; ?>>
                        <button type="submit" class="border-transparent fas fa-edit padding: 0!important;"" value="edit"> </i></button>
                    </form>
                    <form action="<?php echo ADMIN_URL . 'article-categories/index.php' ?>">
                        <input type="hidden" name="id" value=<?php echo $category['id']; ?>>
                        <button type="submit" class="btn btn-link text-danger" value="delete" onclick="return confirm('Are you sure you want to delete this Class?');">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>

           <?php } } ?>
            </tbody>
        </table>
        <div class="p-3">
            Pagination will go here
        </div>
    </div>
    <!-- /.card-body -->
</div>


<?php include '../includes/admin-footer.php';  ?>







