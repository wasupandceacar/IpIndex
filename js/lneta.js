var lnetaList = {
  init: function() {
    $("#search").keydown(function() {
      if (event.keyCode == "13") {
        strategyList.requestSearch(encodeURIComponent($("#search").val()));
      }
    });
    lnetaList.initTable();
  },
  initTable: function() {
    var optionSet = {
      dataType: "json",
      pagination: true,
      pageNumber: 1,
      pageSize: 20,
      search: true,
      striped: true,
      cache: false,
      sidePagination: "client",
      strictSearch: false,
      trimOnSearch: true,
      contentType: "application/json; charset=utf-8",
      scriptCharset: "utf-8",
      idField: "id",
      columns: [{
          field: 'av',
          searchable: false,
          sortable: true,
          formatter: function(value, row, index) {
            return "<a href='http://www.bilibili.com/video/av"+value+"'>" + value + "</a>";
          }
        }, {
          field: 'name',
          searchable: true,
        },
        {
          field: 'time',
          searchable: false,
          sortable: true
        },
        {
          field: 'comment',
          searchable: false,
          sortable: false
        },
        {
          field: 'work',
          searchable: true,
          sortable: true
        },
        {
          field: 'type',
          searchable: true,
          sortable: true
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
  }
};
