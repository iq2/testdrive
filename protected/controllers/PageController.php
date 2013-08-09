<?php

class PageController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array(
                'allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array(
                'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array(
                'deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render(
            'view',
            array(
                'model' => $this->loadModel($id),
            )
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Page;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Page'])) {
            $model->attributes = $_POST['Page'];
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'page-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render(
            'create',
            array(
                'model' => $model,
            )
        );
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Page'])) {
            $model->attributes = $_POST['Page'];
            if ($model->save()) {

                $q = "DELETE FROM page_has_file WHERE page_id={$model->id}";
                $cmd = Yii::app()->db->createCommand($q);
                $cmd->execute();

                foreach ($_POST['Page']['files'] as $file) {
                    $q = "INSERT INTO page_has_file (page_id, file_id) VALUES ({$model->id}, :file_id)";
                    $cmd = Yii::app()->db->createCommand($q);
                    $cmd->bindParam(':file_id', $file, PDO::PARAM_INT);
                    $cmd->execute();
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render(
            'update',
            array(
                'model' => $model,
            )
        );
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        // =============================================
        $id = 3;
        $dataProvider = new CActiveDataProvider('Page');
        $q = 'SELECT * FROM page WHERE id=:id';
        $cmd = Yii::app()->db->createCommand($q);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->setFetchMode(PDO::FETCH_OBJ);
        $model = $cmd->queryRow();
        echo '<h1>Page Query 1 Result: </h1>';
        if ($model) {
            echo $model->title;
        }
        // =============================================
        $cmd = Yii::app()->db->createCommand();
        $cmd->select = 'title, user_id, content';
        $cmd->from = 'page';
        $cmd->order = 'date_published DESC';
        $cmd->limit = '1';
        $result = $cmd->query();
        var_dump($result);

        $cmd = Yii::app()->db->createCommand();
        $cmd->select('title, user_id, content')->from('page')->where('live=1')->limit('1');
        $result = $cmd->query();
        foreach ($result as $row)
        {
            echo $row['title'] . " " . $row['user_id'] . " " . $row['content'];
        }

        $this->render(
            'index',
            array(
                'dataProvider' => $dataProvider,
            )
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Page('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Page'])) {
            $model->attributes = $_GET['Page'];
        }

        $this->render(
            'admin',
            array(
                'model' => $model,
            )
        );
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Page the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Page::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Page $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'page-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
