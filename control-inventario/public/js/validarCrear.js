const expresion =/^([1-9]+\\d*)|[0]/;


function valideKey(evt){
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { 
      return true;
    } else if(code>=48 && code<=57) { 
      return true;
    } else{ 
      return false;
    }
}

function validecimal(evt){
    console.log()
    
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { 
      return true;
    } else if(code>=48 && code<=57) { 
      return true;
    } else{ 
      if(evt.key=='.'){
         if(!evt.target.value.includes('.')&evt.target.value.length>0){
            return true;
         }else{
             return false;
         }
      }else{
        return false;
      }
      
    }
}
