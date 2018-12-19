// 声音文件的十六进制码
var Sound_Array = {
    "elephant":   "53595354454c455048414e545f300e460000",
    "tiresqueal": "535953545449524553515545414c0e460000",
    "hi":         "53595354444153485f48495f564f0b00c900",
    "bragging":   "535953544252414747494e4731410b232300",
    "ohno":       "5359535456375f4f484e4f5f30390b000000",
    "ayayay":     "53595354434f4e46555345445f310b000000",
    "confused2":  "53595354434f4e46555345445f320b000000",
    "confused3":  "53595354434f4e46555345445f330b000000",
    "confused5":  "53595354434f4e46555345445f350b000000",
    "confused8":  "53595354434f4e46555345445f380b000000",
    "brrp":       "53595354434f4e46555345445f360b000000",
    "charge":     "535953544348415247455f3033000b000000"
}

// 寻找dash
function find() {
    navigator.bluetooth.requestDevice({
        acceptAllDevices: true
    }).then(device => {
        console.log('Connecting to GATT Server...');
        return device.gatt.connect();
    }).catch(error => {
        console.log(error.valueOf());
    });
}

// 获取dash服务
function getCommand() {
    navigator.bluetooth.requestDevice({
        filters: [{services: ['af237777-879d-6186-1f49-deca0e85d9c1']}]
    }).then(device => {
        console.log('Connecting to GATT Server...');
        return device.gatt.connect();
    }).then(server => {
        console.log('Getting Service...');
        return server.getPrimaryService('af237777-879d-6186-1f49-deca0e85d9c1');
    }).then(service => {
        console.log('Getting Characteristic...');
        return service.getCharacteristic('af230002-879d-6186-1f49-deca0e85d9c1');
    }).then(characteristic => {
        console.log('> Characteristic UUID:  ' + characteristic.uuid);
        console.log('> Broadcast:            ' + characteristic.properties.broadcast);
        console.log('> Read:                 ' + characteristic.properties.read);
        console.log('> Write w/o response:   ' +
            characteristic.properties.writeWithoutResponse);
        console.log('> Write:                ' + characteristic.properties.write);
        console.log('> Notify:               ' + characteristic.properties.notify);
        console.log('> Indicate:             ' + characteristic.properties.indicate);
        console.log('> Signed Write:         ' +
            characteristic.properties.authenticatedSignedWrites);
        console.log('> Queued Write:         ' + characteristic.properties.reliableWrite);
        console.log('> Writable Auxiliaries: ' +
            characteristic.properties.writableAuxiliaries);
        commandCharacteristic = characteristic;
    }).catch(error => {
        console.log(error);
        commandCharacteristic = null;
    });
}

// 改变左耳颜色
function changeLeftEarColor(Color) {
    let cmd = ('0b' + Color).dashcommand();
    console.log("Change Left Ear Color, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 改变右耳颜色
function changeRightEarColor(Color) {
    let cmd = ('0c' + Color).dashcommand();
    console.log("Change Right Ear Color, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 改变颈部颜色
function changeNeckColor(Color) {
    let cmd = ('03' + Color).dashcommand();
    console.log("Change Neck Color, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 改变头部颜色
function changeHeadColor(Color) {
    let cmd = ('0d' + Color).dashcommand();
    console.log("Change Head Color, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 改变尾部亮度
function changeTailBrightness(Brightness) {
    let brightness = parseInt(Brightness, 10).toString(16).leftfix(2);
    let cmd = ('04' + brightness).dashcommand();
    console.log("Change Tail Brightness, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 改变眼睛亮度
function changeEyeBrightness(Brightness) {
    let brightness = parseInt(Brightness, 10).toString(16).leftfix(2);
    let cmd = ('08' + brightness).dashcommand();
    console.log("Change Eye Brightness, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 控制眼睛LED开关
function changeEyeOnoff(Onoff) {
    let onoff = parseInt(Onoff, 2);
    console.log("Eye Onoff Queue: " + onoff.toString(2).leftfix(12))
    let cmd = ('09' + onoff.toString(16).leftfix(4)).dashcommand();
    console.log("Change Eye Onoff, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 控制点头角度
function changeNodeAngle(Angle) {
    let angle = parseInt(Angle, 10);
    if(angle < 0){
        angle = (Math.abs(angle) ^ 0xff) + 1
    }
    angle = angle & 0xff
    let cmd = ('07' + angle.toString(16).leftfix(2)).dashcommand();
    console.log("Change Node Angle, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 控制摇头角度
function changeShakeAngle(Angle) {
    let angle = parseInt(Angle, 10);
    if(angle < 0){
        angle = (Math.abs(angle) ^ 0xff) + 1
    }
    angle = angle & 0xff
    let cmd = ('06' + angle.toString(16).leftfix(2)).dashcommand();
    console.log("Shake Node Angle, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 控制机器人说话
function say(Say) {
    let sound = Sound_Array[Say];
    let cmd = ('18' + sound).dashcommand();
    console.log("Bot say, Command: " + cmd.getcommand());
    commandCharacteristic.writeValue(cmd);
}

// 生成命令数据流
String.prototype.dashcommand=function(){
    var str = this;
    var stack = [];
    // 奇数补0
    if(str.length % 2 != 0){
        str += '0';
    }
    for(var i = 0;i < str.length / 2;i++){
        stack.push(parseInt(str.substring(2 * i, 2 * i +2), 16));
    }
    return new Uint8Array(stack);
}

// 由数据流获取指令
Uint8Array.prototype.getcommand=function(){
    var stack = [];
    for(var i=0;i < this.length; i++){
        stack.push(this[i].toString(16).leftfix(2));
    }
    return stack.join("");
}

// 左补0
String.prototype.leftfix=function(num){
    let str = this
    while(str.length<num){
        str = '0'+  str ;
    }
    return str;
};

