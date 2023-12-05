<?php
include '../config.php';
include '../utils/db-connection.php';
include '../utils/functions.php';

$success_msg = isset($_GET['success']) ? $_GET['success'] : '';
$error_msg = isset($_GET['error']) ? $_GET['error'] : '';


//intialization

$id = filter_input(INPUT_GET, FILTER_VALIDATE_INT);

$category = [
    'id' => $id,
    'name' => '',
    'description' => '',
    'navigation' => false,
];

$errors = [
    'name' => '',
    'description' => '',
];

//collection & validation

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $submitted = isset($_GET['submit']) ? $_GET['submit'] : '';
    if(!$submitted === 'edit'){
        echo 'you are not authorized to access this resource';
        exit();
    }

    $category['name'] = $_POST['name'];
    $category['description'] = $_POST['description'];
    $category['navigation'] = $_POST['status'];

    //validate
    $errors['name'] = (trim($category['name']) !== '') ? '' : 'Name can`t be empty<br>';
    $errors['description'] = (trim($category['description']) !== '') ? '' : 'Description can`t be empty<br>';


    $invalid = implode($errors);


    if($invalid){
        header('Location:' . ADMIN_URL .'article-categories/create.php?error='.$invalid);
        exit;
    }else{
        $sql = 'INSERT INTO category(name, description, navigation) VALUES (:name, :description, :navigation)';
        $statement = $pdo->prepare($sql);
        $statement->execute(['name'=> $category['name'], 'description' => $category['description'], 'navigation' => $category['navigation']]);
        header('Location:' . ADMIN_URL . 'article-categories/index.php?success=Category added Successfully');
    }


}





include '../includes/admin-header.php';

?>

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
                        <?php print_r($error_msg); ?>
                    </div>
                <?php } ?>

                <div class="col-10">
                    <h3 class="card-title">Add New Category</h3>
                </div>
                <div class="col-2">
                    <a href="<?php echo ADMIN_URL . 'article-categories/index.php'?>" type="button" class="btn btn-block bg-gradient-primary btn-sm">Go Back</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-">
            <div class="col-md-12 mt-2">
                <!--                @if ($errors->any())-->
                <!--                <div class="alert alert-danger">-->
                <!--                    <ul>-->
                <!--                        @foreach ($errors->all() as $error)-->
                <!--                        <li>{{ $error }}</li>-->
                <!--                        @endforeach-->
                <!--                    </ul>-->
                <!--                </div>-->
                <!--                @endif-->
                <form action="<?php echo ADMIN_URL . 'article-categories/create.php'?>" method="POST">
                    <div class="row">
                        <div class="col-md-5 mt-2">
                            <div class="form-group">
                                <label for="exampleInputRounded0">Category Name <code>*</code></label>
                                <input type="text" class="form-control rounded-0" name="name" id="category_name" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Enter Description"></textarea>
                            </div>


                        </div>
                        <div class="col-md-5 ml-5 ">

                            <div class="form-group">
                                <label for="exampleSelectBorder">Navigation <code></code></label>
                                <select class="custom-select form-control-border" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>



                            <button type="submit" value="save" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

<?php include '../includes/admin-footer.php'; ?>