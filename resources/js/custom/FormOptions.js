FormOptions = {
    initValidation: function (formId, rules = [], messages = []) {
        $(formId).validate({
            errorPlacement: function (error, element) {
                error.insertAfter(element);
                $(element).addClass('is-invalid');
            },
            success: function (error, element) {
                error.remove();
                $(element).addClass('is-valid');
                $(element).removeClass('is-invalid');
            },
            rules: rules,
            messages: messages,
        });
    },
    submitForm: function (formId, modalId, tableId, clearForm = true, callback, triggerChange = []) {
        let isValid = $(formId).valid();
        if (isValid) {
            let url = $(formId).attr('action');
            let method = $(formId).attr('method');
            $(formId).ajaxSubmit(
                {
                    clearForm: clearForm,
                    url: url,
                    type: method,
                    success: function (result) {
                        $(modalId).modal('hide');
                        let response = JSON.parse(result);
                        if (response.success) {
                            let table = $(tableId).DataTable();
                            table.ajax.reload();
                            Notifications.success(response.msg);
                        } else {
                            Notifications.errorMsg(response.msg);
                        }
                    }
                }
            )
        }
    },
    updateForm: function (formId, modalId, tableId, id, clearForm = true, callback, triggerChange = []) {
        let isValid = $(formId).valid();
        if (isValid) {
            let url = $(formId).attr('action');
            let method = $(formId).attr('method');
            $(formId).ajaxSubmit(
                {
                    clearForm: clearForm,
                    url: url,
                    type: method,
                    data: { id: id },
                    success: function (result) {
                        $(modalId).modal('hide');
                        let response = JSON.parse(result);
                        if (response.success) {
                            let table = $(tableId).DataTable();
                            table.ajax.reload();
                            Notifications.success(response.msg);
                        }
                    }
                }
            )
        }
    },
    deleteForm: function (url, tableId, id, text = "You won't be able to revert this!", title = "Are you sure?", icon = "warning", confirmButtonText = "Yes, delete it!", successMessage = "Your record has been deleted.") {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmButtonText
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'delete',
                    data: {
                        id: id,
                    },
                    success: function (result) {
                        let response = JSON.parse(result);
                        if (response.success) {
                            let table = $(tableId).DataTable();
                            table.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                successMessage,
                                'success'
                            );
                        } else {
                            let msg = response.message;
                            Notifications.errorMsg(msg);
                        }
                    }
                });
            }
        })
    }
}