<div class="modal-body">
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="customerName">Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control is-invalid" name="name" id="customerName" placeholder="Name">
        </div>
    </div>
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="customerAddress">Address</label>
        <div class="col-sm-8">
            <textarea class="form-control is-valid" name="address" placeholder="Address" id="customerAddress"></textarea>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="customerGender">Gender</label>
        <div class="col-sm-8">
            <select class="form-select form-control is-invalid" name="gender" id="customerGender" aria-label="Default select example" aria-placeholder="Select gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="customerMobile">Mobile No:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control is-invalid" name="mobile" id="customerMobile" placeholder="Mobile No : 947xxxxxxxx">
            <label>Start with 947 **</label>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="customerNic">NIC</label>
        <div class="col-sm-8">
            <input type="text" class="form-control is-invalid" name="nic" id="customerNic" placeholder="NIC">
        </div>
    </div>
    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label" for="customerEmail">Email</label>
        <div class="col-sm-8">
            <input type="text" class="form-control is-valid" name="email" id="customerEmail" placeholder="Email address">
        </div>
    </div>
    <input type="hidden" class="form-control is-invalid" name="id" id="id">
</div>