var lnetaList = {
  init: function() {
      toastr.options.progressBar = true;
      toastr.options.timeOut = 2000;
      toastr.info('少女正在加载图表中。。。');
      lnetaList.initTable();
      toastr.clear();
  },
  initTable: function() {
    var optionSet = {
      dataType: "json",
      pagination: true,
      pageNumber: 1,
      pageSize: 25,
      search: true,
      striped: true,
      cache: true,
      sidePagination: "client",
      sortName: 'av',
      sortable: true,
      sortOrder: "desc",
      strictSearch: false,
      trimOnSearch: true,
      contentType: "application/json; charset=utf-8",
      scriptCharset: "utf-8",
      idField: "av",
      filterControl: true,
      stickyHeader: true,
      columns: [{
          field: 'av',
          searchable: false,
          sortable: true,
          formatter: function(value, row, index) {
            return "<a href='http://www.bilibili.com/video/av" + value + "'>" + value + "</a>";
          }
        },
        {
          field: 'work',
          searchable: true
        },
        {
          field: 'type',
          searchable: true
        },
        {
          field: 'name',
          searchable: true
        },
        {
          field: 'time',
          searchable: false
        },
        {
          field: 'comment',
          searchable: false
        }
      ],
      url: "json/1.json",
      method: 'get',
      queryParams: function(params) {
        return params;
      },
      responseHandler: function(res) {
        return eval(res);
      }
    };
    $("#lneta-list").bootstrapTable(optionSet);
    $(".bootstrap-table .form-control").attr("placeholder", "投稿者/作品/neta类型");
    $(window).resize(function() {
      $('#lneta-list').bootstrapTable('resetView');
    });
  }
};
