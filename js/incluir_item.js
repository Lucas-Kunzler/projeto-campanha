
    function ckChange(ckType){
        var ckName = document.getElementsByName(ckType.name);
        var checked = document.getElementById(ckType.id);

        const Roupa = document.querySelector(".roupa"),
                cores = document.querySelectorAll(".cores"),
                label = document.querySelectorAll(".label");
    
        if (checked.checked){
          for(var i=0; i < ckName.length; i++){
    
              if(!ckName[i].checked){
                  ckName[i].disabled = true;
              }else{
                  ckName[i].disabled = false;
              }
          } 
        } else {
          for(var i=0; i < ckName.length; i++){
            ckName[i].disabled = false;
          } 
        }

        if(!Roupa.checked){
            for(i=0; i< cores.length; i++){
                cores[i].disabled = true;
                label[i].style.color = "var(--border-color-light)";
            }
        } else {
            for(i=0; i< cores.length; i++){
                cores[i].disabled = false;
                label[i].style.color = "#000";
            }
        }
    }
    