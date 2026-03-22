import bindVoucherEvents from '../modules/voucher/events';

let voucherTable = null;

export function setVoucherTable(table) {
    voucherTable = table;
}

export function getVoucherTable() {
    return voucherTable;
}

export default function () {
    // Init event after load page
    initDataTable();
    initModalPlugins();

    bindVoucherEvents();
}

function initDataTable() {
    const table = $('#vouchers-list').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/th-admin/vouchers/list',
        columns: [
            { data: 'code' },
            { data: 'type' },
            { data: 'value' },
            { data: 'used_count' },
            { data: 'start_at' },
            { data: 'end_at' },
            { data: 'status' },
            { data: 'description' },
            { data: 'created_at' },
            { data: 'actions' },
        ]
    });

    setVoucherTable(table);
}

function initModalPlugins() {
    $('#voucherModal').on('shown.bs.modal', function () {
        const $select = $(this).find('.select2');

        if (!$select.hasClass('select2-hidden-accessible')) {
            $select.select2({
                dropdownParent: $('#voucherModal'),
                width: '100%'
            });
        }

        initVoucherFormValidate();
    });

}

function initVoucherFormValidate() {
    $('#voucherForm').validate({
        rules: {
            code: {
                required: true,
            },
            type: {
                required: true,
            },
            value: {
                required: true,
                number: true,
                min: {
                    depends: function () {
                        return $('[name="type"]').val() === 'percent';
                    },
                    param: 1
                },
                max: {
                    depends: function () {
                        return $('[name="type"]').val() === 'percent';
                    },
                    param: 100
                }
            },
            is_active: {
                required: true
            }
        },
        messages: {
            code: {
                required: 'Vui lòng nhập mã voucher!'
            },
            type: {
                required: 'Vui lòng chọn loại!'
            },
            value: {
                required: 'Vui lòng nhập giá trị!',
                number: 'Chỉ được nhập số',
                min: 'Giá trị phải từ 1 đến 100',
                max: 'Giá trị phải từ 1 đến 100'
            },
            is_active: {
                required: 'Vui lòng chọn trạng thái!'
            }
        },
        errorElement: 'span',
        errorClass: 'help-block text-danger',
        highlight(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });
}