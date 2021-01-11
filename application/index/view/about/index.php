<div class="section">
	<div class="swiper-container" style="background-color: #35394a;height: 500px;">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="display: block; background: url('assets/index/img/banner3.jpg') no-repeat center center">
				<h1 class="banner-title warp-3">ABOUT US</h1>
				<p class="banner-info warp-3">一家诚信做事、高求品质，寻求共赢的软件服务企业</p>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section gray">
	<div class="main" style="position: relative;">
		<div class="title">
			<p class="h1">关于我们</p>
			<p>做餐饮，用河马点餐</p>
		</div>
		<div class="about-info">
			<div class="across"></div>
			<em>河马点餐</em>
			<p>河马点餐为河马科技旗下餐饮SAAS服务平台，“河马点餐”致力于让传统餐饮企业快速实现移动互联网化，助力于传统餐厅整体运营效率提升，运营成本降低，用户用餐满意度提高。码点餐融合了移动互联网、大数据分析、云存储服务、O20等前沿科技。传统餐厅进行“河马点餐”后，用户的用餐体验将大幅改善，满意度大幅提升！整体运营效率将大幅提升，运营成本明显降低！传统餐厅商户通过“河马点餐”点餐系统，可以在收银系统实时显示所有餐台的点餐情况、所点菜品、结算情况，大量减少了服务员送菜单以及等待顾客选餐的时间浪费，也减少了服务员介绍菜品的时间，让新品和主推菜品可以标准化的展示给所用用餐客人，大大提高点餐和服务的效率，降低餐厅整体运营成本。</p>
			<div class="acrosss">
				<img src="iles/acrss.png" alt="">
			</div>
			<p class="phone">
				客服热线：<?= $web['component_phone']?><br>
				地址：<?= $web['web_address']?>
			</p>
		</div>
		<img src="assets/index/img/about-img1.jpg" class="about-img1">
		<div class="clearfix"></div>
	</div>
</div>
<div class="section">
	<div class="main" style="position: relative;">
		<div class="title">
			<p class="h1">我们的位置</p>
			<p>欢迎光临公司实地考察</p>
		</div>
		<div id="container" class="amap-container" style="position: relative; background: rgb(252, 249, 242);">
			<div class="amap-maps">
				<div class="amap-drags">
					<div class="amap-layers" style="transform: translateZ(0px);">
						<canvas class="amap-layer" width="1200" height="450" style="width: 1200px; height: 450px;"></canvas>
						<div class="amap-markers">
							<div class="amap-marker" style="top: 176px; left: 546px; z-index: 100; transform: rotate(0deg); transform-origin: 13px 30px; display: block;">
								<div class="amap-icon" style="position: absolute; overflow: inherit; opacity: 1;">
									<img src="assets/index/img/poi-marker-default.png" style="top: 0px; left: 0px;">
								</div>
							</div>
						</div>
					</div>
					<div class="amap-overlays"></div>
				</div>
			</div>
			<div style="display: none;"></div>
			<div class="amap-controls"></div>
			<a class="amap-logo" href="http://gaode.com/" target="_blank" style="display: block;"><img src="assets/index/img/logo@1x.png"></a>
			<div class="amap-copyright" style="display: none; visibility: visible;"> © 2019 AutoNavi <span class="amap-mcode">- GS(2018)1709号</span>
		</div>
	</div>
</div>
</div>
		
<script src="assets/index/js/avalon.js"></script>
<script type="text/javascript" src="assets/index/js/maps.js"></script>
<script type="text/javascript">
    var marker, map = new AMap.Map("container", {
        zoom:11,//级别
        viewMode:'3D',//使用3D视图
        resizeEnable: true,
        center: [117.207934,34.274073],//中心点坐标
        zoom: 13
    });
    // 实例化点标记
    function addMarker() {
        marker = new AMap.Marker({
            icon: "//a.amap.com/jsapi_demos/static/demo-center/icons/poi-marker-default.png",
            position: [117.207934,34.274073],
            offset: new AMap.Pixel(-13, -30)
        });
        marker.setMap(map);
    }
    addMarker();
</script>