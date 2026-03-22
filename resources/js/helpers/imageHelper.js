/**
 * Preview image after user selects file
 * Không upload – chỉ hiển thị preview
 *
 * @param {HTMLInputElement} inputEl - input type="file"
 * @param {HTMLImageElement} previewEl - img để hiển thị preview
 * @param {Object} options
 * @param {number} options.maxSizeMB - giới hạn dung lượng (MB)
 */
export function previewImage(inputEl, previewEl, options = {}) {
    const { maxSizeMB = 5 } = options;

    const $input = $(inputEl);
    const $preview = $(previewEl);

    const files = $input[0].files;
    if (!files || !files.length) {
        $preview.attr('src', previewEl.attr('src'));
        return;
    }

    const file = files[0];

    // Validate type
    if (!file.type || !file.type.startsWith('image/')) {
        alert('Vui lòng chọn file ảnh');
        $input.val('');
        return;
    }

    // Validate size
    if (file.size > maxSizeMB * 1024 * 1024) {
        alert(`Ảnh không được vượt quá ${maxSizeMB}MB`);
        $input.val('');
        return;
    }

    // Clear old object URL (avoid memory leak)
    const oldUrl = $preview.data('objectUrl');
    if (oldUrl) {
        URL.revokeObjectURL(oldUrl);
    }
    
    const objectUrl = URL.createObjectURL(file);
    $preview
        .attr('src', objectUrl)
        .data('objectUrl', objectUrl)
        .show();
}
