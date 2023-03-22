<?php
session_start();
$_SESSION['page_title'] = "Product";
?>

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
    <style>
        .swal2-popup {
            font-size: 14px !important;
        }
    </style>
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
                                        <div>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addProductModel">
                                                Add Product
                                            </button>
                                            <!--                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#productBulkUpload">-->
                                            <!--                                                Bulk Upload-->
                                            <!--                                            </button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
                                    <div class="table-responsive p-5 pt-0">
                                        <table class="table align-items-center mb-0" id="productTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">#</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Name</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Item Code</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Price (Rs)</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Quantity</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Category</th>
                                                    <!--                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Sub Category</th>-->
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Remarks</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Description</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="modal fade" id="addProductModel" tabindex="-1" aria-labelledby="addProductModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 600px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addProduct" method="post" action="../../routes/add_product_helper.php">
                        <?php require('./forms/productForm.php'); ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="FormOptions.submitForm('#addProduct', '#addProductModel', '#productTable')">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editProductModel" tabindex="-1" aria-labelledby="editProductModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 600px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editProduct" method="post" action="../../routes/update_product_helper.php">
                        <?php require('./forms/productForm.php'); ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="FormOptions.submitForm('#editProduct', '#editProductModel', '#productTable')">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="productBulkUpload" tabindex="-1" aria-labelledby="productBulkUpload" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 600px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bulk Products</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="productBulkUploadForm" method="post" action="../../routes/bulk_upload_helper.php" enctype="multipart/form-data">
                        <?php require('./forms/productBulkUpload.php'); ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="FormOptions.updateForm('#productBulkUploadForm', '#productBulkUpload', '#productTable')">Upload</button>
                        </div>
                    </form>
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
    <script type="text/javascript" src="../js/jquery.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
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
    <script src="../js/jquery.form.js"></script>
    <script type="text/javascript" src="../plugins/jquery.toast/jquery.toast.min.js"></script>
    <script type="text/javascript" src="../plugins/jquery-datatable/jquery.datatable.js"></script>
    <!-- <script type="text/javascript" src="../js/jquery.validate.js"></script> -->
    <script type="text/javascript" src="../js/jquery.validate.js"></script>
    <script type="text/javascript" src="../js/custom/FormOptions.js"></script>
    <script type="text/javascript" src="../js/custom/notification.js"></script>
    <script type="text/javascript" src="../js/custom/dataTable.js"></script>
    <script type="text/javascript" src="../js/sweetalert.js"></script>

    <script>
        $(document).ready(function() {
            activeTab('product');
            DataTableOption.initDataTable('productTable', '/');
            let rules = {
                name: {
                    required: true,
                    minlength: 4
                },
                remarks: {
                    required: true,
                    number: true
                },
                itemCode: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                sellingPrice: {
                    required: true,
                    number: true
                },
                quantity: {
                    required: true,
                    number: true
                },
                category: {
                    required: true
                }
            };
            let bulkRules = {
                bulk_file: {
                    required: true,
                }
            };
            FormOptions.initValidation('#addProduct', rules);
            FormOptions.initValidation('#editProduct', rules);
            FormOptions.initValidation('#productBulkUploadForm', bulkRules);
            DataTableOption.initDataTable('#productTable', '../../routes/product_datatable_helper.php');
        });

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        function submitForm() {
            $('#addProduct').valid();
            Notifications.success('Hello');
            // $('#editProduct').valid();
            // $('#productBulkUploadForm').valid();
        }

        function edit(result) {
            let id = result.dataset.id;
            let name = result.dataset.name;
            let itmCode = result.dataset.item_code;
            let price = result.dataset.price;
            let qty = result.dataset.quantity;
            let category = result.dataset.category_id;
            let subCategory = result.dataset.sub_category_id;
            let remark = result.dataset.remarks;
            let description = result.dataset.description;
            $('#editProductModel').find('#productName').val(name);
            $('#editProductModel').find('#productItemCode').val(itmCode);
            $('#editProductModel').find('#productSellingPrice').val(price);
            $('#editProductModel').find('#productQuantity').val(qty);
            $('#editProductModel').find('#productCategory').val(category);
            $('#editProductModel').find('#productSubCategory').val(subCategory);
            $('#editProductModel').find('#productRemarks').val(remark);
            $('#editProductModel').find('#productDescription').val(description);
            $('#editProductModel').find('#id').val(id);
            $('#editProductModel').modal('show');
        }

        function deleteItem(id) {
            FormOptions.deleteForm('../../routes/product_delete_helper.php?id=' + id, '#productTable', id);
        }
    </script>

    <script src="../js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>