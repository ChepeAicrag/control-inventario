const expresion =/^([1-9]+\\d*)|[0]/;
/* const formulario=document.getElementById('select_stock')

const expresion =/^([1-9]+\\d*)|[0]/;


const validar=(e)=>{
    console.log(e.target.value)
    if(!e.target.value){
        console.log('entre')
        e.target.keypress(false)
    }
}

formulario.addEventListener('keyup',validar); */


function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}

function validecimal(evt){
    console.log()
    
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
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
