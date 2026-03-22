import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

export function showToast(message, type = 'error') {
    if (window.toastr) {
        toastr[type](message);
        return;
    }

    alert(message);
}

export function initToast(options = {}) {
    if (!window.toastr) {
        console.warn('Toastr not loaded');
        return;
    }
  
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: 'toast-top-right',
        timeOut: 3000,
        extendedTimeOut: 1000,
        preventDuplicates: true,
        newestOnTop: true,
        ...options
    };
}
  
export function showToastPopup(message, type = 'error', title = '', options = {}) {
    if (!window.toastr) {
        console.warn('Toastr not loaded');
        return;
    }

    const {
        showAll = false,   // 👈 show tất cả lỗi hay không
        separator = '<br>' // 👈 cách ngăn giữa các lỗi
    } = options;
  
    if (!message) return;

    // =========================
    // NORMALIZE MESSAGE
    // =========================
    let messages = [];

    if (typeof message === 'string') {
        messages = [message];
    }
    else if (Array.isArray(message)) {
        messages = message;
    }
    else if (typeof message === 'object') {
        messages = Object.values(message).flat();
    }

    if (!messages.length) return;

    const finalMessage = showAll
    ? messages.join(separator)
    : messages[0];
  
    // =========================
    // SHOW TOAST
    // =========================
    switch (type) {
        case 'success':
            toastr.success(finalMessage, title);
            break;

        case 'info':
            toastr.info(finalMessage, title);
            break;

        case 'warning':
            toastr.warning(finalMessage, title);
            break;

        case 'error':
        default:
            toastr.error(finalMessage, title);
        break;
    }
}