FormOptions = {
    initValidation: function (formId, rules = []) {
        $(formId).validate({
            errorPlacement: function (error, element) {
                error.insertAfter(element);
                $(element).addClass('is-invalid');
            },
            success: function (error, element) {
                error.remove();
                $(element).addClass('is-valid');
                $(element).removeClass('is-invalid');
                console.log(element);
            },
            rules: rules
        });
    }
}