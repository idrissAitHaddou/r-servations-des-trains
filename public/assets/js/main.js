
// les constantes

  const aside =  document.getElementById("aside");
  const menu  =  document.getElementById("menu");
  const content =  document.getElementById("content-h");


// function to toggle Menu 
  menu.onclick = function(){
      aside.classList.toggle("hideAside");
      content.classList.toggle("col-12");
  }


  
