FormOptions = {
    initValidation: function (formId, rules = []) {
        $(formId).validate({
            rules: rules
        });
    }
}