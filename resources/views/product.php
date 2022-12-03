<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../css/nucleo-icons.css" rel="stylesheet" />
    <link href="../css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../css/material-dashboard.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../plugins/jquery.toast/jquery.toast.min.css" />
    <link rel="stylesheet" type="text/css" href="../plugins/jquery-datatable/jquery-datatables.css" />
</head>
<body class="g-sidenav-show  bg-gray-200">
    <div class="container-fluid position-relative p-0">
        <?php require_once('./sidebar.php'); ?>

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <?php require_once('./navbar.php'); ?>

            <div class="container-fluid py-4">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg d-flex justify-content-between pt-3 px-4">
                                    <h6 class="text-white text-capitalize pt-1">Products table</h6>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addProductModel">
                                        Add Product
                                    </button>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-5 pt-0">
                                    <table class="table align-items-center mb-0" id="product-table">
                                        <thead>
                                            <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                                            <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="modal fade" id="addProductModel" tabindex="-1" aria-labelledby="addProductModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- <form> -->
                        <div class="modal-body">
                            <div class="form-group row mb-2">
                                <label class="col-sm-3 col-form-label" for="productName">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control is-invalid" name="name" id="productName" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-3 col-form-label" for="productItemCode">Item Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control is-invalid" name="itemCode" id="productItemCode" placeholder="Item code" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-3 col-form-label" for="productSellingPrice">Selling Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control is-invalid" name="sellingPrice" id="productSellingPrice" placeholder="Selling price">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-3 col-form-label" for="productQuantity">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control is-invalid" name="quantity" id="productQuantity" placeholder="Quantity">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-3 col-form-label" for="productCategory">Category</label>
                                <div class="col-sm-8">
                                    <select class="form-select form-control is-invalid" name="category" id="productCategory" aria-label="Default select example" aria-placeholder="Select category">
                                        <option selected disabled>Select category</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-3 col-form-label" for="productSubCategory">Sub Category</label>
                                <div class="col-sm-8">
                                    <select class="form-select form-control is-invalid" name="subCategory" id="productSubCategory" aria-label="Default select example" aria-placeholder="Sub category">
                                        <option selected disabled>Select category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-3 col-form-label" for="productRemarks">Remarks</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control is-invalid" name="remarks" id="productRemarks" placeholder="Remarks">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-3 col-form-label" for="productDescription">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control is-invalid" name="description" placeholder="Leave a description here" id="productDescription"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="submit()">Save changes</button>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="../js/core/popper.min.js"></script>
    <script src="../js/custom/dataTable.js"></script>
    <script src="../js/core/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar.min.js"></script>
    <script src="../plugins/smooth-scrollbar.min.js"></script>
    <script src="../plugins/chartjs.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <script src="../js/App.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../plugins/jquery.toast/jquery.toast.min.js"></script>
    <script type="text/javascript" src="../plugins/jquery-datatable/jquery.datatable.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.js"></script>
    <script type="text/javascript" src="../js/custom//FormOptions.js"></script>
    
    <script>
        $(document).ready(function () {
            activeTab('product');
            DataTableOption.initDataTable('product-table', '/');
            FormOptions.initValidation('#addProductModel', []);
        });

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        function submit() {
        }
    </script>
    
    <script src="../js/material-dashboard.min.js?v=3.0.4"></script>
</body>
</html>