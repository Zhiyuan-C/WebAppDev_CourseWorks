<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*==========================================================
      Display - Home, Detail, Navigation-sorting, category
=============================================================*/

// ------------------- Home page ---------------------
Route::get('/', function () {
    $title = 'Home'; // display the title to the browser tab
    $nav_class = "home_class"; // to active current nav tab
    // get all the books
    $sql = "select B.id, B.title, B.cover, B.description, B.published, 
            count(Review.message) as rev_num, avg(Review.rating) as rating, 
            Category.name as category 
            from Book as B 
            left join Review on B.id=Review.Book_id 
            left join Category on B.Category_id = Category.id
            group by B.id 
            order by B.id";
    $books = DB::select($sql);
    return view('main')->withTitle($title)->withNavclass($nav_class)->withBooks($books);
});

// ------------------- Navigation ------------------- 
Route::get('/{uri}', function ($uri) {
    // Initialise
    $title = $uri;
    $sql = "select b.id, b.title, b.cover, b.description, b.Category_id, 
            count(Review.message) as rev_num, avg(Review.rating) as rating, 
            Category.name as category 
            from Book as b 
            left join Review on Review.Book_id=b.id
            left join Category on b.Category_id = Category.id";
    $books = null;
    $categories = get_categories();
    // Depend on which nav, complete the sql query to retrive data from database
    // if is sorting by review number or average rating, modify the $sql query
    if($uri == 'num_rev' || $uri == 'ave_rev'){
        $nav_class = 'sort';
        if($uri == 'num_rev'){
            $title = 'Sort by review numbers';
            $sql = $sql." group by b.id order by rev_num desc";
        } elseif($uri == 'ave_rev') {
            $title = 'Sort by average reviews';
            $sql = $sql." group by b.id order by rating desc";
        }
        $books = DB::select($sql);
    }
    elseif($uri =='documentation'){
        $nav_class = $uri;
        return view('documentation')->withTitle($title)->withNavclass($nav_class);
    }
    // if is not sorting, modify the $sql query with sanitasation
    elseif(in_array(ucfirst($uri), $categories)) {
        $nav_class = $uri;
        $uri = ucfirst($uri);
        $sql = $sql." where Category.name=? group by b.id";
        $books = DB::select($sql, array($uri));
    } else { // if uri is not correct, raise error
        return view('error')->withError("Fail to open: current path does not exsist.");
    }
    
    // if no book in the categroy, show no book message
    if(count($books) == 0){
        return view('error')->withError("No book in current category.");
    }
    
    return view('main')->withTitle($title)->withNavclass($nav_class)->withBooks($books);
});

# ------------------- Book Detail ------------------- 
Route::get('/detail/{bookid}', function($bookid){
    $book = get_book($bookid);
    $reviews = get_reviews($bookid);
    $rating_opt = array(1, 2, 3, 4, 5); //rating_opt >>> rating option
    return view('detail')->withBook($book)->withReviews($reviews)->withRating_opt($rating_opt);
});

# ------------------- Search  ------------------- 
Route::post('/search_result', function(){
    $search = request('search');
    $title = 'search';
    
    // search through the database use partial matching with the book title, author name and book description
    $search_sql ="select B.id, B.title, B.cover, B.description, B.published, 
                  count(Review.message) as rev_num, avg(Review.rating) as rating, 
                  C.name as category
                  from Book as B, Author as A, Category as C
                  left join Review on B.id=Review.Book_id
                  where B.Author_id = A.id and B.Category_id = C.id 
                        and (B.title like ? or A.full_name like ? 
                             or B.description like ?)
                  group by B.id 
                  order by B.id";
    $books = DB::select($search_sql, array('%'.$search.'%', '%'.$search.'%', '%'.$search.'%'));
    
    // if count of book is greater than 0, then display the book, else display no book found message
    if(count($books) > 0){
        return view('main')->withTitle($title)->withNavclass(null)->withBooks($books);
    }
    else {
        return view('error')->withError("No item found");
    }
});

/*================================================
      Actions - Add, Edit, Delete
==================================================*/

/*------------------------------------------------
----------------------ADD-------------------------
--------------------------------------------------*/

# ------------------- Add book ------------------- 
Route::get('/action/add', function(){
    // Initialise
    $title = "BRV - Add new book";
    $action = "add";
    $action_path = "/action/add_book";
    $input_fields = array('title', 'author', 'published', 'description');
    $categories = get_categories();
    
    return view('action.addEditBook')->withTitle($title)->withCategories($categories)->withAction($action)->with('input_fields', $input_fields)->with('action_path', $action_path);
});

//  ------------------- add book action  ------------------- 
Route::post('/action/add_book', function(){
    $input = request()->all();
    $input_fields = array('title', 'author', 'published', 'description');
    $check = $input;
    // Check if any required input field is empty
    if(in_array(null, $input)){
        return redirect()->back()->with('error', "Fail to add: Empty input")->withCheck($check)->withEmpty('empty');
    }
    
    // Check if current book aready exsit in the category by comparing the book title
    // store in array(category.name -> array("book title", ...), ...) format
    $categories = array();
    $book_titiles = DB::select("select title from Book");
    $category_db = DB::select("select name, id from Category");
    foreach($category_db as $category){
        $titles_db = DB::select("select B.title from Book as B where B.Category_id=?", array($category->id));
        $titles = array();
        foreach($titles_db as $val){
            $titles[] = strtolower($val->title);
        }
        $categories[$category->name] = $titles;
    }
        
    // Insert into database if not exsist
    if(!in_array(strtolower($input["title"]), $categories[$input["category"]])){
        // if user has not upload image file, set path to default image
        if(array_key_exists("cover", $input)){
           // set input['cover'] with uploaded image path
            $input['cover'] = img_upload($input['cover']); 
        } else{
            $input['cover'] = "defaultImg/cover.jpeg";
        }
        
        // if is not image file, then giev an error message
        if($input['cover'] == false){
            return redirect()->back()->with('error', "Fail to add: Invalid file, must be an image file.")->withCheck($check);
        }
        
        $id = add_book($input);
        if ($id){
            return redirect("/detail/$id");
        } else {
            return view('error')->withError("Fail to add: Error while adding item");
        }
    } 
    
    // book already exsist, give an error message
    else { 
        return redirect()->back()->with('error', "Fail to add: Current book already exsit")->withCheck($check);
    }
    
});

//  ------------------- add review action  ------------------- 
Route::post('/action/add_review/{bookid}', function($bookid){
    $input = request()->all();
    
    // Check if any required input field is empty
    $check = $input;
    if(in_array(null, $input)){
        return redirect()->back()->with('error', "Fail to write review: Empty input")->withCheck($check);
    }
    
    // check if user already reviewed current book, assume the nick_name of the user is the unique identifier
    $users = array();
    $reviews = get_reviews($bookid);
    foreach($reviews as $user){
        $users[] = strtolower($user->nick_name);
    }
    // if not exsit, insert new review
    if(!in_array(strtolower($input['nick_name']), $users)){
        add_review($input, $bookid);
        return redirect("/detail/$bookid");
    }
    // if exsist, raise error -> Already reviewed, user can not have multiple reviews for the same book
    else {
        return redirect()->back()->with('error', "Fail to write review: user can not have multiple reviews for the same book")->withCheck($check);
    }
    

});

/*------------------------------------------------------------
---------------------------EDIT------------------------------
-------------------------------------------------------------*/

//  ------------------- Edit book action  -------------------
Route::get('action/edit/{bookid}', function($bookid){
    // initialise
    $title = "BRV - Edit book";
    $action = "edit";
    $action_path = "/action/edit_book";
    $input_fields = array('title', 'author', 'published', 'description');
    // get category list
    $categories = array();
    $category_db = DB::select("select name from Category");
    foreach($category_db as $category){
        $categories[] = $category->name;
    }
    // get current book detail
    $book = get_book($bookid);
    
    return view('action.addEditBook')->withTitle($title)->withCategories($categories)->withAction($action)->with('input_fields', $input_fields)->withBook($book)->with('action_path', $action_path);
});

Route::post('/action/edit_book', function(){
    $input = request()->all();
    
    // Check if any required input field is empty
    $check = $input;
    if(in_array(null, $input)){
        return redirect()->back()->with('error', "Fail to add: Empty input")->withCheck($check)->withEmpty('empty');
    }
    
    // initialise
    $author = ucwords($input['author']);
    $update_sql = "update Book set title = ?, published = ?, description = ?";
    $update_array = array($input['title'], $input['published'], $input['description']);
    
    
    // if user has supplied new cover image
    if(array_key_exists("cover", $input)){
        $update_sql = $update_sql.", cover = ?";
        $input['cover'] = img_upload($input['cover']);
        if($input['cover'] == false){
            return redirect()->back()->with('error', "Fail to add: Invalid file, must be an image file.")->withCheck($check);
        }
        else {
            $update_array[] = $input['cover'];
        }
    }
    
    // find category id
    $category_db = DB::select('select id from Category where name = ?', array($input['category']));
    $category_id = $category_db[0]->id;
    $update_sql = $update_sql.", Category_id = ?";
    $update_array[] = $category_id;
    
    // add author if not exists
	add_author($author);
	
	// find authoer id
    $author_db = DB::select('select id from Author where full_name = ?', array($author));
    $author_id = $author_db[0]->id;
    $update_sql = $update_sql.", Author_id = ? where id = ?";
    $update_array[] = $author_id;
    $update_array[] = $input['bookid'];
    
    // update database
    DB::update($update_sql, $update_array);
    $bookid = $input['bookid'];
    return redirect("/detail/$bookid");
});

//  ------------------- Edit review action  -------------------
Route::post('/action/edit_review', function(){
    $input = request()->all();
    
    // Check if any required input field is empty
    $check = $input;
    if(is_null($input['message'])){
        
        return redirect()->back()->with('edit_error', "Fail to add: Empty input")->withCheck($check);
    }
    
    // update review
    $bookid = $input['bookid'];
    $sql = "update Review set rating = ?, message = ? where id = ? and Book_id = ?";
    DB::update($sql, array($input['rating'], $input['message'], $input['id'], $bookid));
    
    return redirect("/detail/$bookid");
});

/*---------------------------------------------------------------
---------------------------DELETE--------------------------------
-----------------------------------------------------------------*/

//  ------------------- Delete book action  -------------------
Route::get('action/delete/{id}', function($id){
    // delete all the reviews for current book
    $deleteReview = "delete from Review where Book_id = ?";
    DB::delete($deleteReview, array($id));
    // delete the book
    $deleteBook = "delete from Book where id = ?"; 
    DB::delete($deleteBook, array($id));
    
    return redirect('/');
});

/*
|=========================================================================
| Functions
|--------------------------------------------------------------------------
*/

function get_book($bookid){ // get book detail with $bookid
    $sql = "select B.id, B.title, B.cover, B.description, B.published, 
            Category.name as category, count(Review.message) as rev_num,
            avg(Review.rating) as rating, Author.full_name as author
            from Book as B 
            left join Review on B.id=Review.Book_id
            left join Author on B.Author_id=Author.id
            left join Category on b.Category_id=Category.id
            where B.id=?
            group by B.id 
            order by B.id";
    $books = DB::select($sql, array($bookid));
    
    $book = $books[0];
    return $book;
}

function get_reviews($bookid){ // get relevent reviews with $bookid
    $reviewsql = "select R.id as reviewid, rating, message, U.nick_name
                  from Review as R, User as U 
                  where Book_id=? and User_id = U.id";
    $reviews = DB::select($reviewsql, array($bookid));
    return $reviews;
}

function get_categories(){ // get all the category names
    $categories = array();
    $category_db = DB::select("select name from Category");
    foreach($category_db as $category){
        $categories[] = $category->name;
    }
    return $categories;
}

function add_book($input){ // add new book to database
    $author = ucwords($input['author']);
    
    // add author if not exists
	add_author($author);
    
    // add new book
    $add_book = "insert into Book(title, cover, published, description, Category_id, Author_id)
                select ?, ?, ?, ?, Category.id, Author.id
                from Category, Author
                where Category.name = ?
                and Author.full_name = ?";
    DB::insert($add_book, array($input['title'], $input['cover'], $input['published'], $input['description'], $input['category'], $author));
    
    $id = DB::getPdo()->lastInsertId();

    return $id;
}

function add_author($author){ //add author to database
    $add_author = "insert into Author(full_name)
	               select ?
	               where not exists(select full_name from Author 
	                                where full_name = ?)";
    DB::insert($add_author, array($author, $author));
}

function add_review($input, $bookid){ //add review for the book and insert into database

    // add user if not exists
	$add_user = "insert into User(nick_name)
	             select ?
	             where not exists(select * from User where nick_name = ?)";
    DB::insert($add_user, array($input["nick_name"], $input["nick_name"]));
    
    // add review
    $user_id = DB::select('select id from User where nick_name =?', array($input["nick_name"]));
    
	$add_review = "insert into Review(rating, message, Book_id, User_id)
                   values(?, ?, ?, ?)";
    DB::insert($add_review, array($input["rating"], $input["message"], $bookid, $user_id[0]->id));
}

function img_upload($cover){ // upload image cover for the book
    $extensions = array("png", "jpg", "jpeg", "bmp");
    $file = request()->file('cover');
    $name = $file->getClientOriginalName();
    $extension = $file->extension();
    // check the extension of the file, correct extension then upload to public image directory
    if(in_array(strtolower($extension), $extensions)){
        $file->move('image', $name);
        return "image/$name";
    }
    else { // file extension is not image file, return false
        return false;
    }
}