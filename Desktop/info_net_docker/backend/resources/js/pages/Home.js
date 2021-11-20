import React, { useState, useEffect }　from 'react';
import axios from 'axios';
import { Button, Card } from '@material-ui/core';
import { makeStyles, createStyles } from '@material-ui/core/styles';
import MainTable from '../components/MainTable';

//スタイルの定義
const useStyles = makeStyles((theme) => createStyles({
    info: {
        margin: theme.spacing(5),
        padding: theme.spacing(3),
    },
    card: {
        margin: theme.spacing(5),
        padding: theme.spacing(3),
    }
}));

//ヘッダーのコンテンツ用の配列定義
const headerList = ['元請け会社名', '案件名', '期限', '進捗', '閲覧', '編集', '見積', '完了'];

function Home() {
    //定義したスタイルを利用するための設定
    const classes = useStyles();
    //postsの状態を管理する
    const [products, setProducts] = useState([]);

    //画面に到着したらgetPostsDataを呼ぶ
    useEffect(() => {
        getProjectData();
    },[])
    
　　//バックエンドからpostsの一覧を取得する処理
    const getProjectData = () => {
        axios
            .get('/api/projects')
            .then(response => {
                setProducts(response.data);     //バックエンドから返ってきたデータでpostsを更新する
                console.log(response.data);　//取得データ確認用のconsole.log()
            })
            .catch(() => {
                console.log('通信に失敗しました');
            });
    }
    //空配列として定義する
    let rows = [];
    //postsの要素ごとにrowsで使える形式に変換する
    products.map((product) =>
        rows.push({
            uname: product.maker_name,
            anken: product.name,
            end_date: product.end_date,
            status: product.status,
            viewBtn: <Button color="secondary" variant="contained">閲覧</Button>,
            editBtn: <Button color="primary" variant="contained">編集</Button>,
            mituBtn: <Button color="secondary" variant="contained">見積</Button>,
            arcBtn: <Button color="primary" variant="contained">完了</Button>,
        })
    );
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <div className="card">
                        <h1>タスク管理</h1>
                        <Card className={classes.card}>
                            {/* テーブル部分の定義 */}
                            <MainTable headerList={headerList} rows={rows} />
                        </Card>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Home;