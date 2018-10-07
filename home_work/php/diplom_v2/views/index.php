<?php
include 'header.php';
?>

<section class="cd-faq">

        <a type="button" class="btn btn-success">Задать вопрос</a>

	<ul class="cd-faq-categories">
        <?php
        foreach ($categorys as $category){
            if ($category['id'] == 1) {?>
                <li><a class="selected" href="#<?= $category['name']?>"><?= ucfirst($category['name'])?></a></li>
        <?php } else {?>
    		<li><a href="#<?= $category['name']?>"><?= ucfirst($category['name'])?></a></li>
        <?php } }?>
	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items">
        <a class="btn btn-outline-info" href="question" role="button">Задать вопрос</a>
        <?php
            foreach ($categorys as $category){?>
                <ul id="<?= $category['name']?>" class="cd-faq-group">
                    <li class="cd-faq-title"><h2><?= ucfirst($category['name'])?></h2></li>
            <?php
                foreach ($questions as $question){
                    if ($question['category_id'] == $category['id']){?>
                    <li>
                        <a class="cd-faq-trigger" href="#0"><?= $question['question']?></a>
                        <div class="cd-faq-content">
                         <p><?= $question['answer']?></p>
                        </div> <!-- cd-faq-content -->
                    </li>
                <?php } }?>
                </ul>
            <?php }?>
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->

<?php include 'footer.php'; ?>