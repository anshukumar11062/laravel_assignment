<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crud Example without Database</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>
    <script>
    </script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Users</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Users</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add-form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit-form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Users</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <input type="hidden" name="indexupd" id="indexupd">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="nameupd" name="nameupd" required>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" class="form-control" id="photoupd" name="photoupd">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" id="addressupd" name="addressupd" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="genderupd" id="genderupd" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="del-form">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Users</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="indexdel" id="indexdel">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        displayUsers();
        const addForm = $('#add-form');
        const editForm = $('#edit-form');
        const delForm = $('#del-form');

        // Add item
        addForm.submit(function(e) {
            e.preventDefault();
            const formData = new FormData(addForm[0]);

            $.ajax({
                url: '/users',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function() {
                    addForm[0].reset();
                    displayUsers();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // Edit Items
        editForm.submit(function(e) {
            e.preventDefault();
            const formData = new FormData(editForm[0]);

            $.ajax({
                url: '/edit-users',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(results) {
                    addForm[0].reset();
                    displayUsers();
                    alert(results.message);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // Delete Items
        delForm.submit(function(e) {
            e.preventDefault();
            const formData = new FormData(delForm[0]);

            $.ajax({
                url: '/del-users',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(results) {
                    addForm[0].reset();
                    displayUsers();
                    alert(results.message);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

    });



    /**
     * | Display The Users on the datatable
     */
    function displayUsers() {
        var murl = "/get-users";
        $.ajax({
            url: murl,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
            },
            type: "GET",
            datatype: "json",
            success: function(results) {
                console.log(results);
                fetchDataOnDataTable(results);
            },

            error: function(error) {
                console.log(error);
            },
        });

    }


    /**
     * | Fetch all the data on datatable
     */
    function fetchDataOnDataTable(results) {
        $("#datatable").DataTable().destroy();
        $("#datatable").DataTable({
            searching: false,
            paging: false,
            data: results,
            processing: true,
            method: "get",
            columns: [{
                    data: "name",
                },
                {
                    title: "Action",
                    data: "photo",
                    render: function(data, type, row, meta) {
                        return (
                            "<img id='myImage' src=' " + row.photo + "' width='100' height='100' onclick='downloadImage()'>"
                        );
                    },
                    orderable: "false",
                    searchable: "false",
                },
                {
                    data: "address",
                },
                {
                    data: "gender",
                },
                {
                    title: "Action",
                    data: "name",
                    render: function(data, type, row, meta) {
                        return (
                            "<a href='#editEmployeeModal' class='edit' data-toggle='modal' data-index='" + meta.row + "' data-name='" + row.name + "' data-photo='" + row.photo + "' data-gender='" + row.gender + "' data-address='" + row.address + "'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a> &nbsp; <a data-index='" + meta.row + "' href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"
                        );
                    },
                    orderable: "false",
                    searchable: "false",
                },
            ],
        });

    }


    $('#editEmployeeModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var index = button.data('index') // Extract info from data-* attributes
        var name = button.data('name') // Extract info from data-* attributes
        var photo = button.data('photo') // Extract info from data-* attributes
        var address = button.data('address') // Extract info from data-* attributes
        var gender = button.data('gender') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        $('#indexupd').val(index)
        $('#nameupd').val(name)
        $('#photopreview').val(photo)
        $('#genderupd').val(gender)

        var addressUpd = document.getElementById('addressupd');
        // Set the value of the textarea
        addressUpd.value = address;
    })


    /**
     * | Delete Employee Modal  Preview Setup
     */
    $('#deleteEmployeeModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var index = button.data('index')

        $('#indexdel').val(index)
    })


    /**
     * | download the image
     */
    function downloadImage() {
        // Get the image element by its ID
        var imageElement = document.getElementById('myImage');

        // Create a link element
        var downloadLink = document.createElement('a');

        // Set the href attribute to the image source
        downloadLink.href = imageElement.src;

        // Set the download attribute with the desired filename
        downloadLink.download = 'downloaded_image.jpg';

        // Append the link to the document
        document.body.appendChild(downloadLink);

        // Trigger a click on the link to start the download
        downloadLink.click();

        // Remove the link from the document
        document.body.removeChild(downloadLink);
    }
</script>

</html>