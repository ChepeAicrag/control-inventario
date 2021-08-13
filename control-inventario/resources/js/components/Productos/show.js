import React from 'react';
import ReactDOM from 'react-dom';

function mostrarProductos() {
    const [data, setData] = useState([]);
    const [peticion,setPeticion]=useState('renta/mostrar');
    async function getData(){ 
        try{
            let res= await axios.get(peticion),
            json=await res.data
            console.log(json)
            setData(res.data)
        }catch(err){
            console.log(err)
        }

    }

    useEffect(()=>{
        getData()
        
    },[]);

    return (
        <>
        <div className="container">
            <h1 className="subtitulo mt-5">Mis rentas</h1>
               <div id="exTab1">	
                    <ul  className="nav nav-tabs">
                            <li className="nav-item">
                                <a  href="#1a" className="nav-link active"  data-toggle="tab">PENDIENTES</a>
                            </li>
                            <li>
                                <a href="#2a" className="nav-link"  data-toggle="tab">POR ACEPTAR PAGO</a>
                            </li>

                            <li>
                                <a href="#3a" className="nav-link" data-toggle="tab">EN PROCESO</a>
                            </li>

                            <li>
                                <a href="#4a" className="nav-link"  data-toggle="tab">FINALIZADAS</a>
                            </li>

                        </ul>

                </div>
                <div className="tab-content clearfix tab-pane active table-wrapper-scroll-y3 my-custom-scrollbar3 "  >
                    <table className=" tab-pane active table table-dark mt-2 mb-5"  id="1a">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha Entrega</th>
                            <th scope="col">Precio Total</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            {
                                data.length>0 &&
                                    data.map(renta => {
                                    return(
                                            <tr key={renta.id}>
                                                <th scope="row">{renta.id}</th>
                                                <td>{renta.nombre}</td>
                                                <td>$ {renta.descripcion}</td>
                                            </tr>
                                        )
                                    }
                                    )
                                
                            }
                        </tbody>
                    </table>
        </div>
        </div>
        </>
    );
}

export default Example;

if (document.getElementById('mostarProductos')) {
    ReactDOM.render(<MostrarProductos />, document.getElementById('mostarProductos'));
}
