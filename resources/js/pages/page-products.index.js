import bindPageEvents from '../modules/page-products/events';

let pageTable = null;

export function setPageTable(table) {
    pageTable = table;
}

export function getPageTable() {
    return pageTable;
}

export default function () {
    let pageElm = $('#page-products-index');
    bindPageEvents(pageElm);
}