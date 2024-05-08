var btn_tplink = document.getElementById("TL_WR845N");
var btn_mercusys = document.getElementById("MW305R");

var btn_fibra = document.getElementById("fibra");
var btn_mercusys = document.getElementById("asus");


btn_tplink.addEventListener("click",()=>{    
             download(this.btn_tplink.id);
  });  
  btn_mercusys.addEventListener("click",()=>{    
    download(this.btn_mercusys.id);
});  


btn_fibra.addEventListener("click",()=>{    
  download(this.btn_fibra.id);
});  
btn_asus.addEventListener("click",()=>{    
download(this.btn_asus.id);
});  



  function download(filename) {
      const link="../docs/"+filename+".pdf"
    window.open(link,"_blank");
  }