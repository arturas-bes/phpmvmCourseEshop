(function () {
    'use strict';
    $(document).foundation();

    $(document).ready(function () {
        //switch pages
        switch ($("body").data("page-id")) {
            case 'home':
                break;
            case 'AdminCategories':

                ACMESTORE.admin.update();
                ACMESTORE.admin.delete();
                break;
            default:
        }
    });
})();
