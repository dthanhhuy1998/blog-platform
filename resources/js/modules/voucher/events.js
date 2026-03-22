import {
    openCreateModal,
    openEditModal,
    deleteVoucher,
    submitVoucher
} from './index';

export default function bindVoucherEvents() {
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-action]');
        if (!btn) return;

        switch (btn.dataset.action) {
            case 'btn-create':
                openCreateModal(btn);
                break;
        }
    });

    $('#voucherForm').on('submit', (e) => {
        e.preventDefault();
        const $form = $(e.target);
        submitVoucher($form);
    });

    $(document).on('submit', '.voucherFormDelete', function (e) {
        e.preventDefault();
        const $form = $(e.target);
        const id = $form.data('id');

        if (!confirm('Bạn có chắn chắn muốn xoá voucher này?')) return;
        deleteVoucher(id);
    });

    $(document).on('click', '.btn-edit', function (e) {
        const btn = $(this);
        openEditModal(btn);
    });
}
