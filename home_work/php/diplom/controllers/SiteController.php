<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\QuestionForm;
use app\models\User;
use app\models\Question;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * @return string
     */
    public function actionQuestion()
    {
        $model = new QuestionForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //Данные удачно проверены
    //Записываем данные в БД
            $user = new User();
            $question = new Question();

            $finduser = User::find()->where(['name' => $model->name])->andWhere(['email' => $model->email])->one();
            if ($finduser) {
                /**
                 *  что делать если пользователь уже существет, в БД писать его не надо, а вопрос надо записать в БД
                 */
                die;
            } else {
                $user->name = $model->name;
                $user->email = $model->email;
                $user->save();

                $user_id = User::find()->select('id')->where(['name' => $model->name]);

                $question->category_id = 1;
                $question->question = $model->question;
                $question->user_id = $user_id;
                $question->status = 'new';
                $question->save();
            }

            return $this->render('question-confirm', ['model' => $model]);
        } else {
            //Либо есть ошибка, либо страница отображается первый раз

            return $this->render('question', ['model' => $model]);
        }
    }

}
