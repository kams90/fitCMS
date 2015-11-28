/**
 * Show modal with confirm button
 * 
 * @param {object} element
 * @returns {Boolean}
 */
function showConfirmModal(element) {

    // Get data
    var idItem = element.attr('rel');
    var actionUrl = element.attr('href');
    var redirectUrl = element.attr('data-redirectUrl');
    var confirmMsg = element.attr('data-confirmMsg');

    if (jQuery.type(redirectUrl) === "undefined") {
        redirectUrl = '';
    }

    // Prepare modal content
    var content = confirmMsg;

    // Insert modal content
    $('.modal-body').html(content);
    $('#modal-confirm').attr('onclick', 'deleteItem(' + idItem + ', \'' + actionUrl + '\', \'' + redirectUrl + '\');');

    // Show modal
    $('#admin-modal').modal('show');

    return false;

}

/**
 * Delete item by id (ajax)
 *
 * @param {int} idItem
 * @param {string} actionUrl
 * @param {string} redirectUrl
 * @returns {Boolean}
 */
function deleteItem(idItem, actionUrl, redirectUrl) {

    // Make ajax request
    $.post(actionUrl, {id_item: idItem, redirect_url: redirectUrl}, function (results) {

        var response = results.results;

        // Status 1 - SUCCESS
        if (parseInt(response.status) === 1) {

            if (redirectUrl.toString() !== '') {
                window.location.href = redirectUrl.toString();
            } else {
                $('#item_' + idItem).fadeOut(300, function () {
                    $(this).remove();
                    $("#admin-modal").modal("hide");
                });
            }
        }

    });

    return false;

}

/**
 * Show modal with confirm form button
 * 
 * @param {object} element
 * @returns {Boolean}
 */
function showConfirmFormModal(element) {

    // Get data
    var idForm = element.attr('data-formId');
    var confirmMsg = element.attr('data-confirmMsg');

    // Prepare modal content
    var content = confirmMsg;

    // Insert modal content
    $('.modal-body').html(content);
    $('#modal-confirm').attr('onclick', 'formSubmit("' + idForm + '");');

    // Show modal
    $('#admin-modal').modal('show');

    return false;

}

/**
 * Submit form by id
 *
 * @param {string} formId
 * @returns {Boolean}
 */
function formSubmit(formId) {

    $('#' + formId).submit();

}