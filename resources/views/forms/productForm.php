<?php

use App\Controllers\ProductController;

    $controller = new ProductController();
    $categories = $controller->getCategories();
    $subCat = $controller->getSubCategories();
?>
<div class="modal-body">
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="productName">Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control is-invalid" name="name" id="productName" placeholder="Name">
        </div>
    </div>
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="productItemCode">Item Code</label>
        <div class="col-sm-8">
            <input type="text" class="form-control is-invalid" name="itemCode" id="productItemCode" placeholder="Item code">
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
                <?php
                    foreach($categories as $value){
                        echo "<option value='$value[id]'>$value[name]</option>";
                    }
                ?>
            </select>
        </div>
    </div>
<!--    <div class="form-group row mb-2">-->
<!--        <label class="col-sm-3 col-form-label" for="productSubCategory">Sub Category</label>-->
<!--        <div class="col-sm-8">-->
<!--            <select class="form-select form-control is-valid" name="subCategory" id="productSubCategory" aria-label="Default select example" aria-placeholder="Sub category">-->
<!--                <option selected disabled value="">Select category</option>-->
<!--                --><?php
//                    foreach($subCat as $value){
//                        echo "<option value='$value[id]'>$value[name]</option>";
//                    }
//                ?>
<!--            </select>-->
<!--        </div>-->
<!--    </div>-->
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="productRemarks">Remarks</label>
        <div class="col-sm-8">
            <input type="text" class="form-control is-invalid" name="remarks" id="productRemarks" placeholder="Remarks">
        </div>
    </div>
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="productDescription">Description</label>
        <div class="col-sm-8">
            <textarea class="form-control is-valid" name="description" placeholder="Leave a description here" id="productDescription"></textarea>
        </div>
    </div>
    <input type="hidden" class="form-control is-invalid" name="id" id="id">
</div>