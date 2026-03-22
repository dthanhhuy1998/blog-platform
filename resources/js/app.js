require('./bootstrap');

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import {previewImage} from './helpers/imageHelper';

window.toastr = toastr;
window.previewImage = previewImage;

import { initToast } from './core/toast';

// Initialize Toast
initToast();

// Import Pages
import vouchersIndex from './pages/vouchers.index';
import pagesIndex from './pages/pages.index';
import pageProductsIndex from './pages/page-products.index';

const pageEl = document.querySelector('[data-page]');
const page = pageEl?.dataset.page;

const pages = {
    'vouchers.index': vouchersIndex,
    'pages.index': pagesIndex,
    'page-products.index': pageProductsIndex
};

if (page && typeof pages[page] === 'function') {
    pages[page]();
}