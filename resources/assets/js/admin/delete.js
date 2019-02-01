(function () {
    'use strict';
    ACMESTORE.admin.delete = function () {
        $('table[data-form="deleteForm"]').on('click', '.delete-item', function (e) {
            let form = $(this);

            $('#confirm').foundation('open').on('click', '#delete-btn', function () {
                form.submit();
            });

            e.preventDefault()
        });
    };
})();