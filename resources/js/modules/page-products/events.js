import {
    loadPreviewImage,
} from './index';

export default function bindVoucherEvents(pageElm) {
    $('#imageInput').on('change', function () {
        const imageInput = pageElm.find('#imageInput');
        const previewImage = pageElm.find('#imagePreview');

        loadPreviewImage(imageInput, previewImage);
    });
}
