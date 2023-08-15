@include('assets.header')
<main role="main" class="col-md-10 px-md-4">
    <h2>Main Content</h2>
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>Country</th>
                <th>Gender</th>
                <th>action</th>
              {{-- <th>country</th>
                    <th>city</th>
                    <th>state</th>
                    <th>languagr</th>
                    <th>image</th> --}}
            </tr>
        </thead>
    </table>
</main>
</div>
</div>
<!-- Add this inside the <body> tag -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email">
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
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>
</body>

</html>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dashboard') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'country',
                    name: 'country'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },

                {
                    data: null,
                    render: function(data, type, row) {
                        return '<button class="btn btn-primary editBtn" data-id="' + data.id +
                            '">Edit</button>';
                    }
                }
            ]
        });

    });

    $(document).on('click', '.editBtn', function(e) {
        e.preventDefault();
        var edit_id = $(this).data('id');
        // var edit_id = $(this).val();
        var url = "{{ route('edit-user', ':edit_id') }}";
        url = url.replace(':edit_id', edit_id);
        $('#editModal').modal('show');

        $.ajax({
            type: "GET",
            url: url,
            success: function(response) {
                console.log(response.user.name);
                $('#id').val(response.user.id);
                $('#editName').val(response.user.name);
                $('#editEmail').val(response.user.email);
                $('#country').val(response.user.country);
                $('#gender').val(response.user.gender);
            }

        })
    })

    $(document).ready(function() {
        alert('1');
        $('#editForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize form data
            console.log(formData);

            $.ajax({
            type: 'POST',
            url: "{{ route('update-user') }}",
            data: formData,
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
            success: function(response) {
                // Handle the response data here
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
