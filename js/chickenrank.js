var chickenrank = {
    init: function() {
        chickenrank.initTable();
    },
    initTable: function() {
        $('#chicken-list').DataTable({
            "ajax": "php/chickenrank.php",
            "columns": [{
                "data": "uid"
            },
                {
                    "data": "name"
                },
                {
                    "data": "intro"
                },
                {
                    "data": "status"
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
