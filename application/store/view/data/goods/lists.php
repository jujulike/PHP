<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="renderer" content="webkit"/>
    <link rel="stylesheet" href="assets/store/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/store/css/app.css?v=1.1.30"/>
    <script src="assets/store/js/jquery.min.js"></script>
    <title>商品列表</title>
</head>
<body class="select-data">
<!-- 工具栏 -->
<div class="page_toolbar am-u-sm-12 am-margin-bottom-xs am-cf">
    <form class="toolbar-form" action="">
        <input type="hidden" name="s" value="/store/data.goods/lists">
        <div class="am fr">
            <div class="am-form-group am-fl">
                <select name="category_id" data-am-selected="{searchBox: 1, btnSize: 'sm',  placeholder: '商品分类', maxHeight: 400}">
                    <option value=""></option>
					<?php if (isset($catgory)): foreach ($catgory as $first): ?>
						<option value="<?= $first['category_id'] ?>"><?= $first['name'] ?></option>
						<?php if (isset($first['child'])): foreach ($first['child'] as $two): ?>
							<option value="<?= $two['category_id'] ?>"><?= $two['name'] ?></option>
							<?php if (isset($two['child'])): foreach ($two['child'] as $three): ?>
								<option value="<?= $three['category_id'] ?>"><?= $three['name'] ?></option>
							<?php endforeach; endif; ?>
						<?php endforeach; endif; ?>
					<?php endforeach; endif; ?>         
                </select>
            </div>
            <div class="am-form-group am-fl">
                <select name="status" data-am-selected="{btnSize: 'sm', placeholder: '商品状态'}">
                    <option value=""></option>
                    <option value="10" selected>上架</option>
                    <option value="20" >下架</option>
                </select>
            </div>
            <div class="am-form-group am-fl">
                <div class="am-input-group am-input-group-sm tpl-form-border-form">
                    <input type="text" class="am-form-field" name="search" placeholder="请输入商品名称" value="">
                    <div class="am-input-group-btn">
                        <button class="am-btn am-btn-default am-icon-search" type="submit"></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="am-scrollable-horizontal am-u-sm-12">
    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black am-text-nowrap">
        <thead>
			<tr>
				<th>
					<label class="am-checkbox">
						<input data-am-ucheck data-check="all" type="checkbox">
					</label>
				</th>
				<th>商品ID</th>
				<th>商品图片</th>
				<th>商品名称</th>
				<th>商品分类</th>
				<th>添加时间</th>
			</tr>
        </thead>
        <tbody>
			<?php if (!$list->isEmpty()): foreach ($list as $item): ?>
            <tr>
                <td class="am-text-middle">
                    <label class="am-checkbox">
                        <input data-am-ucheck data-check="item" data-params='<?= $item['params'] ?>' type="checkbox">
                    </label>
                </td>
                <td class="am-text-middle"><?= $item['goods_id'] ?></td>
                <td class="am-text-middle">
                    <a href="<?= $item['image'][0]['file_path'] ?>" title="点击查看大图" target="_blank">
                        <img src="<?= './uploads/'.$item['goods_id'].'.jpg' ?>" width="50" height="50" alt="商品图片">
                    </a>
                </td>
                <td class="am-text-middle">
                    <p class="item-title"><?= $item['goods_name'] ?></p>
                </td>
                <td class="am-text-middle"><?= $item['category']['name'] ?></td>
                <td class="am-text-middle"><?= $item['create_time'] ?></td>
            </tr>
			<?php endforeach; else: ?>
            <tr>
                <td colspan="6" class="am-text-center">暂无记录</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="am-u-lg-12 am-cf">
    <div class="am-fr"><?= $list->render() ?> </div>
    <div class="am-fr pagination-total am-margin-right">
		<div class="am-vertical-align-middle">总记录：<?= $list->total() ?></div>
    </div>
</div>
<script src="assets/store/js/amazeui.min.js"></script>
<script>

    /**
     * 获取已选择的数据
     * @returns {Array}
     */
    function getSelectedData() {
        var data = [];
        $('input[data-check=item]:checked').each(function () {
            data.push($(this).data('params'));
        });
        return data;
    }

    $(function () {

        // 全选框元素
        var $checkAll = $('input[data-check=all]')
            , $checkItem = $('input[data-check=item]')
            , itemCount = $checkItem.length;

        // 复选框: 全选和反选
        $checkAll.change(function () {
            $checkItem.prop('checked', this.checked);
        });

        // 复选框: 子元素
        $checkItem.change(function () {
            if (!this.checked) {
                $checkAll.prop('checked', false);
            } else {
                var checkedItemNum = $checkItem.filter(':checked').length;
                checkedItemNum === itemCount && $checkAll.prop('checked', true);
            }
        });

    });
</script>
</body>
</html>