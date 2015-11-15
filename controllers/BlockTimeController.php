<?php

namespace app\controllers;

use Yii;
use app\models\BlockTime;
use app\models\BlockTimeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Coreproc\Gcm\GcmClient;
use Coreproc\Gcm\Classes\Message;
use app\models\UserHasCourse;
use app\models\InvokerUser;

/**
 * BlockTimeController implements the CRUD actions for BlockTime model.
 */
class BlockTimeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BlockTime models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlockTimeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlockTime model.
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
     * Creates a new BlockTime model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlockTime();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //each time a block Time is created , it fetches all the registration tokens of all the users with the course and sends them a push notification

            $UsersHasCourse = UserHasCourse::findAll(["course_id" => $model->course_id]);
            foreach ($UsersHasCourse as $user_one) {
                $User = InvokerUser::findOne(['id' => $user_one['user_id']]);
                $gcmClient = new GcmClient('AIzaSyC9s--GZZIqeHPJEzo3si4-FVrprPMXITI');
                $message = new Message($gcmClient);
                $message->addRegistrationId($User->reg_token);
                $message->setData([
                    'title' => 'New Block Time',
                    'message' => [
                        'starttime' => $model->starttime,
                        'endtime' => $model->endtime
                    ],
                ]);
                try {

                    $response = $message->send();
                    // The send() method returns a Response object
                    print_r($response);
                    //exit(1);
                } catch (Exception $exception) {
                    echo 'uh-oh: ' . $exception->getMessage();
                    //exit(1);
                }
            }
            
            /*
            $gcmClient = new GcmClient('AIzaSyDFx-7O1Zo54ACfc8IbzuTMN4ldigpBWZg');
            $message = new Message($gcmClient);
            $message->addRegistrationId('c3-9JrUtYXU:APA91bHnqS9yPF3fOIAblcqSf9weYUe02NT9o20OP8cDts3B7qwysxqg5YSL0lvxMvvn6sb6xSCo1t2cCxqWMjCGc3EiCsPhhn4wvUExU2ri8OZekXVY-lSssLvFLFvsJHHifMifigJz');
            $message->setData([
                'title' => 'Sample Push Notification',
                'message' => $model,
            ]);
            try {

                $response = $message->send();
                // The send() method returns a Response object
                print_r($response);
                //exit(1);
            } catch (Exception $exception) {
                echo 'uh-oh: ' . $exception->getMessage();
                exit(1);
            }
            */


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BlockTime model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BlockTime model.
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
     * Finds the BlockTime model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BlockTime the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlockTime::findOne($id)) !== null) {
            $model->institute = $model->getInstitute();
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
