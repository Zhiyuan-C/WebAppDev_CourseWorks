@extends('layouts.master')
@section('title')
  BRV - Documentation
@endsection

@section($navclass)
  class="nav-link active"
@endsection

@section('content')
  <div class="row">
    <!-- Documentation navigation -->
    <div class="col-md-3 doc_nav">
      @component('component.docNav')
      @endcomponent
    </div>
    <!-- Documentation container -->
    <div class="col-md-9 doc_container" data-spy="scroll" data-target="#navbar-documentation" data-offset="0">
      <!--ERD-->
      @component('component.docContent')
        @slot('id')
          ERD
        @endslot
        @slot('title')
          Entity Relationship Diagram
        @endslot
        @slot('content')
          <p>The Entity Relationship Diagram is Created with draw.io <br>The diagram as follow:  </p>
          <div><img src="{{secure_asset('defaultImg/ERD.png')}}"/></div>
          <p>The database has five tables, such as Author, Book, Category, Review and User.</p>
          <ul>
            <li><strong>Author and Book (Mandatory One to Optional Many)</strong><br>An author can have no book or many books, but a book must have an author.</li>
            <li><strong>Category and Book (Mandatory One to Optional Many)</strong><br>Each category can have many books or no book and a book must have one category.</li>
            <li><strong>Book and Review,  Review and User (Mandatory One to Optional Many)</strong><br>A book can have zero review or many reviews but a review must be within a book and from one user. Each user may or may not have reviews for a book.</li>
          </ul>
        @endslot
      @endcomponent
      <!-- end ERD -->
      
      <!-- Database Implementation -->
      @component('component.docContent')
        @slot('id')
          db_imp
        @endslot
        @slot('title')
          Database Implementation
        @endslot
        @slot('content')
          <p>The application uses sqlite3 database to store the data. Tables and initial data are created and inserted via SQL queries.<br>.read command of sqlite3 reads the sql file that contains SQL queries to create and insert data to the database</p>
        @endslot
      @endcomponent
      <!-- end Database Implementation -->
      
      <!-- UI Design -->
      @component('component.docContent')
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
              <li>Grid system</li>
            </ul>
          </div>
        @endslot
      @endcomponent
      <!-- End UI Design -->
      
      <!-- Display all items in database -->
      @component('component.docContent')
        @slot('id')
          list
        @endslot
        @slot('title')
          Display all items in database
        @endslot
        @slot('content')
          <p>The items are retrieved use DB::select method with select all SQL statement. Then the data pass to the view in a variable and use foreach loop in blade template to loop through the variable to display the items.</p>
        @endslot
      @endcomponent
      <!-- end Display all items in database -->
      
      <!-- Display item detail -->
      @component('component.docContent')
        @slot('id')
          details
        @endslot
        @slot('title')
          Display item detail
        @endslot
        @slot('content')
          <p>Item details and reviews of that item are retrieved use DB::select method from the database, then pass to the detail view page by using the route.</p>
          <p>Detail page contains a blade component named reviews, which is in charge of displaying the user reviews for that item. When call component, detail page also pass the reviews data to that component, so it can loop through the data and display. If no reviews, then display no review message.</p>
        @endslot
      @endcomponent
      <!-- end Display item detail -->
      
      <!-- Create review -->
      @component('component.docContent')
        @slot('id')
          ct_rev
        @endslot
        @slot('title')
          Create review
        @endslot
        @slot('content')
          <p>The collapse function of Bootstrap is used to display the form of creating a review. The user needs to click on write a review button to display the form.</p>
          <h5>Check input validation</h5>
          <p>When the user submits the form, the application first checks if any empty input fields exist, display alert box with an error message and the fields that are empty will have a red border around them to indicate user the field is empty. If all the fields are not empty, then the application checks if the user has already reviewed this item, assume the nickname of the user is the unique id. If the user has already reviewed this item, it then displays the alert box with an error message. </p>
          <p>If the inputs are valid, then add the input data to the database via DB::insert method.</p>
        @endslot
      @endcomponent
      <!-- end Create review-->
      
      <!-- Create item-->
      @component('component.docContent')
        @slot('id')
          ct_itm
        @endslot
        @slot('title')
          Create item
        @endslot
        @slot('content')
          <p>An add item button on the page header that can open the form of adding the item.</p>
          <h5>Check input validation</h5>
          <p>When the user submits the form, the application first checks if any empty input fields exist, display alert box with an error message and the fields that are empty will have a red border around them to indicate user the field is empty. If all the fields are not empty, then the application checks if the book has already existed in that category, assume under the same category cannot have two same book title. If the book has already existed, it then displays the alert box with an error message. </p>
          <p>If the inputs are valid, then add the input data to the database via DB::insert method.</p>
        @endslot
      @endcomponent
      <!-- end Create item-->
      
      <!-- Edit review and item -->
      @component('component.docContent')
        @slot('id')
          et_itmrev
        @endslot
        @slot('title')
          Edit review and item
        @endslot
        @slot('content')
          <p>A user can edit a review or item by click edit button which opens the form that contains existing data in the input field. After the user has completed all the input fields, the application checks if all the inputs are valid. If valid, it then updates the database via DB::update.</p>
        @endslot
      @endcomponent
      <!-- end Edit review and item -->
      
      <!-- Delete item -->
      @component('component.docContent')
        @slot('id')
          dlt_itm
        @endslot
        @slot('title')
          Delete item
        @endslot
        @slot('content')
          <p>When deleting an item, the confirmation modal asks if the user sure to delete that item. If the user chose yes, then the item is deleted via DB::delete method. The application also checks if the item has any reviews, and delete corresponding reviews.</p>
        @endslot
      @endcomponent
      <!-- end Delete item-->
      
      <!-- Display by the manufacturer and Sort the item -->
      @component('component.docContent')
        @slot('id')
          itm_nav
        @endslot
        @slot('title')
          Display by the manufacturer and Sort the item
        @endslot
        @slot('content')
          <p>When deleting an item, the confirmation modal asks if the user sure to delete that item. If the user chose yes, then the item is deleted via DB::delete method. The application also checks if the item has any reviews, and delete corresponding reviews.</p>
        @endslot
      @endcomponent
      <!-- end Display by the manufacturer and Sort the item-->
      
      <!-- Additional functionality -->
      @component('component.docContent')
        @slot('id')
          adt_func
        @endslot
        @slot('title')
          Additional functionality
        @endslot
        @slot('content')
          <h5>Upload image</h5>
          <p>When the user adds an item to the website, the user can also upload the item image. The application checks if the uploaded image is an image file, and upload image, store the image path in the database, then display the image with the item. If no image is uploaded, then the website display the default image.</p>
          <h5>Search</h5>
          <p>The user can search with the website. The application matches the user's search input with the database data to see if there is any match and display the match items. If there is no match, then display a message indicating the user that no item found. </p>
        @endslot
      @endcomponent
      <!-- end Additional functionality-->
      
      <!-- Other -->
      @component('component.docContent')
        @slot('id')
          other
        @endslot
        @slot('title')
          Other
        @endslot
        @slot('content')
          <h5>Security HTML sanitisation</h5>
          <p><span>{</span>{ <span>}</span>} automatically applies the PHP's htmlspecialchars function to perform the HTML and SQL sanitisation. The application uses {{csrf_field()}} to prevent any CSRF attack. the user adds an item to the website, the user can also upload the item image. The application checks if the uploaded image is an image file, and upload image, store the image path in the database, then display the image with the item. If no image is uploaded, then the website display the default image.</p>
          <h5>Template Inheritance</h5>
          <p>Blade template inheritance is used to manage the layout of pages. The application has one master layout that is the parent of all pages, which contains the navigation and required tags to construct the HTML webpage. Then the child layout pages inherit the master page, by using blade <span>@</span>extends, also replace any <span>@</span>yied declared in the parent with blade <span>@</span>section. Some child pages have components and use <span>@</span>component to call the component data.</p>
        @endslot
      @endcomponent
      <!-- end Others -->
      
      <!-- References -->
      @component('component.docContent')
        @slot('id')
          ref
        @endslot
        @slot('title')
          References
        @endslot
        @slot('content')
          <h5>Random Generator</h5>
          <p class="no_margin">The book title, description, author name, user name and review message are generated use different generators.</p>
          <ul>
            <li><a href="https://www.name-generator.org.uk/" target="_blank">Name Generator</a> - Author name</li>
            <li><a href="https://www.ruggenberg.nl/titels.html" target="_blank">Title Generator</a> - Book title</li>
            <li><a href="https://www.fantasynamegenerators.com/nicknames.php" target="_blank">Nickname generator</a> - Nick name</li>
            <li><a href="https://www.lipsum.com/" target="_blank">Lorem Ipsum</a> - Book description and review message</li>
          </ul>
          <h5>Images</h5>
          <p class="no_margin">The images used for book cover is retrieved from <a href="https://www.pexels.com" target="_blank">PEXELS</a>, which is a free stock photos for personal and commercial use. <br> Below is the link for each image used in this application:</p>
          <ul>
            <li><a href="https://www.pexels.com/photo/abstract-art-decoration-design-380337/"  target="_blank">Default cover image</a></li>
            <li><a href="https://www.pexels.com/photo/snow-nature-trees-mountain-89773/"  target="_blank">Sacred Snow</a></li>
            <li><a href="https://www.pexels.com/photo/person-standing-near-body-of-water-1365218/"  target="_blank">Snow in the Shores</a></li>
            <li><a href="https://www.pexels.com/photo/white-and-black-butterfly-on-grass-in-close-up-photography-831224/"  target="_blank">The Stolen Butterfly</a></li>
            <li><a href="https://www.pexels.com/photo/skyline-1368534/"  target="_blank">Gate of Tower</a></li>
            <li><a href="https://www.pexels.com/photo/shallow-focus-photo-of-pink-ceramic-roses-1028707/"  target="_blank">The Silk of the Misty</a></li>
            <li><a href="https://www.pexels.com/photo/green-mountain-near-river-under-cloudy-sky-during-daytime-247478/"  target="_blank">The Dreams's Servant</a></li>
          </ul>
        @endslot
      @endcomponent  
      <!-- end References -->
      
    </div>
  </div>
@endsection