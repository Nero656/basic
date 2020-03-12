<?php

namespace app\controllers;
use app\models\EntryForm;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use app\models\addCountry;

class CountryController extends Controller
{
    public function actionIndex($filter = '1', $colum = '')
    {
        $query = Country::find() -> where('population > '.$filter);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy($colum)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);

    }

    public function actionAdd()
    {

        $model = new addCountry();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->save();

            return $this->render('countryConfirm', ['model' => $model]);

        } else {

            return $this->render('country', ['model' => $model]);

        }

    }

}
