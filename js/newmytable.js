(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['zh-CN'] = {
        formatLoadingMessage: function () {
            return '少女加载中。。。';
        },
        formatRecordsPerPage: function (pageNumber) {
            return '&emsp;少女每页会显示 ' + pageNumber + ' 条Lneta';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '&emsp;少女显示了第 ' + pageFrom + ' 到第 ' + pageTo + ' 条Lneta，一共有 ' + totalRows + ' 条Lneta';
        },
        formatSearch: function () {
            return '少女开始搜索';
        },
        formatNoMatches: function () {
            return '少女找不到符合的记录。。。';
        },
        formatPaginationSwitch: function () {
            return '隐藏/显示分页';
        },
        formatRefresh: function () {
            return '刷新';
        },
        formatToggle: function () {
            return '切换';
        },
        formatColumns: function () {
            return '列';
        },
        formatExport: function () {
            return '导出数据';
        },
        formatClearFilters: function () {
            return '清空过滤';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['zh-CN']);

})(jQuery);
