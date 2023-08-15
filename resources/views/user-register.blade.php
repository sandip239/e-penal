@include('assets.header')

<main role="main" class="col-md-10 px-md-4">
    <h2>User-Form</h2>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-control" id="country" name="country">
                                    <option value="">Select Country</option>
                                    <option value="USA">USA</option>
                                    <option value="Canada">Canada</option>
                                    <option value="UK">UK</option>
                                    <!-- Add more country options as needed -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="">Select City</option>
                                    <option value="New York">New York</option>
                                    <option value="Los Angeles">Los Angeles</option>
                                    <option value="London">London</option>
                                    <!-- Add more city options as needed -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <select class="form-control" id="state" name="state">
                                    <option value="">Select State</option>
                                    <option value="NY">New York</option>
                                    <option value="CA">California</option>
                                    <option value="TX">Texas</option>
                                    <!-- Add more state options as needed -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="languages" class="form-label">Languages</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="english" name="languages[]"
                                        value="English">
                                    <label class="form-check-label" for="english">English</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="spanish" name="languages[]"
                                        value="Spanish">
                                       <label class="form-check-label" for="spanish">Spanish</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="french" name="languages[]"
                                        value="French">
                                    <label class="form-check-label" for="french">French</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" id="btnSubmit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
</div>
</div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form').submit(function(event) {

            event.preventDefault(); // Prevent default form submission
            // const formData = new FormData(this);
            var formData = $(this).serialize(); // Serialize form data
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: "{{route('user-data')}}",
                data: formData,
                success: function(response) {
                    // Handle the response data here
                    alert(response);
                    console.log(response);
                },
                error: function(error) {
                    // Handle errors
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

