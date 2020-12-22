@extends('layouts.master')
@section('title')
  ANRV - Documentation
@endsection

@section($navclass)
  class="nav-link active"
@endsection

@section('content')
  <div class="row">
    <!-- Documentation navigation -->
    <div class="col-md-3 doc_nav">
      @component('section.docNav')
      @endcomponent
    </div>
    <!-- Documentation container -->
    <div class="col-md-9 doc_container" data-spy="scroll" data-target="#navbar-documentation" data-offset="0">
      <!--ERD-->
      @component('section.docContent')
        @slot('id')
          ERD
        @endslot
        @slot('title')
          Entity Relationship Diagram
        @endslot
        @slot('content')
          <p>The Entity Relationship Diagram is Created with draw.io <br>The diagram as follow:  </p>
          <div><img src="{{secure_asset('defaultImg/ERD.png')}}"/></div>
          <p>The database has nine tables, and each table is described as below:</p>
          <ul>
            <li>
              <strong>Anime to Photo (Mandatory One to Optional Many)</strong><br>
              An anime can have many photos or no photo, but a photo must belong to an anime.
            </li>
            <li>
              <strong>Anime to Studio ( Optional Many to Mandatory One )</strong><br>
              Each Studio can have many animes, but an anime can only belong to one studio.
            </li>
            <li>
              <strong>Anime to Review (Mandatory One to Optional Many)</strong><br>
              An anime can have many reviews or no reviews, but each review must belong to an anime.
            </li>
            <li>
              <strong>Photo to User ( Optional Many to Mandatory One )</strong><br>
              A photo must be upload by a user, and a user may or may not upload many photos.
            </li>
            <li>
              <strong>User to Review ( Mandatory One to Optional Many )</strong><br>
              A user may or may not write many reviews, but a review must be written by a user.
            </li>
            <li>
              <strong>Type to User ( Mandatory One to Optional Many )</strong><br>
              A type can have many users, and each user must have one type. A user can not have multiple types. 
            </li>
            <li>
              <strong>User like/dislike Review ( Many to Many )</strong><br>
               A user can like and dislike many reviews, and a review can be liked or disliked by many users. Hence many to many relationships, therefore intermediate tables are created for both like and dislike.<br>
               <ul>
                 <li>
                  <strong>User, Like, Review (Mandatory One to Optional Many)</strong><br>
                  A user and a review can have many likes or no like. Each like must belong to a user and a review.
                </li>
               </ul>
               <ul>
                 <li>
                  <strong>User, Dislike, Review (Mandatory One to Optional Many)</strong><br>
                  A user and a review can have many dislikes or no dislike. Each dislike must belong to a user and a review.
                </li>
               </ul>
            </li>
            <li>
              <strong>User follow the user ( Many to Many)</strong><br>
              A user can follow many users, and a user can be followed by many users, hence many to many relationships, Therefore an intermediate table is created call follow.
              <ul>
                 <li>
                  <strong>User to Follow (Optional One to Optional Many)</strong><br>
                  A user may or may not follow many users, and the user also may or may not followed by a user.
                </li>
               </ul>
            </li>
          </ul>
        @endslot
      @endcomponent
      <!-- end ERD -->
      
      <!-- Migration and Seeder -->
      @component('section.docContent')
        @slot('id')
          mig_sed
        @endslot
        @slot('title')
          Migration and Seeder
        @endslot
        @slot('content')
          <p>Laravel Migration with schema builder is used to create tables in the database, and Seeder is used to create and insert initial data into relevant tables.</p>
        @endslot
      @endcomponent
      <!-- end Migration and Seeder -->
      
      <!-- UI Design -->
      @component('section.docContent')
        @slot('id')
          UI
        @endslot
        @slot('title')
          UI Design
        @endslot
        @slot('content')
          <p><a href="https://getbootstrap.com/docs/4.1/getting-started/introduction/" target="_blank">Bootstrap</a> is used to construct basic Style of this website. Then some of them are modified with own css styles to achieve better look.</p>
          <div>The main element used from Bootstrap are:
            <ul>
              <li>Cards</li>
              <li>Modal</li>
              <li>Collapse</li>
              <li>Alert</li>
              <li>Jumbotron</li>
              <li>Forms</li>
              <li>Navs</li>
              <li>Buttons</li>
              <li>Dropdowns</li>
              <li>Pagination</li>
              <li>Grid system</li>
            </ul>
          </div>
        @endslot
      @endcomponent
      <!-- End UI Design -->
      
      <!-- Access Control -->
      @component('section.docContent')
        @slot('id')
          accessControl
        @endslot
        @slot('title')
          Access Control
        @endslot
        @slot('content')
          <h5>Laravel Authentication</h5>
          <p>The actions require the user to login use Laravel Authentication to control the permission. Auth check method is used in the front-end in charge of display things. If the user is not login, then they are not able to see particular things from the site. The middleware method calling auth is used in the back end to control the functions. If the user is not login, and need to perform a specific action, the Laravel Authentication will automatically direct the guest users to the login page. the other user is followed by the current user, a unfollow button is displayed. If user unfollows any other users, the unfollow form is submitted with the Post method, and it allows the controller to detach the ids from follows table. </p>
          <h5>Laravel Authorisation</h5>
          <p>Specific actions can only be authorised to particular users. Here have two types of users, moderator and regular. The Gate which is a closure to determine if the user is authroised, and they are declared under AuthServiceProvider. The can method is used in the front-end to control the display, only authorised users can see certain things. The authorize method is used at back-end in the controller under different functions to control the actions. If action is not authorised, then will redirect to the error page.</p>
        @endslot
      @endcomponent
      <!-- end Access Control -->
      
      <!-- Input Validation -->
      @component('section.docContent')
        @slot('id')
          validation
        @endslot
        @slot('title')
          Input Validation
        @endslot
        @slot('content')
          <p>Laravel Validation is used to validate all the user inputs. The validate method with validation rules is often used to validate the input. Sometimes also require to manually create or customise validators using Validator facade and make method. If the input is not valid, then redirect back to the form with error messages and input values. The old input values are retrieved by use old method, and error messages are retrieved by use errors variable.</p>
        @endslot
      @endcomponent
      <!-- end Input Validation -->
      
      <!-- User Authentication -->
      @component('section.docContent')
        @slot('id')
          authentication
        @endslot
        @slot('title')
          User Authentication
        @endslot
        @slot('content')
          <p>Laravel Authentication is used to register, login and logout users. The make auth command creates a home controller, login, register views. It automatically controls registering users, login users and logout users. Once a user is successfully registered, it redirects users to the home.</p>
          <h5>Customise redirect after login</h5>
          <p>Since the default redirect is to home, a function name showLoginForm is created under LoginController to override the default. URL and previous method are used to retrieve the previous URL if the URL is not login, and stored into a variable. The variable then passes to view and stored inside the hidden input field.  Then a function name authenticated is created to override the default authenticated function and retrieve the previous URL for redirection.</p>
        @endslot
      @endcomponent
      <!-- end User Authentication -->
      
      <!-- Display all items in database -->
      @component('section.docContent')
        @slot('id')
          retrieve
        @endslot
        @slot('title')
          Retrieve items from database
        @endslot
        @slot('content')
          <p>The items details are retrieved use laravel Eloquent and query builder and stored in the variables. The variables are passed to different views to display.</p>
        @endslot
      @endcomponent
      <!-- end Display all items in database -->
      
      <!-- Create items -->
      @component('section.docContent')
        @slot('id')
          create
        @endslot
        @slot('title')
          Create review
        @endslot
        @slot('content')
          <p>The user can create items by submitting the form. The form is submitted with the Post method. All the input fields are retrieved and validated with laravel Validation. The item information is created and stored with laravel Eloquent and query builder in the database.</p>
        @endslot
      @endcomponent
      <!-- end Create review-->
      
      <!-- Update items -->
      @component('section.docContent')
        @slot('id')
          update
        @endslot
        @slot('title')
          Update items
        @endslot
        @slot('content')
          <p>The user can update items by submitting the form. Only moderator can update all the items, and a regular user can update the specific item, see Access control for more detail. The form is submitted with the PUT method. All the input fields are retrieved and validated with laravel Validation, see Validate input for more detail. The item information is updated and stored with laravel Eloquent and query builder in the database.</p>
        @endslot
      @endcomponent
      <!-- end Update items -->
      
      <!-- Delete item -->
      @component('section.docContent')
        @slot('id')
          delete
        @endslot
        @slot('title')
          Delete item
        @endslot
        @slot('content')
          <p>The user can update items by submitting the form. Only moderator can delete all the items, and a regular user can delete the specific item, see Access control for more detail. The form is submitted with the Delete method. The item is deleted with laravel Eloquent and query builder from the database, any related item from other tables are also deleted, and the ids in the intermediate table are also detached.</p>
        @endslot
      @endcomponent
      <!-- end Delete item-->
      
      <!-- Upload photos -->
      @component('section.docContent')
        @slot('id')
          upload
        @endslot
        @slot('title')
          Upload photos
        @endslot
        @slot('content')
          <p>A login user can upload multiple photos for a particular item. The form has multipart/form-data for enctype, and is submitted with Post method. The files uploaded by the user are also validated with laravel Validation. Each file is stored in the database by using laravel Eloquent and query builder.</p>
        @endslot
      @endcomponent
      <!-- end Upload photos-->
      
      <!-- like and dislike reviews -->
      @component('section.docContent')
        @slot('id')
          likeDislike
        @endslot
        @slot('title')
          Like or Dislike a review
        @endslot
        @slot('content')
          <p>A login user can vote for like or dislike particular reviews. The review id from both likes and dislikes table are retrieved in order to check if the current user has already liked or disliked any reviews. If the user has already voted, the form for the vote will not be displayed. If the user like or dislike any reviews, the function stores the information into either likes or dislikes table.</p>
        @endslot
      @endcomponent
      <!-- end Upload photos-->
      
      <!-- Additional functionality -->
      @component('section.docContent')
        @slot('id')
          followUnfollow
        @endslot
        @slot('title')
          Follow and Unfollow other users
        @endslot
        @slot('content')
          <p>A login user can follow or unfollow other users. A list of the following id is retrieved. </p>
          <h5>Unfollow</h5>
          <p>If the other user is followed by the current user, a unfollow button is displayed. If user unfollows any other users, the unfollow form is submitted with the Post method, and it allows the controller to detach the ids from follows table. </p>
          <h5>Follow</h5>
          <p>The following list is also used to check any other users that are available for following, and a follow button is displayed. If the user follows any other users, the follow form is submitted with the Post method, and allow the controller to attach the ids to the follows table. </p>
        @endslot
      @endcomponent
      <!-- end Additional functionality-->
      
      <!-- Recommendation -->
      @component('section.docContent')
        @slot('id')
          recommendation
        @endslot
        @slot('title')
          Recommendation
        @endslot
        @slot('content')
          <h5>Recommendation for review items</h5>
          <p>A list of five items with no reviews are retrieved from the database and displayed onto the user dashboard for the user to choose if they want to be the first reviewer of that item.<br>A list of five items with the highest reviews count and is not reviewed by current user is retrieved from the database and displayed onto the user dashboard for the user to choose if they also want to review that item.</p>
          <h5>Recommendation for following users</h5>
          <p>A list of following user's id is used to compare and create alist for not follow users. From the not follow list, five users are retrieved from the database and ordered by the follower number from highest to lowest.</p>
        @endslot
      @endcomponent
      <!-- end Others -->
      
      <!-- References -->
      @component('section.docContent')
        @slot('id')
          ref
        @endslot
        @slot('title')
          References
        @endslot
        @slot('content')
          <h5>Animation Information</h5>
          <p class="no_margin">All the Animation information and some photos are retrieved from wikipedia and their official website. Some photos are screen capture from the animation</p>
          <ul>
            <li><a href="https://one-piece.com/" target="_blank">One Piece</a></li>
            <li><a href="http://www.natsume-anime.jp/" target="_blank">Natsume's Book of Friends</a></li>
            <li><a href="https://yurionice.com/index2.php" target="_blank">Yuri!!! on Ice</a></li>
            <li><a href="http://www.toei-anim.co.jp/tv/wt/" target="_blank">World Trigger</a></li>
            <li><a href="http://www.conan-movie.jp/" target="_blank">Detective Conan: Zero The Enforcer</a></li>
            <li><a href="http://kekkaisensen.com/" target="_blank">Blood Blockade Battlefront Trigger</a></li>
          </ul>
          <h5>Random Generator</h5>
          <p class="no_margin">All the user nick names and reviews text are generated with following generator</p>
          <ul>
            <li><a href="https://www.fantasynamegenerators.com/nicknames.php" target="_blank">Nickname generator</a> - Nick name</li>
            <li><a href="https://www.lipsum.com/" target="_blank">Lorem Ipsum</a> - Review message</li>
          </ul>
          <h5>Photos</h5>
          <ul>
            <li><a href="http://onepiece.wikia.com/wiki/File:One_Piece_Anime_Logo.png"  target="_blank">One Piece</a></li>
            <li><a href="https://geekandsundry.com/yuri-on-ice-skates-into-our-hearts/"  target="_blank">Yuri on ice</a></li>
          </ul>
        @endslot
      @endcomponent  
      <!-- end References -->
      
    </div>
  </div>
@endsection