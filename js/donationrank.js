var donationrank = {
    init: function() {
        donationrank.initTable();
    },
    initTable: function() {
        $('#donation-list').DataTable({
            "ajax": "php/donationrank.php",
            "columns": [{
                "data": "pic_url"
            },
                {
                    "data": "name"
                },
                {
                    "data": "donation"
                }
            ],
            "searching":false,
            "paging": false,
            'language': {
                'emptyTable': '没有相关信息',
                'loadingRecords': '加载信息中...',
                'processing': '',
                'search': '',
                'lengthMenu': '',
                'zeroRecords': '没有相关信息',
                'paginate': {
                    'first': '',
                    'last': '',
                    'next': '',
                    'previous': ''
                },
                'info': '',
                'infoEmpty': '',
                'infoFiltered': ''
            },
            fixedHeader: true,
        });
    }
}
