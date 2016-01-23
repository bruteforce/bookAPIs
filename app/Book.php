<?php
/**
 * @Description  
 * @author    Deepak Rawat<drawat@quikr.com>
 * @fileName  Book.php
 * @package   
 * @CreatedOn ${Date}
 */

class Book {

    private $title;
    private $author;
    private $publisher;
    private $publish_year;
    private $cat;
    private $sub_cat;
    private $price;

    /**
     * @return mixed
     */

    public function getProccessedBook($book)
    {
        return $book;
    }
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * @param mixed $cat
     */
    public function setCat($cat)
    {
        $this->cat = $cat;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPublishYear()
    {
        return $this->publish_year;
    }

    /**
     * @param mixed $publish_year
     */
    public function setPublishYear($publish_year)
    {
        $this->publish_year = $publish_year;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getSoldCount()
    {
        return $this->sold_count;
    }

    /**
     * @param mixed $sold_count
     */
    public function setSoldCount($sold_count)
    {
        $this->sold_count = $sold_count;
    }

    /**
     * @return mixed
     */
    public function getSubCat()
    {
        return $this->sub_cat;
    }

    /**
     * @param mixed $sub_cat
     */
    public function setSubCat($sub_cat)
    {
        $this->sub_cat = $sub_cat;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    private $sold_count;


} 