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
						<input type="text" name="User[user_name]" style="color:#999" placeholder="请输入手机号" required>
					</span>
					<span class="input">
						<img src="assets/index/img/lock.png">
						<input type="password" name="User[password]" style="color:#999" placeholder="请输入密码" required>
					</span>
					<button id="btn-submit" class="sub-btn" type="submit">登录</button>
				</form>
				<div class="login-nav">
					<span class="login">没有账号？<a href="regist.php">注册</a></span>
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