                <script type="text/javascript">
                $(function(){
                   $('#check_coupon').click(function(){
                       var coupon_sn = $('#coupon_sn').val();
                       if(coupon_sn == '')
                       {
                           return;
                       }
                       $.getJSON("index.php?app=order&act=check_coupon", {coupon_sn: coupon_sn, store_id: '<?php echo $_GET['store_id']; ?>'}, function(data){
                           if(data['retval'])
                           {
                               $('.unusable').hide();
                               var msg = '有效 该优惠券的优惠价格为';
                               var str = price_format(data['retval']['price']);
                               $('.usable').show().html(msg + str).css("display","block");
                           }
                           else
                           {
                               $('.usable').hide();
                               $('.unusable').show().css("display","block");
                               $('#coupon_sn').val('');
                           }
                       });
                   });
				   
				    // tyioocom
				   $('#yz_integral').change(function(){
					   max_integral = integral_max_exchange_init(true);
				   });
				   
				   function integral_max_exchange_init(returnValue)
				   {
						radioValue=$('#temp_value').val()?parseFloat($('#temp_value').val()):0;
						change_value=$('#yz_integral').val()?parseFloat($('#yz_integral').val()):0;
						change_value = (change_value * <?php echo $this->_var['exchange_rate']; ?>).toFixed(2);
						change_value = parseFloat(change_value);
					   	if(goodsstate!=1)
					    {
						   if(parseFloat($('#yz_integral').val()) < 0)
						   {
							   $('.make_sure .btn').attr('href','JavaScript:;');  // 积分值不在许可的范围内，禁止提交
							   alert('积分值不能为负数');  
						   }
						   else if(parseFloat($('#yz_integral').val()) > <?php echo $this->_var['yz_integral']['your_integral']; ?>){
							   $('.make_sure .btn').attr('href','JavaScript:;');  // 积分值不在许可的范围内，禁止提交
							   alert('你没有足够的积分，你目前的积分总额为：<?php echo $this->_var['yz_integral']['your_integral']; ?>');
						   }
						   else if( change_value > radioValue+goods_amount ){
							   $('.make_sure .btn').attr('href','JavaScript:;');  // 积分值不在许可的范围内，禁止提交
							   alert('您输入的积分所代表的价值大于本次订单的金额');
						   }
						   else {
							   value = accSub(goods_amount+radioValue,change_value);
							   $('.make_sure .btn').attr('href',"javascript:void($('#order_form').submit());"); 
							   //$('#temp_value').val(value);
							   $('#order_amount').html(price_format(value));
							   $('#final_price').val(value);
							   using_jifen = $('#yz_integral').val()?$('#yz_integral').val():0;
							   $('#using_jifen').val(using_jifen);
							   $('#jifen_value').html('-'+price_format(change_value));
						   }
					    }
					    return change_value;

				   }
				   integral_max_exchange_init(false);  //  初始化可抵扣的最高积分值
				   // end 
				   
               });
                </script>
                <div class="make_sure">
                    <div style="width:970px;margin-top:10px;padding:5px; position:relative; height:120px;">
                    <p style=" position:absolute;top:5px;right:0;width:600px;">
                    
                            <label>积分：使用</label><input id="yz_integral" type="text" name="exchange_integral" class="text" style="border:#ddd 1px solid; background:#fff; width:50px;" <?php if ($this->_var['yz_integral']['integral_state']): ?><?php if ($this->_var['yz_integral']['your_integral'] < $this->_var['yz_integral']['max_exchange']): ?>value="0"<?php else: ?>value="<?php echo $this->_var['yz_integral']['max_exchange']; ?>"<?php endif; ?> disabled="disabled" <?php endif; ?> />点（共有<?php echo $this->_var['yz_integral']['your_integral']; ?>点）<label style="margin-left:30px"><strong  id="jifen_value" style="color:#FF6600;font-size:14px"></strong></label>
                            
					</p>
                    <p style=" position:absolute;top:50px;right:0;width:440px;">
                        订单总价：
					    <strong  id="order_amount" style="color:#FF6600;font-size:18px"></strong>
                        
					</p>
                    <p style=" position:absolute;top:80px;right:0;width:440px;">
                        <?php if ($this->_var['yz_integral']['has_integral']): ?>本次订单赠送：<strong style="color:#FF6600;"><?php echo $this->_var['yz_integral']['has_integral']; ?></strong> 积分<?php endif; ?>&nbsp;&nbsp;
					</p>
					<?php if ($this->_var['goods_info']['allow_coupon']): ?>
					<p style="float:left;width:100px;"><input type="button" style="cursor:pointer" class="btn-allow-coupon" onclick="$(this).parent('p').next().toggle();$('#coupon_sn').val('');$('#yz_integral').val('');$('#useintegral').hide();" value="使用优惠卷" />
                    </p>
                    <p id="usecoupon" style="display:none; background:#EBF4FB;position:absolute;left:8px;top:40px;border:1px #ddd solid;width:400px; height:60px;padding:5px;">优惠券编号：
                    <input type="text" name="coupon_sn" id="coupon_sn" class="text" style="border:#ddd 1px solid; background:#fff;" />  
                       <input type="button" value="检查" class="check" id="check_coupon" />
					   <br />
                       <span class="usable" style="display:none;top:40px; position:absolute;left:5px;">有效 该优惠券的优惠价格为</span><br />
					   <span class="unusable" style="display:none;top:40px; position:absolute;left:5px;">无效的优惠券.您可以到 <a href='index.php?app=my_coupon'>我的优惠券</a> 登记或者查询具体的优惠券信息</span>
                    </p>
                    <?php endif; ?>
					
					<?php if ($this->_var['integral_open'] && ! $this->_var['yz_integral']['goods_disable_use_integral']): ?>
                    <p style="float:left;">

                    </p>            
                    <?php endif; ?>
                     <div class="clr"></div>
                    </div>
                    <p>
                        <a href="javascript:void($('#order_form').submit());" class="btn">下单完成并支付</a>
                        <a href="<?php echo url('app=cart&store_id=' . $this->_var['goods_info']['store_id']. ''); ?>" class="back">返回购物车</a>
                        <input type="hidden" id="final_price" name="final_price" value="0"/>
                        <input type="hidden" id="integral_state" name="integral_state" value="<?php echo $this->_var['yz_integral']['integral_state']; ?>"/>
                        <input type="hidden" id="has_integral" name="has_integral" value="<?php echo $this->_var['yz_integral']['has_integral']; ?>"/>
                        <input type="hidden" id="using_jifen" name="using_jifen" value="0"/>
                    </p>
                </div>
