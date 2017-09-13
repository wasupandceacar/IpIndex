var osutable = {
  init: function() {
    osutable.initTable();
  },
  initTable: function() {
    $('#osu-list').DataTable({
      "ajax": "php/osudata.php",
      "columns": [{
          "data": "rank"
        },
        {
          "data": "pp"
        },
        {
          "data": "user"
        },
        {
          "data": "map_info"
        }
      ],
      "order": [
        [0, "asc"]
      ],
      'language': {
        'emptyTable': '没有相关map信息',
        'loadingRecords': '加载map信息中...',
        'processing': '查询map中...',
        'search': '搜索map:',
        'lengthMenu': '每页 _MENU_ 个map记录',
        'zeroRecords': '没有相关map信息',
        'paginate': {
          'first': '第一页',
          'last': '最后一页',
          'next': '下一页',
          'previous': '上一页'
        },
        'info': '当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条map记录',
        'infoEmpty': '没有相关map信息',
        'infoFiltered': ''
      },
      fixedHeader: true,
      "lengthMenu": [[25, 50, 120, -1], [25, 50, 120, "所有"]]
    });
  }
}
