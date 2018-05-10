var Rep= {
    init: function() {
        $("#rep_upload").dropzone({
            url: "php/repupload.php",
            maxFilesize: 1,
            acceptedFiles: ".rpy",
            init: function() {
                this.on("addedfile", function(file) {
                    if (file.name.substring(file.name.length-4, file.name.length) == ".rpy") {
                        toastr.info('上传中');
                    }
                    else {
                        toastr.error('rep文件格式错误！');
                        location.reload();
                    }
                });
                this.on("success", function(file, data) {
                	if(data.substring(0,2)=="成功") {
                        toastr.success('上传成功，少女分析中。。。');
                        var name=data.split(",")[1];
                        location="../represult.php?rep="+name;
                    }else{
                		toastr.error(data);
					}
                });
            }
        });
    }
}
