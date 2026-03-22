import { showToastPopup } from './toast';

export function handleHttpError(error, options = {}) {
    const {
        showToastError = true,
    } = options;

    if (!error || !error.response) {
        if (showToastError) {
            showToastPopup('Không thể kết nối tới máy chủ', 'error');
        }
        return;
    }

    const { status, data } = error.response;

    if (status === 422) {
        handle422Error(data, showToastError);
        return;
    }

    if (showToastError) {
        showToastPopup(data?.message || 'Có lỗi xảy ra', 'error');
    }
}

function handle422Error(data, showToastError) {
    // Laravel validate errors
    if (data?.errors && typeof data.errors === 'object') {
        Object.values(data.errors).forEach((messages) => {
            if (Array.isArray(messages)) {
                messages.forEach((msg) => {
                    if (showToastError) {
                        showToastPopup(msg, 'error');
                    }
                });
            }
        });
        return;
    }

    // fallback
    if (showToastError) {
        showToastPopup(data?.message || 'Dữ liệu không hợp lệ', 'error');
    }
}
