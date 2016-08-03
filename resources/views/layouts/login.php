<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Login</h3>
            <div class="form-group">
                <label for="username">Username</label>
                <?php echo \Form::text( 'username' , '' , [ 'class' => 'form-control' , 'id'=>'username' ] ) ?>
            </div>
            <div class="form-group">
                <label for="username">Password</label>
                <?php echo \Form::password( 'pwd' , '' , [ 'class' => 'form-control' , 'id'=>'pwd' ] ) ?>
            </div>
        </div>
        
    </div>
</body>
</html>
