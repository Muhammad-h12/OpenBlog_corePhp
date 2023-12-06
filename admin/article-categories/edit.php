<?php
include '../config.php';
include '../utils/db-connection.php';
include '../utils/functions.php';

$success_msg = isset($_GET['success']) ? $_GET['success'] : '';
$error_msg = isset($_GET['error']) ? $_GET['error'] : '';


//intialization

$id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);

if ($id){

    $sql = 'SELECT id, name, navigation, description FROM category WHERE id = :id;';
    $statement = $pdo->prepare($sql);
    $statement->execute(['id'=> $id]);
    $fetchedCategory = $statement->fetch();

    if(!$fetchedCategory){
            header('Location:' . ADMIN_URL . 'article-categories/index.php?error=Category not found');
    }
}


$category = [
    'id' => $fetchedCategory['id'],
    'name' => '',
    'description' => '',
    'navigation' => false,
];

$errors = [
    'name' => '',
    'description' => '',
    'warning' => '',
];

//collection & validation

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $category['name'] = $_POST['name'];
    $category['description'] = $_POST['description'];
    $category['navigation'] = $_POST['status'];
    $category['id'] = $_POST['id'];




    //validate
    $errors['name'] = (trim($category['name']) !== '') ? '' : 'Name can`t be empty<br>';
    $errors['description'] = (trim($category['description']) !== '') ? '' : 'Description can`t be empty<br>';
//    $errors['warning'] = (filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT)) ? '' : 'Id is not valid';


    $invalid = implode($errors);


    if($invalid){
        header('Location:' . ADMIN_URL .'article-categories/edit.php?error='.$invalid);
        exit;
    }else{
        try{

            $sql = 'UPDATE category SET name = :name, description = :description, navigation = :navigation WHERE id=:id;';
            $statement = $pdo->prepare($sql);
            $statement->execute(['id' => $category['id'],'name'=> $category['name'], 'description' => $category['description'], 'navigation' => $category['navigation']]);
            header('Location:' . ADMIN_URL . 'article-categories/index.php?success=Category Updated Successfully');
            exit();
        }catch(PDOException $e){
            if($e->errorInfo[1] === 1062){
                header('Location:' . ADMIN_URL . 'article-categories/edit.php?error=Category name already exists, Please choose unique name');
            }else{
                throw $e;
            }
        }

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
                <form action="<?php echo ADMIN_URL . 'article-categories/edit.php'?>" method="POST">
                    <div class="row">
                        <div class="col-md-5 mt-2">
                            <div class="form-group">
                                <label for="exampleInputRounded0">Category Name <code>*</code></label>
                                <input type="text" class="form-control rounded-0" name="name" id="category_name" value="<?php echo $fetchedCategory['name']; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" rows="3" name="description" ><?php echo $fetchedCategory['description']; ?></textarea>
                            </div>


                        </div>
                        <div class="col-md-5 ml-5 ">

                            <div class="form-group">
                                <label for="exampleSelectBorder">Navigation <code></code></label>
                                <select class="custom-select form-control-border" name="status" id="status">
                                    <option value="1" <?php echo $fetchedCategory['navigation'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo $fetchedCategory['navigation'] == 0 ? 'selected' : '' ?>>Inactive</option>
                                </select>
                            </div>

                            <input type="hidden" name="id" value="<?php echo $fetchedCategory['id']; ?>">
                            <button type="submit" value="save" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

<?php include '../includes/admin-footer.php'; ?>