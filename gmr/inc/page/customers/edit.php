<?php
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $fullname = filterRequest('fullname');
    $location = filterRequest('location');
    $active = filterRequest('active');
    // Array Errors
    $errors = array();
    // Full Name Error
    if (empty($fullname)) {
        $errors[] = words('Enter Full Name');
    } elseif (getCount('customers','fullname=? AND id!=?',array($fullname,id())) > 0) {
        $errors[] = words('Full Name Is Exists');
    }
    // Location Error
    if (empty($location)) {
        $errors[] = words('Enter Location');
    } elseif (getCount('customers','cu_location=? and id != ?',array($location, id())) > 0) {
        $errors[] = words('Location Is Exists');
    }
    // Add Informatio To Database
    if (empty($errors)) {
        $edit = $con->prepare('UPDATE url_transactions SET customer = ? WHERE customer = ?');
        $edit->execute(array($fullname, getItem('customers',id(),'id=?','fullname')));
        $add = $con->prepare('UPDATE customers SET fullname = ?, cu_location = ?,active = ? WHERE id = ?');
        $add->execute(array($fullname, $location, $active, id()));
        header('location: ?Page=View');
    }
}
?>
<!------------------------ Content ------------------------>
<div class="content">
    <!------------------------ Navbar ------------------------>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand">
            <span><?php echo words($pageTitle) ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav <?php echo $navbar ?>-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-danger btn-sm" aria-current="page" href="?Page=View">
                        <i class="fa fa-chevron-left fa-fw"></i>
                        <span><?php echo words('Back') ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav> <!-- Navbar -->
    <!------------------------ Form ------------------------>
    <form method="post" enctype="multipart/form-data">
        <!------------------------ Container ------------------------>
        <div class="container">
            <!------------------------ Beasic ------------------------>
            <div class="panel">
                <!------------------------ Title ------------------------>
                <div class="panel-heading">
                    <?php echo words('Edit Customer') ?>
                </div>
                <!------------------------ Body ------------------------>
                <div class="panel-body">
                    <!------------------------ Raw ------------------------>
                    <div class="row">
                        <div class="col-12">
                            <?php
                            if (isset($errors) && !empty($errors)) {
                            foreach ($errors as $error) {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $error ?>
                            </div>
                            <?php } } ?>
                        </div>
                        <!------------------------ Full Name ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Full Name') ?></label>
                                <input
                                    type="text"
                                    name="fullname"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($fullname)){echo$fullname;}else{echo getItem('customers', id(), 'id = ?', 'fullname');}?>">
                            </div>
                        </div> <!-- Full Name -->
                        <!------------------------ Location ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Location') ?></label>
                                <input
                                    type="text"
                                    name="location"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($location)){echo$location;}else{echo getItem('customers', id(), 'id = ?', 'cu_location');}?>">
                            </div>
                        </div> <!-- Location -->
                        <!------------------------ Active ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('State') ?></label>
                                <div class="form-group">
                                    <select name="active" class="form-control">
                                        <option value="0" <?php if ((isset($active)&&$active==0)||(getItem('customers',id(),'id = ?', 'active')==0)){echo'selected';}?> >
                                            <?php echo words('Disabled') ?>
                                        </option>
                                        <option value="1" <?php if ((isset($active)&&$active==1)||(getItem('customers',id(), 'id = ?', 'active')==1)){echo'selected';}?>>
                                            <?php echo words('Enabled') ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- Active -->
                    </div> <!-- Raw -->
                </div> <!-- Body -->
            </div> <!-- Beasic -->
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">
                    <?php echo words('Edit') ?>
                </button>
            </div>
        </div> <!-- Container -->
    </form> <!-- Form -->
</div> <!-- Content -->