import bindPageEvents from '../modules/page/events';

let pageTable = null;

export function setPageTable(table) {
    pageTable = table;
}

export function getPageTable() {
    return pageTable;
}

export default function () {
    initDataTable();
    bindPageEvents();
}

function initDataTable() {
    const table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/th-admin/landing/list',
        columns: [
            { data: 'theme_key' },
            { data: 'name' },
            { data: 'slug' },
            { data: 'status' },
            { data: 'created_at' },
            { data: 'actions' },
        ]
    });

    setPageTable(table);
}