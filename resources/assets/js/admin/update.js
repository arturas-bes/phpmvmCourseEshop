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
        });

        //update subcategory
        $(".update-subcategory").on('click', function (e) {
            var token = $(this).data('token');
            var id = $(this).attr('id');
            var category_id = $(this).data('category-id');
            var name = $("#item-subcategory-name-"+id).val();
            var selected_category_id = $('#item-category-'+category_id + ' option:selected').val();

            if(category_id !== selected_category_id){
                category_id = selected_category_id;
            }

            $.ajax({
                type: 'POST',
                url: '/admin/product/subcategory/' + id + '/edit',
                data: {token: token, name:name, category_id: category_id},
                success: function (data) {
                    var response = jQuery.parseJSON(data);
                    $(".notification").css("display", 'block').delay(4000).slideUp(300)
                        .html(response.success);
                },
                error:function (request, error) {
                    var errors = jQuery.parseJSON(request.responseText);
                    var ul = document.createElement('ul');
                    $.each(errors, function (key, value) {
                        var li = document.createElement('li');
                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });
                    $(".notification").css("display", 'block').removeClass('primary')
                        .addClass('alert').delay(6000).slideUp(300)
                        .html(ul);
                }
            });

            e.preventDefault();
        });
    };
})();