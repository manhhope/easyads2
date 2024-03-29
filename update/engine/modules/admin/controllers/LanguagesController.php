<?php

/**
 *
 * @package    EasyAds
 * @author     CodinBit <contact@codinbit.com>
 * @link       https://store.codinbit.com
 * @copyright  2017 EasyAds (https://store.codinbit.com)
 * @license    https://www.codinbit.com
 * @since      1.0
 */

namespace app\modules\admin\controllers;

use app\models\Language;
use app\models\LanguageSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Controls the actions for languages section
 *
 * @Class LanguagesController
 * @package app\modules\admin\controllers
 */
class LanguagesController extends \app\modules\admin\yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all languages
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new LanguageSearch();
        $dataProvider = $searchModel->search(request()->queryParams);
        $dataProvider->pagination->pageSize=10;

        $this->setViewParams([
            'pageTitle'      => view_param('pageTitle') . ' | ' . t('app', 'Languages'),
            'pageHeading'    => t('app', 'Languages'),
        ]);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a specific language
     *
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $this->setViewParams([
            'pageTitle'      => view_param('pageTitle') . ' | ' . t('app', 'Language {languageName}', ['languageName'=>$model->name]),
            'pageHeading'    => t('app', 'Language {languageName}', ['languageName'=>$model->name]),
            'pageBreadcrumbs'=> [
                ['label' => t('app', 'Languages'), 'url' => ['index']] ,
                t('app', 'View'),
            ],
        ]);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new language
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Language();

        $this->setViewParams([
            'pageTitle'      => view_param('pageTitle') . ' | ' . t('app', 'Create Language'),
            'pageHeading'    => t('app', 'Create Language'),
            'pageBreadcrumbs'=> [
                ['label' => t('app', 'Languages'), 'url' => ['index']] ,
                t('app', 'Create'),
            ],
        ]);

        if ($model->load(request()->post()) && $model->save()) {
            notify()->addSuccess(t('app','Your action is complete.'));
            return $this->redirect(['view', 'id' => $model->language_id]);
        } else {
            return $this->render('form', [
                'action'=> 'create',
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates a specific language
     *
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->setViewParams([
            'pageTitle'      => view_param('pageTitle') . ' | ' . t('app', 'Update {languageName}', ['languageName'=>$model->name]),
            'pageHeading'    => t('app', 'Update {languageName}', ['languageName'=>$model->name]),
            'pageBreadcrumbs'=> [
                ['label' => t('app', 'Languages'), 'url' => ['index']] ,
                t('app', 'Update'),
            ],
        ]);

        if ($model->load(request()->post()) && $model->language_id == 1) {
                notify()->addWarning(t('app','Sorry, but you cannot update initial language'));
                return $this->redirect(['/admin/languages']);
        }
        if ($model->load(request()->post()) && $model->save()) {
            notify()->addSuccess(t('app','Your action is complete.'));
            return $this->redirect(['view', 'id' => $model->language_id]);
        } else {
            return $this->render('form', [
                'action'=> 'update',
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes a specific language
     *
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        if ($id == 1) {
            notify()->addWarning(t('app','Sorry, but you cannot delete initial language'));
            return $this->redirect(['/admin/languages']);
        }

        $this->findModel($id)->delete();

        notify()->addSuccess(t('app', 'Your action is complete.'));

        return $this->redirect(['/admin/languages']);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionActivate($id)
    {
        $model =  $this->findModel($id);
        $model->activate();
        notify()->addSuccess(t('app', 'Your action is complete.'));

        return $this->redirect(['/admin/languages']);
    }

    public function actionDeactivate($id)
    {
        if ($id == 1) {
            notify()->addWarning(t('app','Sorry, but you cannot set status inactive to the initial language'));
            return $this->redirect(['/admin/languages']);
        }

        $model =  $this->findModel($id);
        $model->deactivate();
        notify()->addSuccess(t('app', 'Your action is complete.'));

        return $this->redirect(['/admin/languages']);
    }

    /**
     * @param $id
     * @return static
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Language::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
