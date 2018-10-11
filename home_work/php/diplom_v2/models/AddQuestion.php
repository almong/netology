<?php

/**
 * Class AddQuestion
 */
class AddQuestion
{
    public $name;
    public $category_id;
    public $question;
    public $db;

    /**
     * AddQuestion constructor.
     *
     * @param array $post
     */
    public function __construct(array $post)
    {
        $this->db = new QueryBuilder();
        $this->name = $post['name'];
        $this->category_id = $post['category'];
        $this->question = $post['question'];
    }

    public function addNewUser()
    {
        $this->db->add('user', 'name', $this->name);
    }

    public function addNewQuestion()
    {
        $this->addNewUser();
        $user_id = $this->db->getId('user', 'name', $this->name);
        $data = "'$this->category_id', '$this->question', '$user_id', '1'";
        $col = "`category_id`, `question`, `user_id`, `status`";
        $this->db->add('question', $col, $data);
    }
}
