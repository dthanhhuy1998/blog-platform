import axios from 'axios';
import { handleHttpError } from '../../core/http-error-handler';
import { showToast, showToastPopup } from '../../core/toast';
import { getPageTable } from '../../pages/page.index';

export function openCreateModal(btn) {
    resetForm();

    const modalTitle = btn.getAttribute('title');
    $('#voucherModalTitle').text(modalTitle);

    $('#voucherModal').modal('show');
}

export function openEditModal(btn) {
    resetForm();

    const voucherModal = $('#voucherModal');
    const modalTitle = btn.data('title');
    const id = btn.data('id');
    
    $('#voucherModalTitle').text(modalTitle);

    axios.get(`/th-admin/vouchers/${id}`)
        .then((res) => {
            const data = res.data.result;

            voucherModal.find('input[name="_mode"]').val('edit');
            voucherModal.find('input[name="id"]').val(data.id);
            voucherModal.find('input[name="code"]').val(data.code);
            voucherModal.find('select[name="type"]').val(data.type).trigger('change');
            voucherModal.find('input[name="value"]').val(data.value);
            voucherModal.find('textarea[name="description"]').val(data.description);
            voucherModal.find('select[name="is_active"]').val(data.is_active).trigger('change');

            setTimeout(function() {             
                voucherModal.modal('show');
            }, 500);
        })
        .catch(error => {
            handleHttpError(error, {
                form: $form,
                showFormError: false,
                showToastError: true
            });
        });
}

export function deleteVoucher(id) {
    axios.delete(`/th-admin/vouchers/${id}`)
        .then((res) => {
            const data = res.data;

            if (data.success) {
                showToastPopup(data.message, 'success');
                getVoucherTable().ajax.reload();
            }
        })
        .catch(error => {
            handleHttpError(error, {
                form: $form,
                showFormError: false,
                showToastError: true
            });
        });
}

export function submitVoucher($form) {
    const mode = $form.find('[name=_mode]').val();
    const id = $form.find('[name=id]').val();

    if (!$form.valid()) {
        return;
    }

    let data = new FormData($form[0]);
    let method = 'post';

    let url = '/th-admin/vouchers';
    if (mode === 'edit') {
        url += `/${id}`;
        method = 'put';
        data = Object.fromEntries(data.entries());
    }

    axios[method](url, data)
        .then((res) => {
            const data = res.data;

            $('#voucherModal').modal('hide');
            if (data.success) {
                showToastPopup(data.message, 'success');
                getVoucherTable().ajax.reload();
            }
        })
        .catch(error => {
            handleHttpError(error, {
                form: $form,
                showFormError: false,
                showToastError: true
            });
        });
}

function resetForm() {
    const $form = $('#voucherForm');
    $form[0].reset();

    $form.find('select').val(null).trigger('change');
}
