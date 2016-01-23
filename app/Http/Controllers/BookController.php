<?php
/**
 * @Description  
 * @author    Deepak Rawat<drawat@quikr.com>
 * @fileName  BookController.php
 * @package   
 * @CreatedOn ${Date}
 */

namespace App\Http\Controllers;
use Cache;
use Mockery\CountValidator\Exception;
use Request;
use App\Book;
use App\Http\Controllers\Controller;
class BookController extends Controller  {


    public function addBook()
    {
        try{
            /*Pre process incoming book data*/
            $adBook = Request::all();
//            $book = new Book();
//            $adBook = $book->getProccessedBook($adBook);
            /*Pre process incoming book data*/



            if(Cache::get( $adBook['title']))
                return "Book Already exists";

            Cache::put( $adBook['title'], json_encode(Request::all()), 100 );


            $booksJson = Cache::get( $adBook['author']);
            $books = json_decode($booksJson,true);
            $books[] = $adBook;
            Cache::put( $adBook['author'], json_encode($books),100 );

            $booksJson = Cache::get( $adBook['cat']);
            $books = json_decode($booksJson,true);
            $books[] = $adBook;

            Cache::put( $adBook['cat'], json_encode($books),100 );


            $keyJson = Cache::get('keys');
            $keys = json_decode($keyJson,true);
            if(empty($keys))
                $keys = array();

            if (!in_array($adBook['title'], $keys)) {
                array_push($keys,$adBook['title']);
            }
            if (!in_array($adBook['author'], $keys)) {
                array_push($keys,$adBook['author']);
            }
            Cache::put( 'keys', json_encode($keys),100 );

            return 'Successfully Added';
        }
        catch(Exception $ex)
        {
            return 'Something undesirable happened';

        }



    }


    public function getSoldBooks()
    {
        $searchParams = Request::all();
        $books_by_author = array();

        if(!empty($searchParams['author_name'])) {
            $books_by_author = json_decode(Cache::get( $searchParams['author_name']),true);

        }
        $books_by_category = array();
        if(!empty($searchParams['cat'])) {
            $books_by_category = json_decode(Cache::get( $searchParams['cat']),true);
        }

        $result = array_merge($books_by_author, $books_by_category);

        $result = array_unique($result,SORT_REGULAR);

        foreach ($result as $key => $row)
        {
            $count[$key] = $row['sold_count'];
        }
        array_multisort($count, SORT_DESC, $result);

        return json_encode(array_slice($result, 0, $searchParams['limit'] ));

    }



    public function search()
    {
        try {
            $result = array();
            $searchParams = Request::all();
            $keyword = $searchParams['keyword'];
            if (!empty($keyword)) {
                $keys = json_decode(Cache::get('keys'), true);
                if (empty($keys))
                    return 'No entries Found';
                foreach ($keys as $key => $value) {
                    if (strstr($value, $keyword)) {
                        if (Cache::get($value))
                        {
                            array_push($result,json_decode(Cache::get($value),true));
                        }
                        else{
                             $booksJson = Cache::get($value);
                             $result = array_merge($result,json_decode($booksJson,true));
                        }

                    }
                }
            }
            return $result;
        }
        catch(Exception $ex)
        {
            console.log('No Entries Found');
        }
    }

    public function all()
    {

    }


    public function flush()
    {
        Cache::flush();
    }

} 