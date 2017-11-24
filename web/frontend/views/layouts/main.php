<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
unset($this->assetBundles['yii\web\JqueryAsset']);
unset($this->assetBundles['yii\web\YiiAsset']);
unset($this->assetBundles['yii\bootstrap\BootstrapAsset']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?>--Web五子棋</title>
    <link href="/css/style.css" type="text/css" media="screen" rel="stylesheet" />
    <link rel="stylesheet" href="/layui/css/layui.css"  media="all">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="layui-header header header-doc">
    <div class="layui-main">
        <ul class="layui-nav">
            <?php if(!Yii::$app->user->isGuest):?><li class="layui-nav-item">欢迎你，<?php echo Html::encode(Yii::$app->user->identity->nickname);?>。</li><?php endif;?>
            <li class="layui-nav-item ">
                <a href="/">首页</a>
            </li>
            <li class="layui-nav-item">
                <a href="mailto:xsir317@gmail.com">联系我们</a>
            </li>
        </ul>
    </div>
</div>
<div class="layui-main site-inline">
    <?php echo $content?>
</div>
<div class="layui-footer footer footer-doc">
    <div class="layui-main">
        <p>
            请使用Chrome或Firefox访问。项目代码地址：<a href="https://github.com/xsir317/renju" target="_blank">https://github.com/xsir317/renju</a>
        </p>
    </div>
</div>
<div id="invite_box" style="display:none;">
    <form id="invite_form" onsubmit="return false;">
        <h3>邀请对局</h3>
        <input type="hidden" value="" name="to_user" />
        <input type="hidden" value="" name="action" />
        <input type="hidden" value="" name="id" />
        <div class="field odd">
            <span>对手：</span>
        </div>
        <div class="field">
            <label><input type="radio" name="use_black" value="1" id="use_black" /><img src="/images/black.png" /><span>我使用黑棋</span></label>
        </div>
        <div class="field odd">
            <label><input type="radio" name="use_white" value="1" id="use_white" /><img src="/images/white.png" /><span>我使用白棋</span></label>
        </div>
        <div class="field">
            <span>时间：</span><input name="days" value="" style="width:22px;" /><span>天</span>
            <input name="hours" value="" /><span>小时</span>
            <input name="minutes" value="" /><span>分</span>
        </div>
        <div class="field odd"><span><a href="/about.html#yamaguchi">规则：</a></span>
            <?= Html::dropDownList('rule',null,Yii::$app->params['rules']) ?>
        </div>
        <div class="field">
            <span>备注：</span>
            <input name="comment" value="" />
        </div>
        <div class="field odd">
            <span><a href="/about.html#freeopen">自由开局：</a></span>
            <label><input name="free_open" value="1" type="checkbox" id="free_open" />（前三手无限制）</label></div>
            <input type="submit" class="button" value="发出邀请" id="invite_submit_button" />
    </form>
</div>
<script src="/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
var _debug_mode = <?php echo YII_DEBUG;?>;
var debug_log = function(log){
    if (typeof console == "undefined") return false;
    if(_debug_mode)
    {
        console.log(log);
    }
};
layui.config({
    base: '/layui/'
}).use('layer');
//layer.open({type:1,content:$("#invite_box")});
</script>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
