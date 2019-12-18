<?php defined('INST_INSTALLER_PATH') || exit('No direct script access allowed');

/**
 *
 * @package    EasyAds
 * @author     CodinBit <contact@codinbit.com>
 * @link       https://store.codinbit.com
 * @copyright  2017 EasyAds (https://store.codinbit.com)
 * @license    https://www.codinbit.com
 * @since      1.3
 */

?>
<div class="callout callout-success">
    <h4>Greetings,</h4>
    <p>
        CodinBit's Team Thank you for purchasing our product EasyAds Classifieds CMS.<br />
        We will start by installing EasyAds on your server so please complete your license info. <br />
    </p>
</div>

<div class="callout callout-info">
    <h4><i class="icon fa fa-warning"></i> Important Privacy Notice!</h4>
    <p>
        Saving this form will make an external request to our API with this personal data from the form to validate your purchase code and domain in CodinBit's system!<br />
        If you have any question about this please feel free to read our privacy policy
        <a target="_blank" href="https://www.codinbit.com/privacy-policy">here</a> , terms and conditions
        <a target="_blank" href="https://www.codinbit.com/terms-and-conditions">here</a> or <a target="_blank" href="https://help.codinbit.com/support">submit a support ticket</a>
        and we answer all your questions.
    </p>
</div>

<form method="post">
    <div class="box box-primary borderless">
        <div class="box-header">
            <h3 class="box-title">Welcome - Please enter your license info</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="required">First name <span class="required">*</span></label>
                        <input placeholder="Your first name" class="form-control has-help-text<?php echo $context->getError('first_name') ? ' error':'';?>" name="first_name" type="text" value="<?php echo getPost('first_name', '');?>"/>
                        <?php if ($error = $context->getError('first_name')) { ?>
                            <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="required">Last name <span class="required">*</span></label>
                        <input placeholder="Your last name" class="form-control has-help-text<?php echo $context->getError('last_name') ? ' error':'';?>" name="last_name" type="text" value="<?php echo getPost('last_name', '');?>"/>
                        <?php if ($error = $context->getError('last_name')) { ?>
                            <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="required">Email <span class="required">*</span></label>
                        <input placeholder="Market place registered email" class="form-control has-help-text<?php echo $context->getError('email') ? ' error':'';?>" name="email" type="text" value="<?php echo getPost('email', '');?>"/>
                        <?php if ($error = $context->getError('email')) { ?>
                            <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="required">I bought the license from: <span class="required">*</span></label>
                        <select class="form-control has-help-text<?php echo $context->getError('market_place') ? ' error':'';?>" name="market_place">
                            <?php foreach ($marketPlaces as $marketPlace => $marketPlaceName) { ?>
                                <option value="<?php echo $marketPlace?>"<?php echo getPost('market_place', '') == $marketPlace ? ' selected="selected"':'';?>><?php echo $marketPlaceName;?></option>
                            <?php } ?>
                        </select>
                        <?php if ($error = $context->getError('market_place')) { ?>
                            <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="required">Purchase code <span class="required">*</span></label>
                        <input placeholder="Your purchase code" class="form-control has-help-text<?php echo $context->getError('purchase_code') ? ' error':'';?>" name="purchase_code" type="text" value="<?php echo getPost('purchase_code', '');?>"/>
                        <?php if ($error = $context->getError('purchase_code')) { ?>
                            <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input has-help-text<?php echo $context->getError('terms') ? ' error':'';?>" name="terms" type="checkbox" value="1"/>
                            <label class="form-check-label">
                                I Accept The <a target="_blank" href="https://www.codinbit.com/terms-and-conditions"> Terms and Conditions </a> *
                            </label>
                            <?php if ($error = $context->getError('terms')) { ?>
                                <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input has-help-text<?php echo $context->getError('marketing') ? ' error':'';?>" name="marketing" type="checkbox" value="I want to receive marketing emails and newsletters about CodinBit products</a>"/>
                            <label class="form-check-label">
                                I want to receive marketing emails and newsletters about CodinBit products</a>
                            </label>
                            <?php if ($error = $context->getError('marketing')) { ?>
                                <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button class="btn btn-primary btn-flat" value="1" name="next">Next</button>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
</form>