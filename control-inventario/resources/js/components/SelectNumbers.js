import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import TextField from '@material-ui/core/TextField';
import '../../css/selectNumber.css';



function SelectNumber(){
    const [number, setNumber] = useState('0');
    const validateNumber = (event) => {
        const value = parseInt(event.target.value, 10);
        if(Number.isInteger(value)){
            const setValue =  value>=0 ? value : number;
            setNumber(setValue);
        }
        
    };

    

    useEffect(()=>{
        
    },[]);

    return(
        <>   
            
                <div className="form-group stock-css mt-4">
                    <label className="articulo">Stock</label>
                    <br></br>
                    <TextField
                        id="outlined-number"
                        onChange={validateNumber}
                        value={number}
                        type="number"
                        InputLabelProps={{
                            shrink: true,
                        }}
                        variant="outlined"
                    />
                    
                </div>
            

           
        
        </>
    )
}




export default SelectNumber;

if (document.getElementById('selectNumber')) {
    ReactDOM.render(<SelectNumber />, document.getElementById('selectNumber'));
}