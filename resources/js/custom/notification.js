Notifications = {
    success(msg) {
        $.toast({
            heading: 'Success',
            text: msg,
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: 4000
        });
    },
    errorMsg(msg) {
        $.toast({
            heading: 'Error',
            text: msg,
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: 4000
        })
    }
}