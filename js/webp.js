var webp={
  init:function() {
      if (!webp.checkWebp()) {
          $("img").each(function() {
              id=this.id;
              sr=$('#'+id)[0].src;
              $('#'+id).attr("src",sr .substring(0,sr.length-4)+"png");
          })
          if ($("#backimg")){
              var s = "img/mafuyo.png";
              $("#backimg").css("background-image", "url("+s+")");
          }
      }
  },
  checkWebp:function() {
      try{
          return (document.createElement('canvas').toDataURL('image/webp').indexOf('data:image/webp') == 0);
      }catch(err) {
          return  false;
      }
  }
};
