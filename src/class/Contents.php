<?php

class Contents
{

    private $id_content;
    private $content_sequence;
    private $content_title;
    private $content_text;
    private $content_video;
    private $content_thumb;
    private $content_category;
    private $required_points;
    private $video_time;
    private $insert_time;

    public function __construct($id_account = 0)
    {
        global $database;
        global $text;
        global $session;
        global $numeric;
        if (!$id_account || intval($id_account) === 0) $id_account = $session->getIdAccount();
        if (not_empty($id_account) && $numeric->is_number($id_account)) {
            $database->query("SELECT * FROM contents WHERE id_content = ?");
            $database->bind(1, $id_account);
            $result = $database->resultsetObject();
            if ($result && count(get_object_vars($result)) > 0) {
                foreach ($result as $key => $value) {
                    $this->$key = $text->utf8($value);
                }
            }
        }
    }

    public function getContentsByCategory($category)
    {
        global $database;
        try {
            $database->query("SELECT * FROM contents WHERE content_category = ?");
            $database->bind(1, $category);
            $result = $database->resultset();
            if (count($result) > 0) {
                return $result;
            }
        } catch (Exception $exception) {
            error_log($exception);
        }
        return array();
    }

    /**
     * @return mixed
     */
    public function getIdContent()
    {
        return $this->id_content;
    }

    /**
     * @return mixed
     */
    public function getContentSequence()
    {
        return $this->content_sequence;
    }

    /**
     * @return mixed
     */
    public function getContentTitle()
    {
        return $this->content_title;
    }

    /**
     * @return mixed
     */
    public function getContentText()
    {
        return $this->content_text;
    }

    /**
     * @return mixed
     */
    public function getContentVideo()
    {
        return $this->content_video;
    }

    /**
     * @return mixed
     */
    public function getContentThumb()
    {
        return $this->content_thumb;
    }

    /**
     * @return mixed
     */
    public function getContentCategory()
    {
        return $this->content_category;
    }

    /**
     * @return mixed
     */
    public function getRequiredPoints()
    {
        return $this->required_points;
    }

    /**
     * @return mixed
     */
    public function getVideoTime()
    {
        return $this->video_time;
    }

    /**
     * @return mixed
     */
    public function getInsertTime()
    {
        return $this->insert_time;
    }


}