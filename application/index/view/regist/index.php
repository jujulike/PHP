<script src="assets/layer/layer.js"></script>
<script src="assets/store/js/jquery.form.min.js"></script>
<script src="assets/store/js/amazeui.min.js"></script>
<script src="assets/store/js/wechat.app.js"></script>
<div class="section">
	<div class="login-in">
		<div class="login-info">
			<div class="form">
				<form id="my-form">
					<span class="input">
						<img src="assets/index/img/people.png">
						<input type="number" name="User[user_name]" style="color:#999" placeholder="请输入注册手机号" required>
					</span>
					<!--
					<span class="input warp">
						<input type="text" style="color:#999" placeholder="请输入手机验证码" avalon-events="input:_6,compositionstart:_4,compositionend:_5,focus:_2,blur:_3">
						<span class="countdown" change-class="" avalon-events="click:eclick_0_64countdownClick4041">
							获取验证码<span class="second hide" change-class="hide">59</span>
						</span>
					</span>
					-->
					<span class="input">
						<img src="assets/index/img/lock.png">
						<input type="password" name="User[password]" style="color:#999" placeholder="请输入密码" required>
					</span>
					<span class="input">
						<img src="assets/index/img/lock.png">
						<input type="password" name="User[password2]" style="color:#999" placeholder="请确认密码" required>
					</span>
					<button id="btn-submit" class="sub-btn" type="submit">注册</button>
				</form>
				<div class="login-nav">
					<span class="login">已有账号？<a href="login.php">登录</a></span>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function () {
        /**
         * 表单验证提交
         */
        $('#my-form').superForm();

    });
</script>
