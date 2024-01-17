<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration system pdo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h3 class="mt-4">sign in</h3>
        <hr>
            <form action="signup_db.php" method="post">
                <div class="mb-3">
                    <label for="student_id" class="form-label">Student ID</label>
                    <input type="number" class="form-control" name="student_id" aria-describedby="student_id">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" name="signin" class="btn btn-primary">sign in</button>
            </form>
            <hr>
            <p>Don't have account ? <a href="index.php"  >sign up</a></p>
            
    </div>
















</body>
</html>