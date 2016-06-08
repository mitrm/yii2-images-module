<?php

namespace mitrm\images\controllers;

use Yii;
use mitrm\images\models\ImagesCommon;
use mitrm\images\models\search\ImagesCommonSearch;
use backend\components\Controller;
use yii\helpers\FileHelper;
use yii\image\drivers\Image;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use mitrm\images\Module;

/**
 * ImagesCommonController implements the CRUD actions for ImagesCommon model.
 */
class ImagesCommonController extends Controller
{

    public function actionUploadModal()
    {
        // Загружаем файл
        $file_upload = UploadedFile::getInstanceByName('images');
        // Сохраняем файл
        $file_name = md5($file_upload->name . uniqid());
        $file_ext = strrchr($file_upload->name, '.');

        $file_dir = substr($file_name, 0, 2);
        $file_base_path = Yii::getAlias($this->module->base_path);
        FileHelper::createDirectory($file_base_path, 0777, true);
        $file_path = Yii::getAlias($this->module->base_path) . DIRECTORY_SEPARATOR . $file_dir;
        FileHelper::createDirectory($file_path, 0777, true);
        $file = $file_path . DIRECTORY_SEPARATOR . $file_name . $file_ext;
        //$imageTmp = Image::getImagine()->open($file_upload->tempName)->save($file);

        $imageTmp = Image::factory($file_upload->tempName, $this->module->image_driver);
        $imageTmp->save($file, 100);

        // Сохраняем в базу данных

        $model = new ImagesCommon();
        $model->exp = $file_ext;
        $model->name = $file_name;
        $model->path = $file_dir;
        $model->is_active = 1;
        if(!$model->save()) {
            Yii::error([
                'msg' => 'Ошибка сохрание загруженного изображения',
                'data' => [
                    'error' => $model->errors,
                ],
            ]);
            unlink($file);
            return [];
        }

        return [
            'status' => $status,
            'url' => $url,
            'message' => $message,
        ];
    }

    /**
     * Lists all ImagesCommon models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImagesCommonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ImagesCommon model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ImagesCommon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ImagesCommon();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ImagesCommon model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ImagesCommon model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ImagesCommon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ImagesCommon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ImagesCommon::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
