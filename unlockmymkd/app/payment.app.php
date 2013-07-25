<?php

/**
 *    支付方式管理控制器
 *
 *    @author    Garbin
 *    @usage    none
 */
class PaymentApp extends BackendApp
{
    function index()
    {
        /* 读取已安装的支付方式 */
        $model_payment =& m('payment');
        $payments      = $model_payment->get_builtin();
        $white_list    = $model_payment->get_white_list();
        foreach ($payments as $key => $value)
        {
            $payments[$key]['system_enabled'] = in_array($key, $white_list);
        }
        $this->assign('payments', $payments);
        $this->display('payment.index.html');
    }

    /**
     *    启用
     *
     *    @author    Garbin
     *    @return    void
     */
    function enable()
    {
        $code = isset($_GET['code'])    ? trim($_GET['code']) : 0;
        if (!$code)
        {
            $this->show_warning('no_such_payment');

            return;
        }
        $model_payment =& m('payment');
        if (!$model_payment->enable_builtin($code))
        {
            $this->show_warning($model_payment->get_error());

            return;
        }

        $this->show_message('enable_payment_successed');

    }

    /**
     *    禁用
     *
     *    @author    Garbin
     *    @return    void
     */
    function disable()
    {
        $code = isset($_GET['code'])    ? trim($_GET['code']) : 0;
        if (!$code)
        {
            $this->show_warning('no_such_payment');

            return;
        }
        $model_payment =& m('payment');
        if (!$model_payment->disable_builtin($code))
        {
            $this->show_warning($model_payment->get_error());

            return;
        }

        $this->show_message('disable_payment_successed');
    }
	
	/*
	*支付方式配置
	*
	*/
	
	function config()
	{
	    $payment_code = $_GET['id'];
        if (!$payment_code)
        {
            echo Lang::get('no_such_payment');
            return;
        }
        $model_payment =& m('payment');
        $payment_info  = $model_payment->get("store_id =0 AND payment_code='{$payment_code}'");
        if (!$payment_info)
        {
            echo Lang::get('no_such_payment');

            return;
        }
        $payment = $model_payment->get_builtin_info($payment_info['payment_code']);
        if (!$payment)
        {
            echo Lang::get('no_such_payment');

            return;
        }

        if (!IS_POST)
        {
            $payment['payment_id']  =   $payment_info['payment_id'];
            $payment['payment_desc']=   $payment_info['payment_desc'];
            $payment['enabled']     =   $payment_info['enabled'];
            $payment['sort_order']  =   $payment_info['sort_order'];
            $this->assign('yes_or_no', array(Lang::get('no'), Lang::get('yes')));
            $this->assign('config', unserialize($payment_info['config']));
            $this->assign('payment', $payment);
             $this->display('payment.control.html');
        }
        else
        {
            $data = array(
                'payment_desc'  =>  $_POST['payment_desc'],
                'config'        =>  $_POST['config'],
                'enabled'       =>  $_POST['enabled'],
                'sort_order'    =>  $_POST['sort_order'],
            );
            $model_payment->edit("store_id =0 AND payment_code='{$payment_code}'", $data);
            if ($model_payment->has_error())
            {
                $this->show_warning($model_payment->get_error());
//                $msg = $model_payment->get_error();
//                $this->pop_warning($msg['msg']);
//                return;
            }
            //$this->pop_warning('ok', 'my_payment_config');
            $this->show_message('config_payment_successed');
        }
	}
}

?>