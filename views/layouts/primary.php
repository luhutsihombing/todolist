<?php
/**
 * primary.php
 *
 * @copyright Copyright &copy; Pedro Plowman, https://github.com/p2made, 2015
 * @author Pedro Plowman
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\rating\StarRating;
use dosamigos\datepicker\DatePicker;
use kartik\widgets\Select2;

/* @var $this \yii\web\View */
/* @var $content string */
p2made\theme\sbAdmin\web\SBAdmin2Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<?= $this->render('html-header.php', []) ?>
<body>
	<?= $content ?>
</body>
</html>
