var lnetaChart = {
    init: function() {
        lnetaChart.lnetaarray = [
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0]
        ];
        toastr.options.progressBar = true;
        toastr.options.timeOut = 3000;
        toastr.info('少女正在加载图表中。。。');
        lnetaChart.initData();
        toastr.clear();
    },
    initData: function() {
        $.ajax({
            type: "GET",
            url: "php/lneta.php",
            success: function(data) {
                //单低封，单NM，单NB(妖星神天)，单NB(其他)和双NB(妖星神天)，NMNB(妖星神天)，NMNB(其他)和3N
                $.each($.parseJSON(data), function(n, value) {
                    lnetaChart.judge(value);
                });
                lnetaChart.initPie();
                lnetaChart.initChart();
            }
        });
    },
    initChart: function() {
        lnetaChart.Chart = echarts.init(document.getElementById("lneta-chart"));
        window.onresize = function() {
            lnetaChart.Chart.resize();
        };
        lnetaChart.option = {
            color: ['#4c5ceb', '#ddf428', '#29df0b', '#dea35c', '#ff0000', '#a20c0c'],
            tooltip: {
                trigger: 'axis',
                axisPointer: { // 坐标轴指示器，坐标轴触发有效
                    type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
                }
            },
            backgroundColor:'',
            legend: {
                data: ['单低封', '单NM', '单NB(妖星神天)', '单NB(其他)和双NB(妖星神天)', 'NMNB(妖星神天)', 'NMNB(其他)和3N']
            },
            grid: {
                left: '3%',
                right: '4%',
                top: '15%',
                containLabel: true
            },
            xAxis: [{
                type: 'category',
                data: ['红魔乡', '妖妖梦', '永夜抄', '风神录', '地灵殿', '星莲船', '大战争', '神灵庙', '辉针城', '绀珠传', '天空璋']
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                name: '单低封',
                type: 'bar',
                stack: '类型',
                barWidth: '70%',
                data: [lnetaChart.lnetaarray[0][0], lnetaChart.lnetaarray[1][0], lnetaChart.lnetaarray[2][0], lnetaChart.lnetaarray[3][0], lnetaChart.lnetaarray[4][0], lnetaChart.lnetaarray[5][0], lnetaChart.lnetaarray[6][0], lnetaChart.lnetaarray[7][0], lnetaChart.lnetaarray[8][0], lnetaChart.lnetaarray[9][0], lnetaChart.lnetaarray[10][0]]
            },
                {
                    name: '单NM',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: [lnetaChart.lnetaarray[0][1], lnetaChart.lnetaarray[1][1], lnetaChart.lnetaarray[2][1], lnetaChart.lnetaarray[3][1], lnetaChart.lnetaarray[4][1], lnetaChart.lnetaarray[5][1], lnetaChart.lnetaarray[6][1], lnetaChart.lnetaarray[7][1], lnetaChart.lnetaarray[8][1], lnetaChart.lnetaarray[9][1], lnetaChart.lnetaarray[10][1]]
                },
                {
                    name: '单NB(妖星神天)',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: [lnetaChart.lnetaarray[0][2], lnetaChart.lnetaarray[1][2], lnetaChart.lnetaarray[2][2], lnetaChart.lnetaarray[3][2], lnetaChart.lnetaarray[4][2], lnetaChart.lnetaarray[5][2], lnetaChart.lnetaarray[6][2], lnetaChart.lnetaarray[7][2], lnetaChart.lnetaarray[8][2], lnetaChart.lnetaarray[9][2], lnetaChart.lnetaarray[10][2]]
                },
                {
                    name: '单NB(其他)和双NB(妖星神天)',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: [lnetaChart.lnetaarray[0][3], lnetaChart.lnetaarray[1][3], lnetaChart.lnetaarray[2][3], lnetaChart.lnetaarray[3][3], lnetaChart.lnetaarray[4][3], lnetaChart.lnetaarray[5][3], lnetaChart.lnetaarray[6][3], lnetaChart.lnetaarray[7][3], lnetaChart.lnetaarray[8][3], lnetaChart.lnetaarray[9][3], lnetaChart.lnetaarray[10][3]]
                },
                {
                    name: 'NMNB(妖星神天)',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: [lnetaChart.lnetaarray[0][4], lnetaChart.lnetaarray[1][4], lnetaChart.lnetaarray[2][4], lnetaChart.lnetaarray[3][4], lnetaChart.lnetaarray[4][4], lnetaChart.lnetaarray[5][4], lnetaChart.lnetaarray[6][4], lnetaChart.lnetaarray[7][4], lnetaChart.lnetaarray[8][4], lnetaChart.lnetaarray[9][4], lnetaChart.lnetaarray[10][4]]
                },
                {
                    name: 'NMNB(其他)和3N',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: [lnetaChart.lnetaarray[0][5], lnetaChart.lnetaarray[1][5], lnetaChart.lnetaarray[2][5], lnetaChart.lnetaarray[3][5], lnetaChart.lnetaarray[4][5], lnetaChart.lnetaarray[5][5], lnetaChart.lnetaarray[6][5], lnetaChart.lnetaarray[7][5], lnetaChart.lnetaarray[8][5], lnetaChart.lnetaarray[9][5], lnetaChart.lnetaarray[10][5]]
                }
            ]
        };
        lnetaChart.Chart.setOption(lnetaChart.option);
    },
    initPie: function() {
        lnetaChart.Pie = echarts.init(document.getElementById("lneta-pie"));
        window.onresize = function() {
            lnetaChart.Pie.resize();
        };
        lnetaChart.option2 = {
            tooltip: {
                trigger: 'item',
                formatter: "{b} : {c} ({d}%)"
            },
            backgroundColor:'',
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['红魔乡', '妖妖梦', '永夜抄', '风神录', '地灵殿', '星莲船', '大战争', '神灵庙', '辉针城', '绀珠传', '天空璋']
            },
            series: [{
                type: 'pie',
                radius: '63%',
                center: ['50%', '67%'],
                data: [{
                    value: lnetaChart.sum(lnetaChart.lnetaarray[0]),
                    name: '红魔乡'
                },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[1]),
                        name: '妖妖梦'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[2]),
                        name: '永夜抄'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[3]),
                        name: '风神录'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[4]),
                        name: '地灵殿'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[5]),
                        name: '星莲船'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[6]),
                        name: '大战争'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[7]),
                        name: '神灵庙'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[8]),
                        name: '辉针城'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[9]),
                        name: '绀珠传'
                    },
                    {
                        value: lnetaChart.sum(lnetaChart.lnetaarray[10]),
                        name: '天空璋'
                    }
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };
        lnetaChart.Pie.setOption(lnetaChart.option2);
    },
    sum: function(data) {
        var re = 0;
        for (var i = 0; i < data.length; i++) {
            re += data[i];
        }
        return re;
    },
    judge: function(data) {
        switch (data.work) {
            case '红魔乡':
                if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[0][5] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[0][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[0][1] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[0][0] += 1;
                }
                break;
            case '妖妖梦':
                if (data.type.indexOf('NMNBNR') != -1) {
                    lnetaChart.lnetaarray[1][5] += 1;
                } else if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[1][4] += 1;
                } else if (data.type.indexOf('NBNR') != -1) {
                    lnetaChart.lnetaarray[1][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[1][1] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[1][2] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[1][0] += 1;
                }
                break;
            case '永夜抄':
                if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[2][5] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[2][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[2][1] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[2][0] += 1;
                }
                break;
            case '风神录':
                if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[3][5] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[3][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[3][1] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[3][0] += 1;
                }
                break;
            case '地灵殿':
                if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[4][5] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[4][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[4][1] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[4][0] += 1;
                }
                break;
            case '星莲船':
                if (data.type.indexOf('NMNBNV') != -1 || data.type.indexOf('NMNBNU') != -1) {
                    lnetaChart.lnetaarray[5][5] += 1;
                } else if (data.type.indexOf('NBNV') != -1 || data.type.indexOf('NBNU') != -1) {
                    lnetaChart.lnetaarray[5][3] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[5][2] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[5][1] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[5][0] += 1;
                }
                break;
            case '大战争':
                if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[6][5] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[6][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[6][1] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[6][0] += 1;
                }
                break;
            case '神灵庙':
                if (data.type.indexOf('NMNBNT') != -1) {
                    lnetaChart.lnetaarray[7][5] += 1;
                } else if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[7][4] += 1;
                } else if (data.type.indexOf('NBNT') != -1) {
                    lnetaChart.lnetaarray[7][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[7][1] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[7][2] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[7][0] += 1;
                }
                break;
            case '辉针城':
                if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[8][5] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[8][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[8][1] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[8][0] += 1;
                }
                break;
            case '绀珠传':
                if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[9][5] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[9][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[9][1] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[9][0] += 1;
                }
                break;
            case '天空璋':
                if (data.type.indexOf('NMNBNC') != -1) {
                    lnetaChart.lnetaarray[10][5] += 1;
                } else if (data.type.indexOf('NMNB') != -1) {
                    lnetaChart.lnetaarray[10][4] += 1;
                } else if (data.type.indexOf('NBNC') != -1) {
                    lnetaChart.lnetaarray[10][3] += 1;
                } else if (data.type.indexOf('NM') != -1) {
                    lnetaChart.lnetaarray[10][1] += 1;
                } else if (data.type.indexOf('NB') != -1) {
                    lnetaChart.lnetaarray[10][2] += 1;
                } else if (data.type.indexOf('低封') != -1) {
                    lnetaChart.lnetaarray[10][0] += 1;
                }
                break;
            default:
                break;
        }
    }
}
