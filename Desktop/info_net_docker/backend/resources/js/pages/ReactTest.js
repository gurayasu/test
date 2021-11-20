import React from 'react';
import ReactDOM from 'react-dom';
import { Button } from '@material-ui/core'; //Buttonをインポート

function ReactTest() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Readct テスト!!</div>

                        <div className="card-body">表示されたかな？!</div>
                        <Button color="secondary" variant="contained" href={`/`}>Homeに遷移ボタン</Button>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default ReactTest;

