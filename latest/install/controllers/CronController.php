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
 * Class CronController
 */
class CronController extends Controller
{
    /**
     * Main action
     */
    public function actionIndex()
    {
        if (!getSession('admin')) {
            redirect('index.php?route=admin');
        }

        if (getPost('next')) {
            setSession('cron', 1);
            redirect('index.php?route=finish');
        }

        $this->data['pageHeading'] = 'Cron jobs';
        $this->data['breadcrumbs'] = array(
            'Cron jobs' => 'index.php?route=cron',
        );

        $this->render('cron');
    }
}
