<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Add station worker</h4>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" required placeholder="Enter your first name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" required placeholder="Enter your last name">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="tel" id="phone_number" name="phone_number" class="form-control" required placeholder="Enter your phone number">
                            </div>
                            <div class="form-group">
                                <label for="national_id">National ID</label>
                                <input type="text" id="national_id" name="national_id" class="form-control" required placeholder="Enter your national ID">
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" id="position" name="position" class="form-control" required placeholder="Enter your position">
                            </div>
                            <button type="submit" name="signup" class="btn btn-primary btn-block">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
