<?php defined('INST_INSTALLER_PATH') || exit('No direct script access allowed');

/**
 *
 * @package    EasyAds
 * @author     CodinBit <contact@codinbit.com>
 * @link       https://store.codinbit.com
 * @copyright  2017 EasyAds (https://store.codinbit.com)
 * @license    https://www.codinbit.com
 * @since      1.0
 */

/**
 * Class FinishController
 */
class FinishController extends Controller
{
    /**
     * Main action
     */
    public function actionIndex()
    {
        if (!getSession('cron')) {
            redirect('index.php?route=cron');
        }

        $this->data['pageHeading'] = 'Finish';
        $this->data['breadcrumbs'] = array(
            'Finish' => 'index.php?route=finish',
        );

        $this->render('finish');
    }

}
