
    function ckChange(ckType){


        //habilitar & desabilitar as outras opções da mesma caixa

        var ckName = document.getElementsByName(ckType.name);
        var checked = document.getElementById(ckType.id);

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


        // habilitar & desabilitar sexo

        const Roupa = document.querySelector(".roupa"),
                sexo = document.querySelectorAll(".sexo"),
                label = document.querySelectorAll(".label");

        if(!Roupa.checked){
            for(i=0; i< sexo.length; i++){
                sexo[i].disabled = true;
                label[i].style.color = "var(--border-color-light)";
            }
        } else {
            for(i=0; i< sexo.length; i++){
                sexo[i].disabled = false;
                label[i].style.color = "#000";
            }
        }
    }
    