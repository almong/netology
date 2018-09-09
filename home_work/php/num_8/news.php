<?php

    class Comments
    {
        public $dateComment;
        public $author;
        public $comment;
        public $news;

        public function __construct($author, $comment, $news)
        {
            $this->dateComment = date('d M Y');
            $this->author = $author;
            $this->comment = $comment;
            $this->news = $news;
        }        
    }

    class News
    {
        private $date;
        private $name;
        private $description;

        public function __construct($name, $description)
        {
            $this->date = date('d M Y');
            $this->name = $name;
            $this->description = $description;
        }

        public function getNews()
        {?>
            <div>Дата публикации: <?php echo $this->date;?></div>
            <div><b><?php echo $this->name;?></b></div>
            <div><?php echo $this->description;?></div>
            <hr>
        <?php }

        public function getComment($newsId, $commentArr)
        {
            foreach ($commentArr as $comment){
                if ($news_id == $comment->news){?>
                    <div>Дата Коментария: <?php echo $comment->dateComment;?></div>
                    <div><b><?php echo $comment->author;?></b></div>
                    <div><?php echo $comment->comment;?></div>
                    <hr>
                <?php }
            }
            
        }
    }

    $newsArr = [
        new News('Выборы президента', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultricies eros tortor, id ultricies neque posuere quis. Maecenas varius dui justo, facilisis iaculis nunc luctus vitae. Quisque tempor venenatis bibendum. Duis ultricies porta mi cursus iaculis. Morbi tincidunt, risus id posuere faucibus, libero dolor rhoncus elit, ut vestibulum lectus massa malesuada massa. Aliquam sit amet rhoncus nisl, quis suscipit libero. Quisque finibus erat lobortis justo tincidunt, a hendrerit dui tincidunt. Quisque non quam porttitor, fermentum metus sed, gravida sapien. Mauris aliquet enim nunc, id lacinia diam aliquet ac. Etiam a placerat mi.'),
        new News('Засуха в Европе', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultricies eros tortor, id ultricies neque posuere quis. Maecenas varius dui justo, facilisis iaculis nunc luctus vitae. Quisque tempor venenatis bibendum. Duis ultricies porta mi cursus iaculis. Morbi tincidunt, risus id posuere faucibus, libero dolor rhoncus elit, ut vestibulum lectus massa malesuada massa. Aliquam sit amet rhoncus nisl, quis suscipit libero. Quisque finibus erat lobortis justo tincidunt, a hendrerit dui tincidunt. Quisque non quam porttitor, fermentum metus sed, gravida sapien. Mauris aliquet enim nunc, id lacinia diam aliquet ac. Etiam a placerat mi.')
    ];

    
    $commentArr = [
        new Comments('Иван', 'Комент 1', 0),
        new Comments('Петр', 'Комент 2', 0),
        new Comments('Вася', 'Комент 3', 1),
        new Comments('Катя', 'Комент 4', 1)
    ];
 
    foreach ($newsArr as $key => $news) {
        echo $news->getNews();
        echo $news->getComment($key, $commentArr);
    }

   ?>