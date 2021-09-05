import React from 'react';
import ReactDOM from 'react-dom';

function SelectN() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">adsasdas</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default SelectN;

if (document.getElementById('selectN')) {
    ReactDOM.render(<SelectN />, document.getElementById('selectN'));
}
