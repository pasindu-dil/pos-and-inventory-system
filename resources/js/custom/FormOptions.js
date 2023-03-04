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
                        let response = JSON.parse(result);
                        if (response.success) {
                            Notifications.success(response.msg);
                        }
                    }
                }
            )
        }
    }
}