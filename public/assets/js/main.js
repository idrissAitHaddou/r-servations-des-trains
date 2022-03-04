
// les constantes

  const aside   =    document.getElementById("aside");
  const menu    =    document.getElementById("menu");
  const content =    document.getElementById("content-h");


// function to toggle Menu 
  menu.onclick = function(){
    if(window.innerWidth<=800){
      aside.classList.toggle("toogle-Aside-mobile");
    }else{
      aside.classList.toggle("toogle-Aside");
    }
      content.classList.toggle("col-12");
  }


  
