/**
 * @file
 * Dynamic adjustments.
 */

var component_index = 1;

(function ($) {
    // Add a row to the table.
    $('#add-component').click(
        function () {
            component_index++;

            var template = '<tr id="row-' + component_index + '">' +
            '<td>' + component_index + '</td>' +
            '<td><input type="text" class="form-control input-sm" name="component_name[]"></td>' +
            '<td><input type="text" class="form-control input-sm" name="component_tc[]"></td>' +
            '<td><input type="text" class="form-control input-sm" name="component_buc[]"></td>' +
            '<td>' +
            '<button type="button" onclick="removeRow(' + component_index + ')" class="btn btn-danger btn-sm add-more">-</button>' +
            '</td>' +
            '</tr>';

            $('#component-container').append(template);
        }
    );
    $('#update-component').click(
        function () {
            // Compensate for already printed items.
            last_index = parseInt($(this).attr('data-last-index'));
            var index = last_index + component_index;
            component_index++;

            var template = '<tr id="row-' + index + '">' +
            '<td>' + index + '</td>' +
            '<td><input type="text" class="form-control input-sm" name="component_name[]"></td>' +
            '<td><input type="text" class="form-control input-sm" name="component_tc[]"></td>' +
            '<td><input type="text" class="form-control input-sm" name="component_buc[]"></td>' +
            '<td>' +
            '<button type="button" onclick="removeRow(' + index + ')" class="btn btn-danger btn-sm add-more">-</button>' +
            '</td>' +
            '</tr>';

            $(template).insertBefore('#component-container');
        }
    );    

})(jQuery);

// Remove a row from the table.
function removeRow(i) 
{
    jQuery('#row-' + i).remove();
}