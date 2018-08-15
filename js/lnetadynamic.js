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
        lnetaChart.initData();
    },
    initData: function() {
        $.ajax({
            type: "GET",
            url: "lneta.json",
            success: function(data) {
                lnetaChart.initChart();
                //单低封，单NM，单NB(妖星神天)，单NB(其他)和双NB(妖星神天)，NMNB(妖星神天)，NMNB(其他)和3N
                var index=0;
                var start = new Date("2009-07-01");
                var end = lnetaChart.addDate(start);
                var now = new Date(data[index].time);
                setInterval(function () {
                    console.log(start.getFullYear()+" 年 "+(start.getMonth()+1)+" 月");
                    while(now.getTime()>=start.getTime() && now.getTime()<end.getTime()) {
                        lnetaChart.judge(data[index]);
                        index++;
                        now = new Date(data[index].time);;
                    }
                    start = lnetaChart.addDate(start);
                    end = lnetaChart.addDate(start);
                    lnetaChart.refreshChart();
                }, 3000);
            }
        });
    },
    addDate: function(date){
        var d=new Date();
        d.setTime(date.getTime());
        d.setMonth(d.getMonth()+1);
        return d;
    },
    sortxAxis: function () {
        var xa = [];
        var a = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        for (var i = 0; i <11 ; i++) {
            xa.push({work:a[i], num:lnetaChart.sum(lnetaChart.lnetaarray[i])});
        }
        var colId = "num";
        var desc = function(x,y)
        {
            return (x[colId] < y[colId]) ? 1 : -1
        }
        xa.sort(desc);
        return xa;
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
    sortdata: function (xa, k) {
        var ar=[];
        $.each(xa, function(n, value) {
            ar.push(lnetaChart.lnetaarray[value.work][k]);
        });
        return ar;
    },
    refreshChart :function () {
        var w = ['红魔乡', '妖妖梦', '永夜抄', '风神录', '地灵殿', '星莲船', '大战争', '神灵庙', '辉针城', '绀珠传', '天空璋'];
        var wa=[];
        var xa=lnetaChart.sortxAxis();
        $.each(xa, function(n, value) {
            wa.push(w[value.work]);
        });
        lnetaChart.Chart.setOption({
            xAxis: [{
                type: 'category',
                data: wa
            }],
            series: [{
                name: '单低封',
                type: 'bar',
                stack: '类型',
                barWidth: '70%',
                data: lnetaChart.sortdata(xa, 0)
            },
                {
                    name: '单NM',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: lnetaChart.sortdata(xa, 1)
                },
                {
                    name: '单NB(妖星神天)',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: lnetaChart.sortdata(xa, 2)
                },
                {
                    name: '单NB(其他)和双NB(妖星神天)',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: lnetaChart.sortdata(xa, 3)
                },
                {
                    name: 'NMNB(妖星神天)',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: lnetaChart.sortdata(xa, 4)
                },
                {
                    name: 'NMNB(其他)和3N',
                    type: 'bar',
                    stack: '类型',
                    barWidth: '70%',
                    data: lnetaChart.sortdata(xa, 5)
                }
            ]
        });
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
