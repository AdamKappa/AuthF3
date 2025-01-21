<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/pages/editpage/editpage.css">
</head>
<body>
    <div class="wrapper">
        <h2>Edit page</h2>
        <p>Hi <?= ($UserData->username) ?>!</p>
    
    <?php if ($UserData->access_level === 'Simple User'): ?>
        <div class="simple-container">    
            <form action="/submitSimpleEditpage" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Please enter Username" value="<?= ($UserData->username) ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Please enter new password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="save" value="Save">
                    <input type="button" class="btn btn-secondary" onclick="location.href='/welcome'"  value="Cancel" >
                </div>
            </form>
        </div>
    <?php endif; ?>
    <?php if ($UserData->access_level === 'Administrator'): ?>
        <form action="/submitAdminEditpage" method="post">
            <?php foreach (($Users?:[]) as $User): ?>
                <div class="admin-container">
                        <div class="form-group admin-group">
                            <label class="form-check-label" for="<?= ('editCheckbox_'.$User['ID']) ?>">Select</label>
                            <input class="form-check-input" type="checkbox" name="selected_users[]" id="<?= ('editCheckbox_'.$User['ID']) ?>" value="<?= ($User['ID']) ?>">                        
                        </div>
                        <div class="form-group admin-group">
                            <label for="<?= ('userID_'.$User['ID']) ?>">ID: <?= ($User['ID']) ?></label>
                        </div>
                        <div class="form-group admin-group">
                            <label for="<?= ('username_'.$User['ID']) ?>">Username:</label>
                            <input type="text" id="<?= ('username_'.$User['ID']) ?>" name="usernames[<?= ($User['ID']) ?>]" placeholder="Enter new username" value="<?= ($User['username']) ?>">
                        </div>
                        <div class="form-group admin-group">
                            <label for="<?= ('password_'.$User['ID']) ?>">Password:</label>
                            <input type="password" id="<?= ('password_'.$User['ID']) ?>" name="passwords[<?= ($User['ID']) ?>]" placeholder="Enter new password" >
                        </div>
                </div>
            <?php endforeach; ?>            
            <input type="submit" class="btn btn-primary" name="save" value="Save">
            <input type="button" class="btn btn-secondary"  onclick="location.href='/welcome'" value="Cancel" >
        </form>

    <?php endif; ?>
    </div>
    <?php if ($message): ?>
        <div class="alert alert-info"> <?= ($message) ?></div>
    <?php endif; ?>
    
</body>