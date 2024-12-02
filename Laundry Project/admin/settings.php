<?php
include('inc/conn.php');
include('inc/function.php');
adminlogin();
// Initialize edit state variable
$editing = false;

// Check if "edit" button is pressed (switch to edit mode)
if (isset($_POST['edit'])) {
    $editing = true;
}
if(isset($_POST['save']))
{
    $site_name = $_POST['site_name'];
    $phone_number = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $slide_title = $_POST['title'];
    $slide_description = $_POST['description'];

    $settings = [
        'site_name' => $site_name,
        'phone_number' => $phone_number,
        'address' => $address,
        'email' => $email,
        'slide_title' => $slide_title,
        'slide_description' => $slide_description,
    ];
    foreach($settings as $key=>$value){
        $query="SELECT * FROM settings WHERE setting_key='$key'";
        $result=mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
            $update_query="UPDATE settings SET setting_value='$value' WHERE setting_key='$key'";
            mysqli_query($connection, $update_query);
        }
        else
        {
            $insert_query="INSERT INTO settings (setting_key,setting_value) VALUES ('$key','$value')";
            mysqli_query($connection, $insert_query);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page</title>
    <?php include('inc/link.php');?>

    <link rel="stylesheet" href="css/common.css">

</head>
<body>

    <div class="container-fluid overflow-y-hidden">
        <div class="row g-0">
            <!-- Sidebar Header -->
            <?php include('inc/header.php'); ?>

            <!-- Main Content -->
            <div class="col-10">
                <!-- Navbar -->
                <nav class="navbar navbar-expand">
                    <div class="container-fluid d-flex flex-row-reverse">
                        <div class="dropdown dropstart">
                            <button class="btn btn-light shadow-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i><span class="p-1 d-none d-lg-inline">Accounts</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-left p-1"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Page Content -->
                <h3 class="mb-4">Settings</h3>

                <!-- General Settings -->
            <form action="" method="post">
                <div class="card border-0 shadow-sm mt-4">
                <?php
                    $query="SELECT * FROM settings";
                    $result=mysqli_query($connection, $query);

                    $settings=[];
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $settings[$row['setting_key']]=$row['setting_value'];
                    }
                ?>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <?php if (!$editing): ?>
                                <button type="submit" class="btn btn-dark shadow-none btn-sm" name="edit">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-dark shadow-none btn-sm" name="save">
                                    <i class="bi bi-save"></i> Save
                                </button>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="form-label">Site Name</label>
                            </div>
                            <div class="col-8">
                                <?php if (!$editing): ?>
                                    <p class="form-text"><?= isset($settings['site_name']) ? $settings['site_name'] : 'LONICY'; ?></p>
                                <?php else: ?>
                                    <input type="text" class="form-control" value="<?= isset($settings['site_name']) ? $settings['site_name'] : ''; ?>" name="site_name">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Home Site</h5>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="form-label">Phone Number</label>
                            </div>
                            <div class="col-8">
                                <?php if (!$editing): ?>
                                    <p class="form-text"><?= isset($settings['phone_number']) ? $settings['phone_number'] : '+1 234 567 890'; ?></p>
                                <?php else: ?>
                                    <input type="text" class="form-control" value="<?= isset($settings['phone_number']) ? $settings['phone_number'] : ''; ?>" name="phone">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="form-label">Office Address</label>
                            </div>
                            <div class="col-8">
                                <?php if (!$editing): ?>
                                    <p class="form-text"><?= isset($settings['address']) ? $settings['address'] : '123 Main St, City'; ?></p>
                                <?php else: ?>
                                    <textarea class="form-control" name="address"><?= isset($settings['address']) ? $settings['address'] : ''; ?></textarea>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="form-label">Email</label>
                            </div>
                            <div class="col-8">
                                <?php if (!$editing): ?>
                                    <p class="form-text"><?= isset($settings['email']) ? $settings['email'] : 'laundryservice@gmail.com'; ?></p>
                                <?php else: ?>
                                    <textarea class="form-control" name="email"><?= isset($settings['email']) ? $settings['email'] : ''; ?></textarea>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Slide Site</h5>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="form-label">Title</label>
                            </div>
                            <div class="col-8">
                                <?php if (!$editing): ?>
                                    <p class="form-text"><?= isset($settings['slide_title']) ? $settings['slide_title'] : '+1 234 567 890'; ?></p>
                                <?php else: ?>
                                    <input type="text" class="form-control" value="<?= isset($settings['slide_title']) ? $settings['slide_title'] : ''; ?>" name="title">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="form-label">Description</label>
                            </div>
                            <div class="col-8">
                                <?php if (!$editing): ?>
                                    <p class="form-text"><?= isset($settings['slide_description']) ? $settings['slide_description'] : '+1 234 567 890'; ?></p>
                                <?php else: ?>
                                    <textarea type="text" row="3" class="form-control" name="description"><?= isset($settings['slide_description']) ? $settings['slide_description'] : ''; ?></textarea>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Links -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
