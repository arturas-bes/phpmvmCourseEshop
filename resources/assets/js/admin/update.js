(function () {
    'use strict';

    ACMESTORE.admin.update = function () {

        //update product category
        $('.update-category').on('click', function (e) {
            let token = $(this).data('token');
            let id = $(this).attr('id');
            let name = $(`#item-name-${id}`).val();

            $.ajax({
                type: 'POST',
                url: '/admin/product/categories/'+ id + '/edit',
                data: {token: token, name: name},
                success: function (data) {
                    let response = jQuery.parseJSON(data);

                    $('.notification').css("display", 'block').delay(4000).slideUp(300).html(response.success);

                    if ($('.notification').hasClass('alert')) {
                        $('.notification').removeClass('alert').addClass('primary');
                    }


                },
                error:function (request, error) {
                    let errors = jQuery.parseJSON(request.responseText);
                    let ul = document.createElement('ul');
                    $.each(errors, function (key, value) {
                        let li = document.createElement('li');
                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });
                    $('.notification').css("display", 'block').delay(6000).slideUp(300).html(ul)
                    if ($('.notification').hasClass('primary')) {
                        $('.notification').removeClass('primary').addClass('alert');
                    }
                }
            });


            e.preventDefault();
        })
    };
})();