<?php
require APPROOT . '/views/includes/header.php';
// need to add session
?>
<div class="d-flex" id="wrapper">
    <?php
    require APPROOT . '/views/includes/sidebar.php';
    ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <?php
        require APPROOT . '/views/includes/wrapperheader.php';
        // needs connection to database
        ?>
        <div class="bg-yellow container-fluid px-4" style="height:85vh;">
            <div class="bg-whiter container-fluid">
                <div style="height:80vh;" class="container-fluid px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="m-0 fw-bold">Admins List</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="m-0 px-4" src="icons/doublearrows.svg" alt="">
                            <button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD NEW ADMIN</button>
                            <!-- Modal add-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New admin Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="px-4 py-3" id="form">
                                            <form action="<?php echo URLROOT; ?>/Admincontroller/add" method="POST" class="text-muted row g-3 needs-validation">
                                                <div class="col-md-6">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="small-size form-control" name="name" id="name" placeholder="Enter name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="small-size form-control" name="email" id="email" placeholder="Choose email" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="role" class="form-label">Role</label>
                                                    <input type="text" class="small-size form-control" name="role" id="role" placeholder="Enter role" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="small-size form-control" name="password" id="password" placeholder="Enter password" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                    <input type="password" class="small-size form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
                                                </div>
                                                <div class="col-12 mt-3 modal-footer text-center">
                                                    <button class="btn btn-primary" name="save" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal delete-->
                            <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger" id="exampleModalLabel">ADMIN DELETE ALERT</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="px-4 py-3">
                                            Do you really want to delete this admin? <br>
                                        </div>
                                        <form action="<?php echo URLROOT; ?>/Admincontroller/delete" method="POST">
                                            <input type="text" style="display: none;" name="id" class="id">
                                            <div class="px-4 py-3">
                                                <input type="submit" value='Yes, Delete this admin please' class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps"></input>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Admin Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="px-4 py-3" id="form">
                                            <form method="POST" action="<?php echo URLROOT; ?>/Admincontroller/edit" class="text-muted row g-3 needs-validation" novalidate>
                                                <input type="text" style="display: none;" name="id" class="id">
                                                <div class="col-md-12">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="name small-size form-control" name="name" placeholder="Enter name" value="" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a Name.
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="email small-size form-control" name="email" value="" placeholder="Enter email">
                                                    <div class="invalid-feedback">
                                                        Please choose an Email.
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="role" class="form-label">Role</label>
                                                    <input type="text" class="role small-size form-control" name="role" placeholder="Enter role" value="" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a Role.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="text" class="password small-size form-control" name="password" placeholder="Enter password" value="" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a Password.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                    <input type="text" class="confirmPassword small-size form-control" name="confirmPassword" placeholder="Confirm Password" value="" required>
                                                    <div class="invalid-feedback">
                                                        Please Confirm Password.
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3 modal-footer text-center">
                                                    <input type="submit" value='Update Admin' class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps"></input>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0" />
                    <div class="row bg-transparent p-0" id="titles">
                        <div class="col-sm-3 col-lg-3 m-auto">
                            <p class=" m-0">Name</p>
                        </div>
                        <div class="col-sm-3 col-lg-3 m-auto">
                            <p class=" m-0">Email</p>
                        </div>
                        <div class="col-sm-2 col-lg-2 m-auto">
                            <p class=" m-0">Role</p>
                        </div>
                        <div class="col-sm-3 col-lg-3 m-auto">
                            <p class=" m-0">Password</p>
                        </div>
                        <div class="col-sm-1 col-lg-1 m-auto">
                            <p class=" m-0">Actions</p>
                        </div>
                    </div>
                    <div style="overflow-y: scroll;">
                        <div style="height:70vh; padding:0;">
                            <?php
                            if (count($data) > 0) {
                                foreach ($data as $row) {
                                    echo    '<div class="item row  ps px-0 bar mar py-2" id="info">
                                                    <div style="display: none;">
                                                        <p class="Admin_id">' . $row->id . '</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p style="font-size:12px;" class="text-nowrap m-0">' . $row->name . '</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p style="font-size:12px;" class="text-nowrap m-0 ">' . $row->email . '</p>
                                                    </div>
                                                    <div class="col-2">
                                                        <p style="font-size:12px;" class="text-nowrap m-0">' . $row->role  . '</p>
                                                    </div>
                                                    <div class="col-3">
                                                        <p style="font-size:12px;" class="text-nowrap m-0">' . $row->password  . '</p>
                                                    </div>
                                                    <div class="col-1 d-flex justify-content-center align-items-center" id="editer">
                                                        <a class="btn-edit" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaledit"><img style="width:22px;" class="px-1" src="' . URLROOT . '/public/img/icons/pen.svg" alt=""></a>
                                                        <a class="btn-delete" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaldelete"><img style="width:22px;" class="px-1" src="' . URLROOT . '/public/img/icons/can.svg" alt=""></a>
                                                    </div>
                                                </div>';
                                }
                            } else {
                                echo '<div class="text-center">
                                <h1 class="pt-5">No Results Found For Admins</h1>
                                    <div>
                                        <img src="https://thumbs.gfycat.com/CreamyInfatuatedAnkolewatusi-size_restricted.gif" alt="">
                                    </div>
                                    <h2>Do not be sad! You can <a class="text-decoration-none" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">add a Admin</a></h2>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");
    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>
<script>
    let list = document.querySelectorAll('.item')
    let colors = ["#e8e0ff"];
    for (let i = 0; i < list.length; i++) {
        list[i].style.backgroundColor = colors[i % colors.length];
    }
    document.querySelectorAll('.btn-edit').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            let item = e.target.closest('.item');
            let children = item.children;

            let id = children[0].children[0].textContent;
            let name = children[1].children[0].textContent;
            let email = children[2].children[0].textContent;
            let role = children[3].children[0].textContent;
            let password = children[4].children[0].textContent;
            let confirmPassword = children[5].children[0].textContent;

            document.querySelector('#exampleModaledit .id').value = id;
            document.querySelector('#exampleModaledit .name').value = name;
            document.querySelector('#exampleModaledit .email').value = email;
            document.querySelector('#exampleModaledit .role').value = role;
            document.querySelector('#exampleModaledit .password').value = password;
            document.querySelector('#exampleModaledit .confirmPassword').value = confirmPassword;

        })
    })

    document.querySelectorAll('.btn-delete').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            let item = e.target.closest('.item');
            let children = item.children;

            let id = children[0].children[0].textContent;

            document.querySelector('#exampleModaldelete .id').value = id;
        })
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>